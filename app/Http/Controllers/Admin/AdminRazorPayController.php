<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\Doctor;
use App\Models\User;

use Illuminate\Http\Request;

class AdminRazorPayController extends Controller
{


    public function ListRazorPay()
    {
        return view('Admin.Razorpay.list');
    }

    public function ShowRazorPay(Request $request)
    {
        if ($request->ajax()) {
            $doctordata = User::join('doctors', 'users.id', '=', 'doctors.user_id')->get();

            return datatables::of($doctordata)
                ->addColumn('actions', function ($doctordata) {
                    if ($doctordata->razor_pay_key_id != '') {
                        return '
                        <div class="d-flex">
                            <a href="' . route('admin.edit.doctorrazorpay', $doctordata->user_id) . '" class="icon_btn" data-id="' . $doctordata->id . '"><i class="bi bi-pen"></i></a>
                        </div>
                    ';
                    } else {
                        return '
                        <div class="d-flex">
                            <a href="' . route('admin.add.doctorrazorpay', $doctordata->user_id) . '" class="icon_btn" data-id="' . $doctordata->id . '"><i class="bi bi-box"></i></a>  
                        </div>
                    ';
                    }
                })

                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('Admin.Razorpay.list');



    }
    public function AddRazorPay($id)
    {

        return view('Admin.Razorpay.add', compact('id'));

    }
    public function SubmitRazorPay(Request $request)
    {

        DB::table('doctors')
            ->where('user_id', $request->input('doctorid'))
            ->update(['razor_pay_key_id' => $request->input('razorpaykeyid'), 'razor_pay_key_secret' => $request->input('razorpaysecretkey')]);

        return redirect()->route('admin.list.doctorrazorpay')->with('success', 'Doctor Razorpay Deatil Added successfully!');

    }
    public function EditRazorPay($id)
    {

        $data = Doctor::where('user_id', $id)->first();
        return view('Admin.Razorpay.edit', compact('data', 'id'));

    }
    public function UpdateRazorPay(Request $request)
    {
        DB::table('doctors')
            ->where('user_id', $request->input('doctorid'))
            ->update(['razor_pay_key_id' => $request->input('razorpaykeyid'), 'razor_pay_key_secret' => $request->input('razorpaysecretkey')]);

        return redirect()->route('admin.list.doctorrazorpay')->with('success', 'Doctor Razorpay Deatil updated successfully!');


    }



}