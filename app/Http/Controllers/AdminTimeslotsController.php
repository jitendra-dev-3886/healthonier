<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeslot;
use App\Models\Weekday;
use App\Models\User;
use App\Models\Doctor;
use Carbon\Carbon;
use DataTables;
use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;


class AdminTimeslotsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function ListTimeslot()
    {
        return view('Admin.Timeslot.list');
    }
    public function AddTimeslot()
    {

        $items = Timeslot::where('status', 1)->get();
        $Weekdays = Weekday::where('status', 1)->get();
        $doctor = Doctor::join('users', 'doctors.user_id', '=', 'users.id')
            ->select('doctors.id as id', 'doctors.user_id', 'users.status', 'doctors.doctor_name as name')
            ->where('users.status', 1)->get();


        return view('Admin.Timeslot.add', compact('Weekdays', 'items', 'doctor'));
    }
    public function SubmitTimeslot(Request $request)
    {
      
        $validatedData = $request->validate([
            'starttime' => 'required',
            'endtime' => 'required',
            'booking' => 'required',
            'doctor' => 'required'
        ]);
        $startTime = Carbon::createFromFormat('h:i A', $request->input('starttime'))->format('H:i:s');
        $endTime = Carbon::createFromFormat('h:i A', $request->input('endtime'))->format('H:i:s');
        //dd($startTime);
        $formData = new Timeslot();
        $formData->doctor_id = $request->input('doctor');
        $formData->start_time = $startTime;
        $formData->end_time = $endTime;
        $formData->slots = $request->input('booking');
        $formData->save();
        return redirect()->route('admin.list.timeslot')->with('success', 'Timeslot Added successfully!');

    }

    public function ShowTimeslot(Request $request)
    {

        if ($request->ajax()) {
            $item = Timeslot::join('doctors', 'timeslots.doctor_id', '=', 'doctors.id')
                ->select('timeslots.*', 'doctors.doctor_name as name')->get();
            return datatables::of($item)
                ->addColumn('actions', function ($item) {
                    return '
                     <div class="d-flex">
                        <a href="' . route('admin.edit.timeslot', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pen"></i></a> 
                        <button style="display:none" class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>
                        </div>
                    ';
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : ''; // Assuming the status is stored as a boolean value in the database
    
                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->addColumn('timeslots', function ($item) {
                    $timeslot = Timeslot::where('id', $item->id)->first();
                    $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                    $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                    $label = $startTime . ' - ' . $endTime;
                    $clinicname = Clinic::join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')->
                        where('clinicavailabilities.timeslot_id', $item->id)->first();
                    if ($clinicname) {
                        $link = route('admin.edit.clinic', $clinicname->clinic_id);


                    } else {
                        $link = route('admin.add.clinic', $timeslot->id);
                    }


                    // return $label;
                    return '
                    <a href="' . $link . '" class="badge bg-success text-white" data-id="' . $timeslot->id . '">' . $label . '</a> 
                    <a href="' . $link . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-building"></i>
                    </i></a> 
                ';
                })
                ->addColumn('clinicname', function ($item) {

                    $clinicname = Clinic::join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')->
                        where('clinicavailabilities.timeslot_id', $item->id)->first();
                    if ($clinicname) {
                        return $clinicname->name;

                    } else {
                        return "No clinic Add";

                    }




                })

                ->rawColumns(['actions', 'timeslots', 'status', 'clinicname'])
                ->make(true);



        }

        return view('Admin.Timeslot.list');
    }


    public function UpdateStatusTimeslot(Request $request)
    {
        $timeslotId = $request->input('timeslotId');
        $status = $request->input('status');

        // Update the status of the timeslot in the database
        $timeslot = Timeslot::find($timeslotId);
        $timeslot->status = $status;
        $timeslot->save();

        $data = DB::table('clinicavailabilities')
            ->join('clinics', 'clinicavailabilities.clinic_id', '=', 'clinics.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->where('clinicavailabilities.timeslot_id', $timeslotId)
            ->update(['clinics.status' => $status]);

        // You can return a response if needed
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function EditTimeslot($id)
    {
        // dd($id);

        $timeslots = Timeslot::where('id', $id)->first();
        $dateTime = Carbon::createFromFormat('H:i:s', $timeslots->start_time);
        $startTime = $dateTime->format('h:i A');
        $dateTime2 = Carbon::createFromFormat('H:i:s', $timeslots->end_time);
        $endTime = $dateTime2->format('h:i A');

        return view('Admin.Timeslot.edit', compact('timeslots', 'startTime', 'endTime'));
    }

    public function UpdateTimeslot(Request $request, $id)
    {
        $validatedData = $request->validate([
            'starttime' => 'required',
            'endtime' => 'required',
            'booking' => 'required',
        ]);

        $startTime = Carbon::createFromFormat('h:i A', $request->input('starttime'))->format('H:i:s');
        $endTime = Carbon::createFromFormat('h:i A', $request->input('endtime'))->format('H:i:s');
        DB::table('timeslots')
            ->where('id', $id)
            ->update(['start_time' => $startTime, 'end_time' => $endTime, 'slots' => $request->input('booking')]);
        return redirect()->route('admin.list.timeslot')->with('success', 'Timeslots updated successfully');


    }
    function TimeslotDelete($id)
    {
        try {
            $data = DB::table('clinicavailabilities')
                ->join('clinics', 'clinicavailabilities.clinic_id', '=', 'clinics.id')
                ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
                ->where('clinicavailabilities.timeslot_id', $id)
                ->first();
            DB::table('timeslots')->where('id', '=', $data->timeslot_id)->delete();
            DB::table('clinicavailabilities')->where('timeslot_id', '=', $data->timeslot_id)->delete();
            DB::table('clinics')->where('id', '=', $data->clinic_id)->delete();




            return response()->json(['message' => 'Timeslot deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Timeslot'], 500);
        }

    }
}