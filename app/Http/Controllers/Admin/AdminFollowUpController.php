<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use DataTables;
use App\Models\FollowUp;
use Illuminate\Http\Request;

use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;

class AdminFollowUpController extends Controller
{


    public function DoctorFollowUpList()
    {
        return view('Admin.FollowUp.list');
    }

    public function DoctorFollowUpShow(Request $request)
    {
        if ($request->ajax()) {


            $items = FollowUp::join('doctors', 'follow_ups.doctor_id', '=', 'doctors.id')
                ->get();



            return datatables::of($items)
                ->addColumn('doctor', function ($item) {
                    return $item->doctor_name;
                })

                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['doctor', 'status'])
                ->make(true);
        }
        return view('Admin.FollowUp.list');

    }


}