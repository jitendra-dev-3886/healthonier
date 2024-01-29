<?php

namespace App\Http\Controllers;

use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;
use App\Models\Fee;
use App\Models\Doctor;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Models\Patient;

class FeeConcessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddFeeConcession()
    {
        $item = Fee::join('doctors', 'fees.doctor_id', '=', 'doctors.id')
            ->where('doctors.user_id', auth()->user()->id)
            ->where('fees.status', 1)
            ->select('fees.*')
            ->get();
        return view('Doctor.Fee_Concession.add', ['item' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function SubmitFeeConcession(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'fee_tittle' => 'required|array',
            'amount' => 'required|array',

        ]);


        $did = Doctor::where('user_id', auth()->user()->id)->first();
        $data = new FeeConcession();
        $data->doctor_id = $did->id;
        $data->group_name = $request->input('group_name');
        $data->save();

        foreach ($request->input('fee_tittle') as $key => $fee_tittle) {
            $statuscheck = isset($request->input('statuscheck')[$key]) && $request->input('statuscheck')[$key] == "on" ? 1 : 0;

            $per = isset($request->input('percentageCheckbox')[$key]) && $request->input('percentageCheckbox')[$key] == "on" ? 1 : 0;
            $FeeId = Fee::where('tittle', $fee_tittle)->first();
            $GroupData = new FeeConcessionGroup();
            $GroupData->fee_id = $FeeId->id;
            $GroupData->fee_concession_id = $data->id;
            $GroupData->amount = $request->input('amount')[$key];
            $GroupData->percentage = $per;
            $GroupData->status = $statuscheck;
            $GroupData->save();
        }
        return redirect()->route('list.fee.concession')->with('success', 'Fee Concession Added successfully!');
    }

    public function ListFeeConcession()
    {
        return view('Doctor.Fee_Concession.list');
    }

    public function ShowFeeConcession(Request $request)
    {

        if ($request->ajax()) {
            $userDoctorId = auth()->user()->doctor->id;

            $items = FeeConcession::where('doctor_id', $userDoctorId)->with('FeeConcessionGroup')
                ->get();

            return datatables::of($items)

                ->addColumn('actions', function ($item) {
                    $deleteButton = '';
                    if ($item->group_name != 'Normal Group') {
                        $deleteButton = '<button class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>';
                    }
                    return '
                    <div class="d-flex">
                        <a href="' . route('edit.fee.concession', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
                        ' . $deleteButton . '
                    </div>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('Doctor.Fee_Concession.list');
    }



    public function EditFeeConcession($id)
    {
        $userDoctorId = auth()->user()->doctor->id;

        $data = FeeConcession::where('id', $id)->first();
        // $item = Fee::join('fee_concession_groups', 'fees.id', '=', 'fee_concession_groups.fee_id')
        //     ->where('fees.doctor_id', $userDoctorId)
        //     ->where('fee_concession_groups.fee_concession_id', $id)
        //     ->select('fees.*', 'fee_concession_groups.status as feestatus', 'fee_concession_groups.amount', 'fee_concession_groups.percentage', 'fee_concession_groups.fee_concession_id', 'fee_concession_groups.status as st')
        //     ->get();

        $item = FeeConcessionGroup::with('fee')
            ->where('fee_concession_id', $id)
            ->get();
        // dd($item);
        return view('Doctor.Fee_Concession.edit', compact('data', 'item'));

    }

    public function UpdateFeeConcession(Request $request, $id)
    {


        $request->validate([
            'group_name' => 'required',
            'fee_tittle' => 'required|array',
            'amount' => 'required|array',
        ]);


        $feeConcession = FeeConcession::findOrFail($id);
        $feeConcession->group_name = $request->input('group_name');
        $feeConcession->save();

        // Delete existing related FeeConcessionGroup records
        $feeConcession->FeeConcessionGroup()->delete();

        foreach ($request->input('fee_tittle') as $key => $fee_tittle) {
            $per = isset($request->input('percentageCheckbox')[$key]) && $request->input('percentageCheckbox')[$key] == "on" ? 1 : 0;
            $statuscheck = isset($request->input('statuscheck')[$key]) && $request->input('statuscheck')[$key] == "on" ? 1 : 0;
            $FeeId = Fee::where('tittle', $fee_tittle)->first();
            $GroupData = new FeeConcessionGroup();
            $GroupData->fee_id = $FeeId->id;
            $GroupData->fee_concession_id = $feeConcession->id;
            $GroupData->amount = $request->input('amount')[$key];
            $GroupData->status = $statuscheck;
            $GroupData->percentage = $per;
            $GroupData->save();
        }







        return redirect()->route('list.fee.concession')->with('success', 'Fee Concession Updated successfully!');

    }
    function DeleteFeeConcession($id)
    {
        FeeConcession::where('id', '=', $id)->delete();
    }
    public function checkFeeConcessionAssociation($id)
    {
        // Check if the tax is associated with any fees
        $hasAssociation = Patient::where('fee_concessions_id', $id)->exists();

        return response()->json(['has_association' => $hasAssociation]);
    }
}