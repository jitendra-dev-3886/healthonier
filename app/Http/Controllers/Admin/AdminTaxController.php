<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use DataTables;
use App\Models\TaxManager;
use App\Models\Fee;
use Illuminate\Http\Request;

class AdminTaxController extends Controller
{


    public function DoctorTaxList()
    {
        return view('Admin.Tax.list');
    }

    public function DoctorTaxShow(Request $request)
    {
        if ($request->ajax()) {


            $items = TaxManager::with(['doctor.user'])->get();


            return datatables::of($items)
                ->addColumn('doctor', function ($item) {
                    return $item->doctor->doctor_name;
                })
                ->addColumn('tax_name', function ($item) {
                    return $item->tax_name;
                })
                ->addColumn('amount', function ($item) {
                    return $item->amount;
                })
                ->addColumn('tax_description', function ($item) {
                    return $item->tax_description;
                    
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['doctor','tax_name','amount','tax_description','status'])
                ->make(true);
        }
        return view('Admin.Tax.list');

    }


}