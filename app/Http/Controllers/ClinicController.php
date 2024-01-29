<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Weekday;
use App\Models\Timeslot;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Checkavailability;
use Illuminate\Support\Facades\DB;
use App\Providers\NotificationService;

class ClinicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddClinic()
    {
        $Weekdays = Weekday::where('status', 1)->get();
        return view('Doctor.Clinic.add', compact('Weekdays'));
    }
    public function SubmitClinic(Request $request)
    {



        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'weekdays' => 'required|array',
            'starttime' => 'required|array',
            'endtime' => 'required|array',
            'booking' => 'required|array',

        ]);
        $weekdays = $request->input('weekdays');
        $startTimes = $request->input('starttime');
        $endTimes = $request->input('endtime');
        $bookings = $request->input('booking');
        $did = Doctor::where('user_id', auth()->user()->id)->first();

        $selectedWeekdays = $request->input('weekdays');
        $serializedWeekdays = serialize($selectedWeekdays);


        $formData = new Clinic();
        $formData->doctor_id = $did->id;
        $formData->name = $request->input('name');
        $formData->address = $request->input('address');
        $formData->contact_number = $request->input('number');
        $formData->save();


        if ($formData->id) {
            for ($i = 0; $i < count($weekdays); $i++) {
                if ($bookings[$i] != null) {
                    $timeslotdata = new Timeslot();
                    $timeslotdata->doctor_id = $did->id;
                    $timeslotdata->start_time = $startTimes[$i];
                    $timeslotdata->end_time = $endTimes[$i];
                    $timeslotdata->slots = $bookings[$i];
                    $timeslotdata->save();
                    $clinicData = new Checkavailability();
                    $clinicData->clinic_id = $formData->id;
                    $clinicData->weekday_id = $weekdays[$i];

                    $clinicData->timeslot_id = $timeslotdata->id;
                    $clinicData->save();

                }


            }

        }

        NotificationService::createNotification(auth()->user()->id, 'Clinic Added', 'You have added ' . $request->input('name') . ' in a Clinic');

        return redirect()->route('list.clinic')->with('success', 'Clinic Added successfully!');



    }

    public function ListClinic()
    {
        return view('Doctor.Clinic.list');
    }
    public function ShowClinic(Request $request)
    {

        if ($request->ajax()) {
            $doctor_id = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();
            // dd($doctor_id);
            $item = Clinic::where('doctor_id', $doctor_id)->with(['availabilities', 'doctor.user'])->get();
            // return $item[0]->availabilities;
            return datatables::of($item)
                ->addColumn('weekly_days', function ($item) {
                    return json_encode($item->clinic_availabilities);
                })
                ->addColumn('actions', function ($item) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('edit.clinic', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
                        <button style="display:none"class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>  </div>
                     
                    ';
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['status', 'actions', 'weekly_days'])
                ->make(true);



        }

        return view('Doctor.Clinic.list');
    }
    public function EditClinic($id)
    {

        $doctor_id = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();
        $item = Clinic::where('doctor_id', $doctor_id)->where('id', $id)->with(['availabilities', 'doctor.user'])->get();
        $Weekdays = Weekday::where('status', 1)->get();


        return view('Doctor.Clinic.edit', compact('item', 'Weekdays'));

    }
    public function UpdateClinic(Request $request, $id)
    {
        // dd($request->all());


        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'weekdays' => 'required|array',
            'starttime' => 'required|array',
            'endtime' => 'required|array',
            'booking' => 'required|array',
        ]);
        $clinicdata = Clinic::where('id', $id)->first();
        NotificationService::createNotification(auth()->user()->id, 'Clinic Updated', 'You have updated ' . $clinicdata->name . '  in a Clinic');
        $weekdays = $request->input('weekdays');
        $startTimes = $request->input('starttime');
        $endTimes = $request->input('endtime');
        $bookings = $request->input('booking');

        $clinic = Clinic::find($id);
        $clinic->name = $request->input('name');
        $clinic->address = $request->input('address');
        $clinic->contact_number = $request->input('number');
        $clinic->save();
        // dd($clinic->availabilities[0]->timeslots()->delete());
        foreach ($clinic->availabilities as $timeslot) {
            $timeslot->timeslots()->delete();
        }


        $clinic->availabilities()->delete();


        for ($i = 0; $i < count($weekdays); $i++) {
            $timeslot = new Timeslot();
            $timeslot->doctor_id = $clinic->doctor_id;
            $timeslot->start_time = $startTimes[$i];
            $timeslot->end_time = $endTimes[$i];
            $timeslot->slots = $bookings[$i];
            $timeslot->save();

            $availability = new Checkavailability();
            $availability->weekday_id = $weekdays[$i];
            $availability->timeslot_id = $timeslot->id;

            $clinic->availabilities()->save($availability);
        }


        return redirect()->route('list.clinic')->with('success', 'clicninc updated successfully');


    }
    public function UpdateStatusClinic(Request $request)
    {
        $testimonialId = $request->input('clinicId');
        $status = $request->input('status');
        $clinic = Clinic::find($testimonialId);
        $clinic->status = $status;
        $clinic->save();
        $data = DB::table('clinicavailabilities')
            ->join('clinics', 'clinicavailabilities.clinic_id', '=', 'clinics.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->where('clinics.id', $testimonialId)
            ->update(['timeslots.status' => $status]);
        NotificationService::createNotification(auth()->user()->id, 'Clinic Status', 'You have chnaged the status of ' . $clinic->name . '  in a Clinic');

        return response()->json(['message' => 'Status updated successfully']);
    }




}