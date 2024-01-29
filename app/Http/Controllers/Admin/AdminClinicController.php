<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Clinic;
use App\Models\Timeslot;
use App\Models\Weekday;
use App\Models\Doctor;
use Carbon\Carbon;
use App\Models\Checkavailability;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;



class AdminClinicController extends Controller
{
    public function ListClinic()
    {
        return view('Admin.Clinic.list');
    }
    public function ShowClinic(Request $request)
    {

        if ($request->ajax()) {
            $doctor_id = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();
            // dd($doctor_id);
            $item = Clinic::with(['availabilities', 'doctor.user'])->get();
     
            // return $item[0]->availabilities;
            return datatables::of($item)
            ->addColumn('doctor', function ($item) {
                return $item->doctor->doctor_name;
            })
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
                ->rawColumns(['doctor','status', 'actions', 'weekly_days'])
                ->make(true);



        }

        return view('Admin.Clinic.list');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddClinic($id)
    {
        $timeslot = Timeslot::where('id', $id)->first();
        $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
        $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
        $label = $startTime . ' - ' . $endTime;
        $Weekdays = Weekday::where('status', 1)->get();

        return view('Admin.Clinic.add', compact('Weekdays', 'label', 'timeslot'));
    }
    public function SubmitClinic(Request $request)
    {
        // dd($request->all());

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
            'timeSlot' => 'required'
        ]);

        $selectedWeekdays = $request->input('weekdays');
        $serializedWeekdays = serialize($selectedWeekdays);
        $did = Doctor::where('id', $request->input('doctor_id'))->first();

        $formData = new Clinic();
        $formData->doctor_id = $did->id;
        $formData->name = $request->input('name');
        $formData->address = $request->input('address');
        $formData->contact_number = $request->input('number');
        $formData->save();

        if ($formData->id) {
            $clinicData = new Checkavailability();
            $clinicData->clinic_id = $formData->id;
            $clinicData->weekday_id = $serializedWeekdays;
            $clinicData->timeslot_id = $request->input('timeSlot');

            $clinicData->save();
        }

        return redirect()->route('admin.list.clinic')->with('success', 'Clinic Added successfully!');
    }


    public function EditClinic($id)
    {
        $item = DB::table('clinicavailabilities')
            ->join('clinics', 'clinicavailabilities.clinic_id', '=', 'clinics.id')
            ->select('clinicavailabilities.timeslot_id', 'clinicavailabilities.weekday_id', 'clinics.doctor_id', 'clinics.id')
            ->where('clinics.id', $id)
            ->first();
        //dd($item);
        $timeslot = Timeslot::where('id', $item->timeslot_id)->first();
        $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
        $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
        $label = $startTime . ' - ' . $endTime;



        $storedArray = unserialize($item->weekday_id);
        $days = Weekday::where('status', 1)->get();



        $data = DB::table('clinicavailabilities')
            ->join('clinics', 'clinicavailabilities.clinic_id', '=', 'clinics.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')

            ->where('clinicavailabilities.clinic_id', $id)
            ->first();

        return view('Admin.Clinic.edit', compact('data', 'days', 'label', 'storedArray', 'id', 'timeslot'));





        // Pass the $item to the view for editing
        // return view('Doctor.Clinic.edit', compact('item'));
    }
    public function UpdateClinic(Request $request, $id)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',

        ]);
        $selectedWeekdays = $request->input('weekdays');
        $serializedWeekdays = serialize($selectedWeekdays);
        DB::table('clinics')
            ->where('id', $id)
            ->update(['name' => $request->input('name'), 'address' => $request->input('address'), 'contact_number' => $request->input('number'), 'fee' => $request->input('fee')]);

        DB::table('clinicavailabilities')
            ->where('clinic_id', $id)
            ->update(['weekday_id' => $serializedWeekdays, 'timeslot_id' => $request->input('timeSlot')]);
        return redirect()->route('admin.list.clinic')->with('success', 'clicninc updated successfully');


    }

    function ClinicDelete($id)
    {
        try {
            $doctor = Clinic::findOrFail($id);
            $doctor->delete();
            return response()->json(['message' => 'clinic deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete speciality'], 500);
        }

    }
}