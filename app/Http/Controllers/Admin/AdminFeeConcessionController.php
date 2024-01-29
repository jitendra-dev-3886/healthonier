<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use DataTables;
use App\Models\Fee;
use Illuminate\Http\Request;

use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;

class AdminFeeConcessionController extends Controller
{


    public function DoctorFeeConcessionList()
    {
        return view('Admin.FeeConcession.list');
    }

    public function DoctorFeeConcessionShow(Request $request)
    {
        if ($request->ajax()) {


            $items = FeeConcession::join('doctors', 'fee_concessions.doctor_id', '=', 'doctors.id')
                ->with('FeeConcessionGroup')
                ->get();
            


            return datatables::of($items)
                ->addColumn('doctor', function ($item) {
                    return $item->doctor_name;
                })
                ->addColumn('group_name', function ($item) {
                    return $item->group_name;
                })

                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['doctor', 'group_name', 'status'])
                ->make(true);
        }
        return view('Admin.FeeConcession.list');

    }


}