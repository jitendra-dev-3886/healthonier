<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use DataTables;
use App\Models\FeeConcession;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientAdded;
use App\Models\Notification;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Providers\NotificationService;


class DoctorPatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function DoctorAddPatient()
    {

        $userDoctorId = auth()->user()->doctor->id;
        $items = FeeConcession::where('doctor_id', $userDoctorId)->with('FeeConcessionGroup')
            ->get();

        return view('Doctor.Patient.add', compact('items'));

    }
    public function DoctorSubmitPatient(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',


        ]);
        $userDoctorId = auth()->user()->doctor->id;
        $email = User::where('email', $request->input('email'))->count();
        if ($email > 0) {
            return redirect()->route('doctor.add.patient')->with('success', 'This Email Is Already Exist!');

        } else {
            $formData = new User();
            $formData->name = $request->input('name');
            $formData->email = $request->input('email');
            $formData->password = $request->input('password');
            $formData->type = 2;
            $formData->save();
            if ($formData->id) {

                $patient = new Patient();
                $patient->user_id = $formData->id;
                $patient->doctor_id = $userDoctorId;
                $patient->number = $request->input('mobile');
                $patient->pincode = $request->input('pincode');
                $patient->age = $request->input('dob');
                $patient->address = $request->input('address');
                $patient->gender = $request->input('gender');
                $patient->fee_concessions_id = $request->input('group');
                $patient->bp = $request->input('bp');
                $patient->pulse = $request->input('pulse');
                $patient->height = $request->input('height');
                $patient->weight = $request->input('weight');
                $patient->temperature = $request->input('temperature');
                $patient->spo2 = $request->input('spo2');
                $patient->bmi = $request->input('bmi');
                $patient->save();

                if ($patient->id) {

                    if ($request->hasFile('image')) {

                        $image = $request->file('image');
                        $imageName = time() . '.' . $image->extension();
                        $image->storeAs('doctordata/patientprofile', $imageName, 'public');

                        DB::table('patients')
                            ->where('id', $patient->id)
                            ->update([
                                'image_name' => $imageName,
                                'image_path' => 'doctordata/patientprofile/' . $imageName,
                            ]);
                    }
                }


            }

            // Mail::to($formData->email)->send(new PatientAdded($formData->email, $request->input('password')));
            // $notificationData = new Notification();
            // $notificationData->user_id = auth()->user()->id;
            // $notificationData->type = "New Patient Added";
            // $notificationData->message = 'Doctor added ' . $request->input('name') . ' as a Patient ';
            // $notificationData->read = 0;
            // $notificationData->save();
            NotificationService::createNotification(auth()->user()->id, 'New Patient Added', 'Doctor added ' . $request->input('name') . ' as a Patient ');
            NotificationService::createNotification($formData->id, 'New Patient Adde', 'Dr.' . auth()->user()->name . ' added you ! Welcome to my Clinic . ');


            return redirect()->route('doctor.list.patient')->with('success', 'Patient Added successfully!');
        }

    }
    public function DoctorPatientList()
    {


        return view('Doctor.Patient.list');

    }
    public function DoctorPatientShow(Request $request)
    {
        if ($request->ajax()) {
            $userDoctorId = auth()->user()->doctor->id;
            $doctor = Doctor::findOrFail($userDoctorId);
            $items = User::join('patients', 'users.id', '=', 'patients.user_id')
                ->where('patients.doctor_id', $doctor->id)
                ->select('patients.*', 'users.name', 'users.email', 'users.status')
                ->orderBy('users.id', 'desc')->get();



            return datatables::of($items)
                // ->addColumn('group', function ($item) {
                //     $group = FeeConcession::where('id', $item->fee_concessions_id)
                //         ->first();
                //     if ($group) {
                //         $groupName = $group->group_name;

                //     } else {
                //         $groupName = "Normal Group";
                //     }
                //     return $groupName;
                // })
                ->addColumn('group', function ($data) {
                    $groups = FeeConcession::where('doctor_id',auth()->user()->doctor->id)->get();
                    $options = ['Select Group'];

                    foreach ($groups as $group) {
                        $options[$group->id] = $group->group_name;
                    }

                    return view('Doctor.Patient.dropdown', ['options' => $options, 'selected' => $data->fee_concessions_id,'userId' =>$data->user_id ]);
                })

                ->addColumn('actions', function ($item) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('doctor.edit.patient', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
                        <button class="icon_btn delete" data-id="' . $item->user_id . '"><i class="bi bi-trash"></i></button>  
                    </div>
                    ';
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->user_id . '" data-id="' . $item->user_id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }
        return view('Doctor.Patient.list');

    }
    public function DoctorEditPatient($id)
    {
        $userDoctorId = auth()->user()->doctor->id;
        $doctor = Doctor::findOrFail($userDoctorId);
        $item = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->where('patients.doctor_id', $doctor->id)
            ->where('patients.id', $id)
            ->select('patients.*', 'users.name', 'users.email', 'users.status')->first();
        // dd($item);
        $group = FeeConcession::where('doctor_id', $userDoctorId)->with('FeeConcessionGroup')
            ->get();
        return view('Doctor.Patient.edit', compact('item', 'group'));

    }
    public function DoctorUpdatePatient(Request $request, $id)
    {
        $user = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->where('patients.id', $id)
            ->update(['name' => $request->input('name')]);

        Patient::where('id', $id)->update([
            'fee_concessions_id' => $request->input('group'),
            'number' => $request->input('mobile'),
            'pincode' => $request->input('pincode'),
            'age' => $request->input('dob'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'bp' => $request->input('bp'),
            'pulse' => $request->input('pulse'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'temperature' => $request->input('temperature'),
            'spo2' => $request->input('spo2'),
            'bmi' => $request->input('bmi'),

        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('doctordata/patientprofile', $imageName, 'public');

            DB::table('patients')
                ->where('id', $id)
                ->update([
                    'image_name' => $imageName,
                    'image_path' => 'doctordata/patientprofile/' . $imageName,
                ]);
        }

        return redirect()->route('doctor.list.patient')->with('success', 'Patient Updated successfully!');
    }
    function DoctorDeletePatient($id)
    {
        User::where('id', '=', $id)->delete();
    }

    public function DoctorUpdateStatusPatient(Request $request)
    {

        $patientId = $request->input('patientId');
        $status = $request->input('status');
        $groupId = $request->input('group_id');
        $userId = $request->input('userId');
       
        if ($groupId) {
            $patient = Patient::where('user_id', $userId);
            if ($patient) {
               
                $user = Patient::where('user_id', $userId)
                    ->update(['fee_concessions_id' => $groupId]);
                   
                return response()->json(['success' => true, 'message' => 'Group updated successfully']);
            } else {
                return response()->json(['success' => true, 'message' => 'Group Not updated successfully']);
            }



        } else {
            $timeslot = User::find($patientId);
            $timeslot->status = $status;
            $timeslot->save();
            NotificationService::createNotification(auth()->user()->id, 'Patient Status Changed', 'You have Changed the status Patient');

            return response()->json(['message' => 'Status updated successfully']);

        }







    }
    public function DoctorDashboardPatient(Request $request, $id)
    {
        if ($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('Doctor.Patient.dashboard', compact('id'));

    }
    public function DoctorDashboardPatientBookingHistory(Request $request, $id)
    {


        if ($request->ajax()) {
            $doctorId = auth()->user()->doctor->id;
            $bookings = Booking::where('token', '!=', '')
                ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
                ->whereHas('clinic', function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId);
                })
                ->where('patient_id', $id)
                ->get();

            // dd($bookings);
            // return $clinicData;
            $counter = 1;

            return DataTables::of($bookings)

                ->addColumn('clinicName', function ($booking) {
                    return $booking->clinic->name;


                })
                ->addColumn('patientName', function ($booking) {
                    return $booking->patient->user->name;


                })

                ->addColumn('bookingDate', function ($booking) {
                    return $booking->booking_date;


                })
                ->addColumn('token', function ($booking) {
                    return $booking->token;


                })

                ->addColumn('patientMobile', function ($booking) {
                    return $booking->patient->number;


                })

                ->addColumn('group', function ($booking) {
                    return $booking->patient->feeConcessions->group_name;


                })
                ->addColumn('amount', function ($booking) {
                    return $booking->payment->recieved_amount;


                })
                ->addColumn('timeslots', function ($booking) {
                    // $timeslot = Timeslot::where('id', $booking->timeslot_id)->first();
                    // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                    // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                    // $label = $startTime . ' - ' . $endTime;
    

                    return $booking->time;
                })
                ->addColumn('payment', function ($booking) {
                    if ($booking->payment->status == 'paid') {
                        $buttonText = 'Paid';
                        $btncolor = 'bg-success';
                        $modalId = '#';


                    } else {
                        $btncolor = 'bg-danger';
                        $buttonText = 'Unpaid';
                        $modalId = '#payment';

                    }

                    return '<button class="btn ' . $btncolor . ' modal-button" data-toggle="modal" data-target="' . $modalId . '" data-id="' . $booking->id . '" data-amount="' . $booking->payment->amount . '">' . $buttonText . '</button>';

                })

                ->addColumn('status', function ($booking) {
                    $buttonText = '';

                    if ($booking->status === 0) {
                        $buttonText = 'Pending';
                        $color = 'badge bg-danger';
                    } elseif ($booking->status === 1) {
                        $buttonText = 'Processing';
                        $color = 'badge bg-secondary';
                    } elseif ($booking->status === 2) {
                        $buttonText = 'Completed';
                        $color = 'badge bg-primary';
                    } else {
                        $color = '';

                    }

                    return '<span class=" ' . $color . '" >' . $buttonText . '</span>';

                })
                ->addColumn('serial', function () use (&$counter) {

                    return $counter++;
                })

                ->rawColumns(['amount', 'payment', 'clinicName', 'patientName', 'patientMobile', 'bookingDate', 'token', 'timeslots', 'group', 'status', 'serial'])
                ->make(true);



        }

        return view('Doctor.Patient.dashboards');
    }
    public function DoctorPatientBookingPrescription(Request $request, $id)
    {
        return view('Doctor.Bookings.prescription', compact('id'));

    }
}