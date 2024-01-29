<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\StaffClinic;
use DataTables;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffAdded;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Booking;
use App\Models\DoctorStatusIndicators;
use Carbon\Carbon;
use App\Models\Notification;
use App\Providers\NotificationService;


class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $Today = Carbon::now()->format('Y-m-d');
        $DayOfWeek = Carbon::now()->dayOfWeek;
        $UserDoctorId = auth()->user()->doctor->id;

        // $Location = Clinic::where('doctor_id', $UserDoctorId)->where('status', 1)->with(['availabilities', 'doctor.user'])->get();
        $Location = Clinic::where('doctor_id', $UserDoctorId)
            ->with([
                'bookings' => function ($query) {
                    $query->where('booking_date', Carbon::now()->format('Y-m-d'))
                        ->whereNotNull('serial_number')
                        ->orderByRaw('CASE WHEN is_emergency = 1 THEN 0 ELSE 1 END, serial_number');
                },
                'bookings.patient.user',
                'bookings.payment',
                'bookings.patient.feeConcessions'
            ])
            ->get();


        
        $ClinicData = Clinic::join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.booking_date', $Today)
            ->where('clinics.doctor_id', $UserDoctorId)
            ->get();

        // Retrieve pending, completed, and cancelled bookings
        $Pending = Booking::where('booking_date', $Today)
            ->where('status', 0)
            ->whereHas('clinic', function ($query) use ($UserDoctorId) {
                $query->where('doctor_id', $UserDoctorId);
            })
            ->get();

        $Completed = Booking::where('booking_date', $Today)
            ->where('status', 2)
            ->whereHas('clinic', function ($query) use ($UserDoctorId) {
                $query->where('doctor_id', $UserDoctorId);
            })
            ->get();

        $Cancelled = Booking::where('booking_date', $Today)
            ->where('status', 3)
            ->whereHas('clinic', function ($query) use ($UserDoctorId) {
                $query->where('doctor_id', $UserDoctorId);
            })
            ->get();

        $DoctorStatusData = DoctorStatusIndicators::all();

        return view('Doctor.index', compact('DayOfWeek', 'Location', 'ClinicData', 'Pending', 'Completed', 'Cancelled', 'DoctorStatusData'));
    }

    public function UpdateAppointment(Request $request)
    {
        $itemId = $request->input('token');
        $newStatus = $request->input('option');
        $yourModel = Booking::find($itemId);
        $yourModel->status = $newStatus;
        $yourModel->save();

        return response()->json(['message' => 'Status updated successfully']);
    }


    public function changeStatus(Request $request, Booking $token)
    {

        $yourModel = Booking::find($token->id);
        $newStatus = $request->input('status');
        if ($newStatus == 'In') {
            $status = 1;
            $Intime = Carbon::now();
            $yourModel->time_in = $Intime;

        } elseif ($newStatus == 'Out') {
            $status = 2;
            $outtime = Carbon::now();
            $yourModel->time_out = $outtime;

        } else {
            $status = 3;
        }
        $yourModel->status = $status;
        $yourModel->save();


        $pendding = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
            ->where('bookings.status', 0)
            ->where('doctors.user_id', auth()->user()->id)
            ->count();
        $completed = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
            ->where('bookings.status', 2)
            ->where('doctors.user_id', auth()->user()->id)
            ->count();
        $cancelled = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
            ->where('bookings.status', 3)
            ->where('doctors.user_id', auth()->user()->id)
            ->count();

        return response()->json(['message' => 'Status updated successfully', 'slot' => $yourModel->status, 'totalPendingCount' => $pendding, 'totalcompletedCount' => $completed, 'totalcancelledCount' => $cancelled]);
    }
    public function DoctorStatusChange(Request $request)
    {
        $statusId = $request->input('status_id');
        $isChecked = $request->input('checked');
        $doctor = auth()->user()->doctor;
        $doctor->available_status = $statusId;
        $doctor->save();

        // Update the database based on $statusId and $isChecked

        return response()->json(['message' => 'Status updated successfully']);
    }
    public function updateSerialNumbers(Request $request)
    {
        try {
            DB::beginTransaction();

            $updatedOrder = $request->json()->all();
            foreach ($updatedOrder as $item) {
                Booking::where('id', $item['tokenid'])->update(['serial_number' => $item['serial']]);
            }

            DB::commit();

            return response()->json(['message' => 'Serial numbers updated successfully']);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json(['message' => 'An error occurred while updating serial numbers'], 500);
        }
    }

    public function ChangePassword(Request $request)
    {
        return view('Doctor.Password.add');

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