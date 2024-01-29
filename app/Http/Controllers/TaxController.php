<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxManager;
use App\Models\Fee;
use App\Providers\NotificationService;
use App\Models\FeeTaxFee;
use DataTables;

class TaxController extends Controller
{
    public function AddTax()
    {
        return view('Doctor.Tax.add');

    }
    public function SubmitTax(Request $request)
    {

        $userDoctorId = auth()->user()->doctor->id;

        foreach ($request->input('name') as $key => $fee_tittle) {
            $TaxData = new TaxManager();
            $TaxData->doctor_id = $userDoctorId;
            $TaxData->tax_name = $request->input('name')[$key];
            $TaxData->amount = $request->input('amount')[$key];
            $TaxData->tax_description = $request->input('description')[$key];
            $TaxData->save();
        }




        return redirect('/list-tax')->with('success', 'Tax created successfully!');
    }
    public function ListTax()
    {
        return view('Doctor.Tax.list');

    }
    public function ShowTax(Request $request)
    {
        if ($request->ajax()) {
            $userDoctorId = auth()->user()->doctor->id;

            $items = TaxManager::where('doctor_id', $userDoctorId)->get();



            return datatables::of($items)

                ->addColumn('actions', function ($item) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('edit.tax', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
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
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }
        return view('Doctor.Tax.list');

    }
    public function EdittTax($id)
    {
        $item = TaxManager::where('id', $id)->first();
        return view('Doctor.Tax.edit', compact('item'));

    }
    public function UpdateTax(Request $request, $id)
    {
        $data = $request->validate([
            'tax_name' => 'required',
            'amount' => 'required',
            'tax_description' => 'required'
        ]);
        TaxManager::where('id', $id)->update($data);
        return redirect()->route('list.tax')->with('success', 'Tax Updated successfully!');
    }
    function DeleteTax($id)
    {
        TaxManager::where('id', '=', $id)->delete();
    }

    public function UpdateStatusTax(Request $request)
    {

        $taxId = $request->input('taxID');
        $status = $request->input('status');

        $timeslot = TaxManager::find($taxId);
        $timeslot->status = $status;
        $timeslot->save();

        NotificationService::createNotification(auth()->user()->id, 'Tax Status Changed', 'You have Changed the status tax');

        return response()->json(['message' => 'Status updated successfully']);
    }
    public function checkTaxAssociation($id)
    {
        // Check if the tax is associated with any fees
        $hasAssociation = FeeTaxFee::where('tax_id', $id)->exists();

        return response()->json(['has_association' => $hasAssociation]);
    }

}