<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clinic;
use Exception;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Weekday;
use Carbon\Carbon;
use App\Models\Timeslot;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Metting;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use PDF;
use App\Models\Notification;
use App\Models\Doctor;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientAdded;
use App\Models\BookingType;
use App\Models\FeeStructure;
use Illuminate\Support\Str;
use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;
use App\Models\Followup;
use App\Models\BookingFee;
use App\Jobs\SendTokenLimitNotification;

class DoctorLandingPageController extends Controller
{
    public $api;

    public function __construct($foo = null)
    {
        //$this->api = new Api("rzp_test_RsFwXDvAKPFv7g", "91w9wKLyywOKsjpvvDK7qf1V");
    }
    //show booking index
    function index($theme, $id)
    {



        $data = User::join('doctors', 'users.id', '=', 'doctors.user_id')
            ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
            ->where('doctors.slug', $id)->where('users.status', 1)->first();
        if ($data->theme_id == 1) {

            return view('Profile.Childcare.index', ['id' => $data->user_id]);

        } elseif ($data->theme_id == 2) {
            return view('Profile.Dentiest.index', ['id' => $data->user_id]);

        } elseif ($data->theme_id == 3) {
            return view('Profile.Eyecare.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 4) {
            return view('Profile.Physiotherapis.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 5) {
            return view('Profile.Cardio.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 6) {
            return view('Profile.Pediatrics.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 7) {
            return view('Profile.Chiroprator.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 8) {
            return view('Profile.Maternity.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 9) {
            return view('Profile.Ent.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 10) {
            return view('Profile.Mental.index', ['id' => $data->user_id]);
        } elseif ($data->theme_id == 11) {
            return view('Profile.Massage.index', ['id' => $data->user_id]);
        } else {
            return view('Profile.index', compact('data'));

        }

    }
    //get clinic data on date based

    public function GetOnlineData(Request $request)
    {
        $formattedDate = $request->input('formattedDate');
        $doctorId = $request->input('doctorId');
        $did = Doctor::where('user_id', $doctorId)->first();
        Session::put('date', $formattedDate);
        Session::put('doctor', $did->id);
        $currentDateTime = Carbon::now();
        $currentTime = $currentDateTime->format('H:i:s');
        $data = DB::table('slots')
            ->join('doctors', 'slots.created_by', '=', 'doctors.id')
            ->select('slots.*')
            ->where('slots.created_by', $did->id)
            ->where('slots.slot_date', $formattedDate)
            ->where(function ($query) use ($currentDateTime, $currentTime) {
                $query->where('slots.slot_date', '>', $currentDateTime->toDateString())
                    ->orWhere(function ($q) use ($currentDateTime, $currentTime) {
                        $q->where('slots.slot_date', $currentDateTime->toDateString())
                            ->where('slots.slot_start_time', '>', $currentTime);
                    });
            })
            ->get();
        //     ->join('doctors', 'slots.created_by', '=', 'doctors.id')
        //     ->select('slots.*')
        //     ->where('slots.created_by', $did->id)
        //     ->where('slots.slot_date', $formattedDate)
        //     ->get();
        return response()->json(['datanext' => $data]);

    }
    public function getClinicData(Request $request)
    {
        $dayName = $request->input('dayName');
        $formattedDate = $request->input('formattedDate');
        $Weekdays = Weekday::where('days', $dayName)->first();

        $doctorId = $request->input('doctorId');
        $did = Doctor::where('user_id', $doctorId)->first();
        Session::put('date', $formattedDate);
        Session::put('doctor', $did->id);


        $data = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->where('clinics.doctor_id', $did->id)
            ->where('clinics.status', 1)
            ->where('clinicavailabilities.weekday_id', $Weekdays->id)
            ->get();


        $response = [];

        foreach ($data as $entry) {
            $startTime = Carbon::createFromFormat('H:i:s', $entry->start_time)->format('h:i A');
            $endTime = Carbon::createFromFormat('H:i:s', $entry->end_time)->format('h:i A');
            $label = $startTime . ' - ' . $endTime;

            $endtimedata = Carbon::createFromFormat('H:i:s', $entry->end_time)->format('H:i:s');
            $timezone = 'Asia/Kolkata';
            $current_time = Carbon::now($timezone)->format('H:i:s');
            $currentDate = Carbon::now()->format('Y-m-d');
            $message = '';

            if ($endtimedata >= $current_time) {
                $message = 'book';
            } else {
                if ($currentDate != $formattedDate) {
                    $message = 'next';
                } else {
                    $message = 'no';
                }
            }

            $count = Booking::where('booking_date', $formattedDate)
                ->where('token', '!=', '')
                ->where('clinic_id', $entry->clinic_id)
                ->count();

            $countdata = ($count >= $entry->slots) ? 'No Slots' : 'Slots ' . ($entry->slots - $count);

            $response[] = [
                'clinicName' => $entry->name,
                'clinicTime' => $label,
                'timeslotid' => $entry->clinic_id,
                'countdata' => $countdata,
                'message' => $message
            ];
        }

        return response()->json(['data' => $response]);
    }

    public function clinicBooking(Request $request)
    {
        $dataId = $request->input('dataId');
        $formattedDate = $request->input('formattedDate');
        $clinicTime = $request->input('time');
        Session::put('clinicid', $dataId);
        Session::put('clinictime', $clinicTime);

        $clinicData = DB::table('clinics')
            ->where('id', $dataId)
            ->first();

        return response()->json(['message' => 'Success', 'venue' => $clinicData->address, 'date' => $formattedDate]);


    }

    public function calculateTotalAmount($fees)
    {
        $totalAmount = 0;

        foreach ($fees as $fee) {
            $discountedAmount = ($fee->percentage == 1) ?
                $fee->fee->total_amount - ($fee->fee->total_amount * $fee->amount / 100) :
                $fee->fee->total_amount - $fee->amount;

            $totalAmount += $discountedAmount;
        }

        return $totalAmount;
    }

    public function applyFollowUpDiscount($daysDifference, $totalAmount)
    {
        $discount = 0;
        $followUpData = FollowUp::where('min_days', '<=', $daysDifference)
            ->where('max_days', '>=', $daysDifference)
            ->first();

        if ($followUpData) {
            if ($followUpData->discount_type == 0) {
                // Apply flat rate discount
                $discount = $followUpData->percentage_amount;
            } elseif ($followUpData->discount_type == 1) {
                // Apply percentage discount
                $discount = ($followUpData->percentage_amount / 100) * $totalAmount;
            }
        }

        return $totalAmount - $discount;
    }
    public function UpdateBooking(Request $request)
    {



        $randomPassword = Str::random(12);
        $doctorid = Session::get('doctor');
        $existingUser = User::where('email', $request->input('email'))->first();
        $findGroup = FeeConcession::where('doctor_id', $doctorid)->where('group_name', "Normal Group")->first();

        if ($existingUser) {

            $PatientId = Patient::where('user_id', $existingUser->id)->first();
        } else {


            $formData = new User();
            $formData->name = $request->input('name');
            $formData->email = $request->input('email');
            $formData->password = bcrypt($randomPassword);
            $formData->type = 2;
            $formData->save();
            if ($formData->id) {
                $PatientId = new Patient();
                $PatientId->user_id = $formData->id;
                $PatientId->doctor_id = $doctorid;
                $PatientId->number = $request->input('number');
                $PatientId->age = $request->input('age');
                $PatientId->pincode = $request->input('pincode');
                $PatientId->address = $request->input('address');
                $PatientId->gender = $request->input('gender');
                $PatientId->fee_concessions_id = $findGroup->id;
                $PatientId->save();

            }
            Mail::to($formData->email)->send(new PatientAdded($formData->email, $randomPassword));
        }

        $fees = FeeConcessionGroup::with('fee')
            ->where('fee_concession_id', $PatientId->fee_concessions_id)
            ->where('status', 1)
            ->whereHas('fee', function ($query) {
                $query->where('consultant_type', 1);
            })
            ->get();

        $totalAmount = $this->calculateTotalAmount($fees);

        $lastBooking = Booking::where('token', '!=', '')
            ->where('booking_date', '<', Carbon::now()->format('Y-m-d'))
            ->where('patient_id', $PatientId->id)
            ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
            ->first();

        if ($lastBooking) {

            $lastBookingDate = $lastBooking->booking_date;
            $currentBookingDate = Carbon::now();
            $daysDifference = Carbon::parse($currentBookingDate)->diffInDays(Carbon::parse($lastBookingDate));

            $totalAmount = $this->applyFollowUpDiscount($daysDifference, $totalAmount);
        }

        Session::put('patient_id', $PatientId->id);
        Session::put('fee', $totalAmount);
        Session::put('consultationType', $request->input('consultationType'));

        return response()->json(['fee' => $totalAmount]);
    }


    function orderId(Request $request)
    {

        $clinicid = Session::get('clinicid');
        $date = Session::get('date');
        $slot = Session::get('clinictime');
        $drId = Session::get('doctor');
        $fee = Session::get('fee');
        $patientid = Session::get('patient_id');
        $consultationType = Session::get('consultationType');
        $DrPayment = Doctor::where('id', $drId)->first();


        $dynamicKeyID = $DrPayment->razor_pay_key_id;
        $dynamicSecretKey = $DrPayment->razor_pay_key_secret;
        $api = new Api($dynamicKeyID, $dynamicSecretKey);

        $order = [
            'receipt' => 'order_receipt',
            'amount' => $fee * 100,
            'currency' => 'INR',
        ];

        $data = $api->order->create($order);


        $orderId = $data->id;

        $user = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->where('patients.id', $patientid)->first();

        $name = $user->name;
        $email = $user->email;
        $contact = $user->number;


        $formData = new Booking();
        $formData->clinic_id = $clinicid;
        $formData->patient_id = $patientid;
        $formData->booking_date = $date;
        $formData->time = $slot;
        $formData->order_id = $orderId;
        $formData->consultation_type = $consultationType;

        $formData->save();


        if ($formData->id) {
            Session::put('bookingid', $formData->id);

        }


        return response()->json([
            'order_id' => $orderId,
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'keyID' => $dynamicKeyID,

        ]);

    }


    public function SavePayment(Request $request)
    {

        try {

            $id = Session::get('bookingid');
            $fee = Session::get('fee');
            $user = Booking::where('id', $id)->first();
            $doctorId = Session::get('doctor');
            $dateString = Session::get('date');
            $clinicId = Session::get('clinicid');
            $countNumber = Booking::where('token', '!=', '')->where('booking_date', $dateString)->where('clinic_id', $clinicId)->count();
            $serialNumber = $countNumber + 1;
            $maxTokenLimit = 5;
            // if ($serialNumber >= $maxTokenLimit) {

            //     // Send notification to the doctor
            //     dispatch(new SendTokenLimitNotification($doctorId));

            // }
            $date = Carbon::parse($dateString);
            $PatientId = Patient::where('id', $user->patient_id)->first();
            $consultationType = Session::get('consultationType');
            if ($consultationType == "online") {
                $join = 'https://xonier-connect.onrender.com/' . $request->input('order_id');
            } else {
                $join = '';

            }

            $totalamount = $fee;
            // Update the token in the database
            $month = $date->format('M');
            $year = $date->format('Y');
            $randomNumberToken = rand(100, 999);
            $token = $month . $year . $randomNumberToken;
            DB::table('bookings')
                ->where('bookings.id', $id)
                ->update(['token' => $token, 'meeting_link' => $join, 'serial_number' => $serialNumber]);

            // Fetch fees and associate them with the booking
            $fees = FeeConcessionGroup::with('fee')
                ->where('fee_concession_id', $PatientId->fee_concessions_id)
                ->where('status', 1)
                ->whereHas('fee', function ($query) {
                    $query->where('consultant_type', 1);
                })
                ->get();

            foreach ($fees as $fee) {
                if ($fee->percentage == 1) {
                    $amount = $fee->fee->total_amount - ($fee->fee->total_amount * $fee->amount / 100);
                } else {
                    $amount = $fee->fee->total_amount - $fee->amount;
                }



                BookingFee::create([
                    'booking_id' => $id,
                    'fee_id' => $fee->fee->id,
                    'amount' => $amount,
                ]);
            }

            // Create a notification
            $notificationData = new Notification();
            $notificationData->user_id = $doctorId;
            $notificationData->type = 'New Booking';
            $notificationData->message = 'You have got a new booking on ' . $date . '';
            $notificationData->read = 0;
            $notificationData->save();

            // Create and save the payment
            $payment = new Payment();
            $payment->booking_id = $id;
            $payment->payment_date = Carbon::now();
            $payment->cheque_no = 0;
            $payment->bank_name = '';
            $payment->recieved_by = 'Razor Pay';
            $payment->order_id = $request->input('order_id');
            $payment->transaction_id = $request->input('transaction_id');
            $payment->total_amount = $totalamount;
            $payment->discount = 0;
            $payment->after_discount = 0;
            $payment->net_amount = $totalamount;
            $payment->balance = 0;
            $payment->recieved_amount = $totalamount;
            $payment->currency = "INR";
            $payment->payment_method = 'Online';
            $payment->status = "paid";
            $payment->save();

            Session::flush();

            $redirectUrl = route('invoice.download', ['payment_id' => $id]);

            // Return the redirect URL in the JSON response
            return response()->json(['redirect_url' => $redirectUrl]);

        } catch (Exception $e) {


            return response()->json(['error' => 'Payment creation failed.']);
        }
    }
    function InvoiceDownload($id)
    {
        $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
            ->first();
        $fees = FeeConcessionGroup::with('fee')
            ->where('fee_concession_id', $booking->patient->fee_concessions_id)
            ->where('status', 1)
            ->whereIn('fee_id', $booking->bookingFee->pluck('fee_id'))
            ->get();
        // dd($booking);

        return view('Profile.invoice', compact('booking', 'fees', 'id'));


    }
    function InvoiceDownloadData($id)
    {

        $clinicData = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('patients', 'bookings.user_id', '=', 'patients.id')
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('payments.id', $id)
            ->first();
        // dd($clinicData);
        $timeslot = Timeslot::where('id', $clinicData->timeslot_id)->first();
        $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
        $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
        $label = $startTime . ' - ' . $endTime;
        $date = Carbon::createFromFormat('Y-m-d', $clinicData->booking_date)->format('F d, Y');
        $carbonBirthDate = Carbon::parse($clinicData->age);
        $age = $carbonBirthDate->age;


        if ($clinicData->payment_method == 'Offline') {
            $pdf = PDF::loadView('Profile.booking', compact('id', 'clinicData', 'label', 'date', 'age'));

        } else {

            $pdf = PDF::loadView('Profile.invoice', compact('id', 'clinicData', 'label', 'date', 'age'));
        }

        // Download the PDF file
        return $pdf->download('invoice.pdf');

    }

    public function OfflinePayment(Request $request)
    {
        try {
            DB::beginTransaction();

            $slot = Session::get('clinictime');
            $clinicid = Session::get('clinicid');
            $date = Session::get('date');
            $patientid = Session::get('patient_id');
            $fee = Session::get('fee');
            $totalamount = $fee;
            $doctorId = Session::get('doctor');
            $unpaidBookingsCount = Booking::where('patient_id', $patientid)
                ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
                ->whereHas('payment', function ($query) {
                    $query->where('status', 'Unpaid');
                })
                ->count();

            if ($unpaidBookingsCount > 0) {
                // If there is an unpaid booking, redirect the user to a view with a message
                $redirectUrl = route('unpaid.booking.view');
                Session::flush();
                return response()->json(['redirect_url' => $redirectUrl]);
            }

            $timestamp = now()->format('YmdHis');
            $randomNumber = rand(1000, 9999);
            $orderId = $timestamp . $randomNumber;

            $formData = new Booking();
            $formData->clinic_id = $clinicid;
            $formData->patient_id = $patientid;
            $formData->booking_date = $date;
            $formData->time = $slot;
            $formData->order_id = $orderId;
            $formData->save();

            if ($formData->id) {
                $payment = new Payment();
                $payment->booking_id = $formData->id;
                $payment->payment_date = Carbon::now();
                $payment->cheque_no = 0;
                $payment->bank_name = '';
                $payment->recieved_by = 'Razor Pay';
                $payment->order_id = $orderId;
                $payment->transaction_id = '';
                $payment->total_amount = $totalamount;
                $payment->discount = 0;
                $payment->after_discount = 0;
                $payment->net_amount = $totalamount;
                $payment->balance = $totalamount;
                $payment->recieved_amount = 0;
                $payment->currency = "INR";
                $payment->payment_method = 'Offline';
                $payment->status = "Unpaid";
                $payment->save();
            }

            $notificationData = new Notification();
            $notificationData->user_id = $doctorId;
            $notificationData->type = 'New Booking';
            $notificationData->message = 'You have got new booking on ' . $date . '';
            $notificationData->read = 0;
            $notificationData->save();

            $PatientId = Patient::where('id', $patientid)->first();
            $fees = FeeConcessionGroup::with('fee')
                ->where('fee_concession_id', $PatientId->fee_concessions_id)
                ->where('status', 1)
                ->whereHas('fee', function ($query) {
                    $query->where('consultant_type', 1);
                })
                ->get();

            foreach ($fees as $fee) {
                if ($fee->percentage == 1) {
                    $amount = $fee->fee->total_amount - ($fee->fee->total_amount * $fee->amount / 100);
                } else {
                    $amount = $fee->fee->total_amount - $fee->amount;
                }
                BookingFee::create([
                    'booking_id' => $formData->id,
                    'fee_id' => $fee->fee->id,
                    'amount' => $amount,
                ]);
            }
            $fees = FeeConcessionGroup::with('fee')
                ->where('fee_concession_id', $PatientId->fee_concessions_id)
                ->where('status', 1)
                ->whereHas('fee', function ($query) {
                    $query->where('consultant_type', 1);
                })
                ->get();


            $redirectUrl = route('invoice.download', ['payment_id' => $formData->id]);
            Session::flush();

            DB::commit();

            return response()->json(['redirect_url' => $redirectUrl]);
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction and handle the error
            DB::rollBack();

            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function TrackTokenSubmit(Request $request, $id)
    {
        $trackerId = $request->input('tracker_id');
        $bookings = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->select('bookings.*', 'doctors.user_id')
            ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
            ->where('doctors.user_id', $id)
            ->where('clinics.id', $request->input('clinic'))
            ->get();
        return $this->generateTrackerHtml($bookings, $trackerId);


    }
    public function processToken(Request $request)
    {
        $selectedClinicId = $request->input('clinic');
        $enteredTokenNumber = $request->input('token');
        $checkif = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
            ->join('payments', 'bookings.id', '=', 'payments.booking_id')
            ->select('bookings.*', 'doctors.user_id')
            ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
            ->where('clinics.id', $selectedClinicId)
            ->where('bookings.token', $enteredTokenNumber)
            ->count();


        if ($checkif > 0) {
            $bookings = DB::table('clinics')
                ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
                ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
                ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
                ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
                ->join('payments', 'bookings.id', '=', 'payments.booking_id')
                ->select('bookings.*', 'doctors.user_id')
                ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
                ->where('clinics.id', $selectedClinicId)
                ->get();

            if ($bookings->isNotEmpty()) {
                $pendingdata = DB::table('clinics')
                    ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
                    ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
                    ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
                    ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
                    ->join('payments', 'bookings.id', '=', 'payments.booking_id')
                    ->select('bookings.*', 'doctors.user_id')
                    ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
                    ->where('clinics.id', $selectedClinicId)
                    ->where('bookings.token', '<', $enteredTokenNumber)
                    ->where('bookings.status', 0)
                    ->count();

                $latestBooking = DB::table('clinics')
                    ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
                    ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
                    ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
                    ->join('bookings', 'clinics.id', '=', 'bookings.clinic_id')
                    ->join('payments', 'bookings.id', '=', 'payments.booking_id')
                    ->select('bookings.*', 'doctors.user_id')
                    ->where('bookings.booking_date', Carbon::now()->format('Y-m-d'))
                    ->where('clinics.id', $selectedClinicId)
                    ->whereNotNull('bookings.time_in')
                    ->whereNotNull('bookings.time_out')
                    ->where('bookings.status', 2)
                    ->orderBy('bookings.id', 'desc')
                    ->first();

                if ($latestBooking) {
                    $timeIn = Carbon::parse($latestBooking->time_in);
                    $timeOut = Carbon::parse($latestBooking->time_out);

                    $timeDifference = $timeIn->diffInMinutes($timeOut);

                    // dd($timeDifference * 4);

                    $totaltime = CarbonInterval::minutes($timeDifference * $pendingdata)->cascade()->forHumans();

                    $estimatedTimeDifference = $totaltime;
                    return view('Profile.Dentiest.tokenbased', compact('bookings', 'enteredTokenNumber', 'estimatedTimeDifference'));
                } else {
                }

            } else {

                $estimatedTimeDifference = "No data found matching the criteria.";


            }






        }
        $bookings = [];
        $estimatedTimeDifference = "";
        return view('Profile.Dentiest.tokenbased', compact('bookings', 'enteredTokenNumber', 'estimatedTimeDifference'));



    }
    public function UnpaidBooking(Request $request)
    {
        return view('Doctor.Bookings.unpaid');

    }


}