<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DataTables;
use App\Models\TaxManager;
use App\Models\FeeTaxFee;
use Auth;
use App\Providers\NotificationService;
use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;
use App\Models\BookingFee;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddFee()
    {
        $userDoctorId = auth()->user()->doctor->id;

        $items = TaxManager::where('doctor_id', $userDoctorId)->where('status', 1)->get();
        return view('Doctor.Fee.add', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function SubmitFee(Request $request)
    {

        $validatedData = $request->validate([
            'tittle' => 'required',
            'amount' => 'required',
        ]);
        $did = Doctor::where('user_id', auth()->user()->id)->first();
        $data = new Fee();
        $data->consultant_type = $request->input('consultant_type');
        $data->doctor_id = $did->id;
        $data->tittle = $request->input('tittle');
        $data->amount = $request->input('amount');
        $data->tax_status = $request->input('tax');
        $data->total_amount = $request->input('totalAmount');

        $data->save();
        // Find the "Normal Group" for the doctor
        $normalGroup = FeeConcession::where('doctor_id', $did->id)
            ->where('group_name', "Normal Group")
            ->first();

        if ($normalGroup) {
            // If "Normal Group" already exists, associate the fee with it
            $GroupData = new FeeConcessionGroup();
            $GroupData->fee_id = $data->id;
            $GroupData->fee_concession_id = $normalGroup->id;
            $GroupData->amount = 0;
            $GroupData->percentage = 0;
            $GroupData->status = 1;
            $GroupData->save();
        } else {
            // If "Normal Group" doesn't exist, create it and associate the fee with it
            $group = new FeeConcession();
            $group->doctor_id = $did->id;
            $group->group_name = "Normal Group";
            $group->status = 1;
            $group->save();

            $GroupData = new FeeConcessionGroup();
            $GroupData->fee_id = $data->id;
            $GroupData->fee_concession_id = $group->id;
            $GroupData->amount = 0;
            $GroupData->percentage = 0;
            $GroupData->status = 1;
            $GroupData->save();
        }

        // Find other groups associated with the doctor
        $otherGroups = FeeConcession::where('doctor_id', $did->id)
            ->where('group_name', '<>', "Normal Group")
            ->get();

        // Associate the fee with other groups
        foreach ($otherGroups as $otherGroup) {
            $GroupData = new FeeConcessionGroup();
            $GroupData->fee_id = $data->id;
            $GroupData->fee_concession_id = $otherGroup->id;
            $GroupData->amount = 0;
            $GroupData->percentage = 0;
            $GroupData->status = 0;
            $GroupData->save();
        }



        if ($request->input('tax') == 1) {
            foreach ($request->input('taxType') as $key => $taxType) {
                $taxTypeData = new FeeTaxFee();
                $taxTypeData->fee_id = $data->id;
                $taxTypeData->tax_id = $request->input('taxType')[$key];
                $taxTypeData->save();
            }



        }

        return redirect()->route('list.fee')->with('success', 'Fee Added successfully!');
    }

    public function ListFee()
    {
        return view('Doctor.Fee.list');
    }

    public function ShowFee(Request $request)
    {

        if ($request->ajax()) {
            $item = Fee::join('doctors', 'fees.doctor_id', '=', 'doctors.id')
                ->where('doctors.user_id', auth()->user()->id)
                ->select('fees.*')
                ->orderby('fees.id', 'desc')
                ->get();

            return datatables::of($item)
                ->addColumn('actions', function ($item) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('edit.fee', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
                        <button class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>  
                    </div>
                    ';
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->addColumn('consultant_type', function ($item) {
                    $mode = $item->consultant_type == 0 ? 'Online' : 'Offline';
                    return $mode;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('Doctor.Fee.list');
    }


    public function EditFee($id)
    {
        $data = Fee::where('id', $id)->with('feeTaxFees')->first();

        $userDoctorId = auth()->user()->doctor->id;

        $items = TaxManager::where('doctor_id', $userDoctorId)->get();
        return view('Doctor.Fee.edit', compact('data', 'items'));

    }

    public function UpdateFee(Request $request, $id)
    {

        $data = $request->validate([
            'tittle' => 'required',
            'amount' => 'required',
            'tax_status' => 'required',
            'total_amount' => 'required',
            'consultant_type' => 'required',
        ]);
        Fee::where('id', $id)->update($data);
        $fee = Fee::findOrFail($id);
        $fee->update($data);
        $fee->feeTaxFees()->delete();

        if ($request->input('tax_status') == 1) {

            foreach ($request->input('taxType') as $key => $taxType) {
                $taxTypeData = new FeeTaxFee();
                $taxTypeData->fee_id = $fee->id;
                $taxTypeData->tax_id = $request->input('taxType')[$key];
                $taxTypeData->save();
            }
        } else {

            $fee->feeTaxFees()->delete();
        }
        return redirect()->route('list.fee')->with('success', 'Fee Updated successfully!');

    }
    function DeleteFee($id)
    {
        Fee::where('id', '=', $id)->delete();
    }
    public function UpdateStatusfee(Request $request)
    {

        $feeId = $request->input('feeId');
        $status = $request->input('status');

        $timeslot = Fee::find($feeId);
        $timeslot->status = $status;
        $timeslot->save();

        NotificationService::createNotification(auth()->user()->id, 'Tax Status Changed', 'You have Changed the status tax');

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function checkFeeAssociation($id)
    {
        // Check if the tax is associated with any fees
        $hasAssociation = BookingFee::where('fee_id', $id)->exists();

        return response()->json(['has_association' => $hasAssociation]);
    }
}