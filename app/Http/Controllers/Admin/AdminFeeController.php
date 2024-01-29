<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use DataTables;
use App\Models\Fee;
use Illuminate\Http\Request;

class AdminFeeController extends Controller
{


    public function DoctorFeeList()
    {
        return view('Admin.Fee.list');
    }

    public function DoctorFeeShow(Request $request)
    {
        if ($request->ajax()) {


            $items = Fee::join('doctors', 'fees.doctor_id', '=', 'doctors.id')
                ->orderby('fees.id', 'desc')
                ->get();


            return datatables::of($items)
                ->addColumn('doctor', function ($item) {
                    return $item->doctor_name;
                })
                ->addColumn('fee_name', function ($item) {
                    return $item->tittle;
                })
                ->addColumn('amount', function ($item) {
                    return $item->amount;
                })
                ->addColumn('consultant_type', function ($item) {
                    $mode = $item->consultant_type == 0 ? 'Online' : 'Offline';
                    return $mode;
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['doctor', 'fee_name', 'amount', 'consultant_type', 'status'])
                ->make(true);
        }
        return view('Admin.Tax.list');

    }


}