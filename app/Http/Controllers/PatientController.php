<?php


namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Booking;
use App\Models\FeeConcessionGroup;
use Carbon\Carbon;
use App\Models\Prescription;
use App\Providers\NotificationService;
use Carbon\CarbonInterval;
use App\Models\Notification;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $patientId = auth()->user()->patient->id;
    // $booking = Booking::where('patient_id', $patientId)
    //   ->where('booking_date', Carbon::now()->format('Y-m-d'))
    //   ->whereIn('status', [0, 1, 3])
    //   ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
    //   ->first();

    // if ($booking) {
    //   $clinicId = $booking->clinic->id;
    //   $tokens = Booking::where('token', '!=', '')
    //     ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
    //     ->whereHas('clinic', function ($query) use ($clinicId) {
    //       $query->where('id', $clinicId);
    //     })
    //     ->get();
    //   $pendingdata = Booking::where('bookings.token', '<', $booking->token)
    //     ->where('status', 0)
    //     ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
    //     ->count();
    //   $latestBooking = Booking::
    //     whereNotNull('time_in')
    //     ->whereNotNull('time_out')
    //     ->where('status', 2)
    //     ->orderBy('id', 'desc')
    //     ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
    //     ->first();
    //   if ($latestBooking) {
    //     $timeIn = Carbon::parse($latestBooking->time_in);
    //     $timeOut = Carbon::parse($latestBooking->time_out);

    //     $timeDifference = $timeIn->diffInMinutes($timeOut);

    //     // dd($timeDifference * 4);

    //     $totaltime = CarbonInterval::minutes($timeDifference * $pendingdata)->cascade()->forHumans();

    //     $estimatedTimeDifference = $totaltime;
    //   } else {
    //     $estimatedTimeDifference = 0;

    //   }


    // } else {
    //   $tokens = null;
    //   $estimatedTimeDifference = null;
    // }
    $Today = Carbon::now()->format('Y-m-d');
    $Pending = Booking::where('booking_date', $Today)
      ->where('status', 0)
      ->where('patient_id', $patientId)
      ->count();

    $Completed = Booking::where('booking_date', $Today)
      ->where('status', 2)
      ->where('patient_id', $patientId)
      ->count();

    return view('Patient.index', compact('Pending', 'Completed'));

    // return view('Patient.index', compact('tokens', 'booking', 'estimatedTimeDifference'));
  }

  public function PatientMeeting()
  {

    return view('Patient.Meeting.list');
  }
  public function ShowPatientMeeting(Request $request)
  {

    if ($request->ajax()) {

      $patientId = auth()->user()->patient->id;
      $items = Booking::where('token', '!=', '')->where('patient_id', $patientId)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
        ->get();
      // dd($items);
      $counter = 1;
      return datatables::of($items)
        ->addColumn('serial', function () use (&$counter) {

          return $counter++;
        })
        ->addColumn('clinicName', function ($booking) {
          return $booking->clinic->name;


        })
        ->addColumn('bookingDate', function ($booking) {
          return $booking->booking_date;


        })
        ->addColumn('token', function ($booking) {
          return $booking->token;


        })
        ->addColumn('timeslots', function ($booking) {
          // $timeslot = Timeslot::where('id', $booking->timeslot_id)->first();
          // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
          // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
          // $label = $startTime . ' - ' . $endTime;
  

          return $booking->time;
        })
        ->addColumn('status', function ($booking) {
          if ($booking->status == 0) {
            $buttonText = 'Pending';
            $btncolor = 'bg-warning';



          } elseif ($booking->status == 1) {
            $buttonText = 'Processing';
            $btncolor = 'bg-primary';



          } elseif ($booking->status == 2) {
            $buttonText = 'Completed';
            $btncolor = 'bg-success';



          } else {
            $btncolor = 'bg-danger';
            $buttonText = 'Cancelled';


          }

          return '<button class="btn ' . $btncolor . '">' . $buttonText . '</button>';

        })
        ->addColumn('invoice', function ($booking) {
          $invoice = '<a class="view-prescription-link" href="' . route('patient.clinic.visit.invoice', ['id' => $booking->id]) . '">Invoice</a>';

          return $invoice;


        })

        ->addColumn('prescription', function ($booking) {
          if ($booking->status === 2) {
            $prescriptions = Prescription::where('booking_id', $booking->id)->with('medicines', 'prescribedTests')->first();
            if ($prescriptions) {
              $prescriptionLinkView = '<a class="view-prescription-link" href="' . route('patient.clinic.visit.prescription', ['id' => $booking->id]) . '">View Prescription</a>';
            } else {
              $prescriptionLinkView = '';
            }

            return $prescriptionLinkView;
          }




        })
        ->rawColumns(['serial', 'status', 'timeslots', 'token', 'bookingDate', 'invoice', 'prescription'])
        ->make(true);



    }

    return view('Patient.Meeting.list');
  }
  public function ClinicVisitInvoice(Request $request, $id)
  {
    try {


      $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
        ->first();
      $fees = FeeConcessionGroup::with('fee')
        ->where('fee_concession_id', $booking->patient->fee_concessions_id)
        ->where('status', 1)
        ->whereIn('fee_id', $booking->bookingFee->pluck('fee_id'))
        ->get();
      // dd($fees);



      return view('Patient.Meeting.invoice', compact('booking', 'fees'));
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }
  public function ClinicVisitPrescription(Request $request, $id)
  {
    try {
      $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
        ->first();
      $prescription = Prescription::where('booking_id', $id)->with('medicines', 'prescribedTests')->first();
      return view('Patient.Meeting.viewprescription', compact('booking', 'prescription'));
    } catch (\Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }
  public function markAsRead($id)
  {

    DB::table('notifications')
      ->where('id', $id)
      ->update(['read' => 1]);

    return redirect()->back();
  }
  public function AllMarkAsRead($id)
  {

    DB::table('notifications')
      ->where('user_id', $id)
      ->update(['read' => 1]);
    return redirect()->back();
  }
  public function ListNotification()
  {
    return view('Patient.Notification.list');
  }
  public function ShowNotification(Request $request)
  {

    if ($request->ajax()) {
      $item = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
      $counter = 1;

      return datatables::of($item)
        ->addColumn('serial', function () use (&$counter) {
          return $counter++;
        })
        ->addColumn('message', function ($item) {
          $readClass = $item->read ? 'read' : 'unread';
          $backgroundColor = $item->read ? 'white' : 'lightcoral';

          return '<div class="' . $readClass . '" style="background-color: ' . $backgroundColor . ';">' . $item->message . '</div>';
        })
        ->addColumn('action', function ($item) {
          return $item->read ? '' : '<a href="' . route('patient.notifications.markAsRead', $item->id) . '" class="mark-as-read" data-id="' . $item->id . '">Mark as Read</a>';

        })


        ->rawColumns(['serial', 'action', 'message'])
        ->make(true);



    }

    return view('Patient.Notification.list');
  }
  public function PatientProfileView(Request $request)
  {
    $patientId = Patient::where('user_id', auth()->user()->id)->first();
    $id = $patientId->id;
    $item = User::join('patients', 'users.id', '=', 'patients.user_id')
      ->where('patients.id', $id)
      ->select('patients.*', 'users.name', 'users.email', 'users.status')->first();

    return view('Patient.Profile.view', compact('item'));
  }
  public function PatientUpdateProfile(Request $request)
  {
    $patientId = Patient::where('user_id', auth()->user()->id)->first();
    $id = $patientId->id;
    $user = User::join('patients', 'users.id', '=', 'patients.user_id')
      ->where('patients.id', $id)
      ->update(['name' => $request->input('name')]);

    Patient::where('id', $id)->update([
      // 'fee_concessions_id' => $request->input('group'),
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

    return redirect()->route('patient.profile.view')->with('success', 'Patient Updated successfully!');
  }
  public function ChangePassword(Request $request)
  {
    return view('Patient.password');

  }
  public function UpdatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'new_password' => 'required|string|min:8|confirmed',
    ], [
      'new_password.min' => 'The new password must be at least 8 characters.',
      'new_password.confirmed' => 'The new password confirmation does not match.',
    ]);

    $user = Auth::user();

    if (Hash::check($request->current_password, $user->password)) {
      try {
        DB::beginTransaction();

        $user->password = Hash::make($request->new_password);
        $user->save();

        DB::commit();

        return redirect()->back()->with('success', 'Password changed successfully!');
      } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'An error occurred while changing the password.');
      }
    } else {
      return redirect()->back()->with('error', 'Current password is incorrect.');
    }
  }

}