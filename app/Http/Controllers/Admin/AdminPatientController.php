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

class AdminPatientController extends Controller
{


    public function DoctorPatientList()
    {
        return view('Admin.Patient.list');
    }

    public function DoctorPatientShow(Request $request)
    {
        if ($request->ajax()) {


            $items = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->join('doctors', 'patients.doctor_id', '=', 'doctors.id')
                ->select('patients.*', 'users.name', 'users.email', 'users.status','doctors.doctor_name')
                ->orderBy('users.id', 'desc')->get();



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
                ->addColumn('group', function ($item) {
                    $groups = FeeConcession::where('id',$item->fee_concessions_id)->first();

                   return $groups->group_name;
                })
                ->rawColumns(['doctor', 'status','group'])
                ->make(true);
        }
        return view('Admin.Patient.list');

    }


}