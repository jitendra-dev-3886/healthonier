<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Booking;
use App\Models\Weekday;
use Illuminate\Support\Facades\DB;
use App\Models\FollowUp;
use Carbon\Carbon;
use App\Models\Timeslot;
use App\Models\FeeConcession;
use App\Models\FeeConcessionGroup;
use App\Models\Fee;
use App\Models\BookingFee;
use DataTables;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\Clinic;
use App\Models\PrescribedTest;
use App\Providers\NotificationService;
use Illuminate\Support\Facades\Session;

class ClinicBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddClinicBooking()
    {
        return view('Doctor.Bookings.add');
    }
    public function ListClinicBooking()
    {
        return view('Doctor.Bookings.list');
    }
    public function SearchPatient(Request $request)
    {
        $userDoctorId = auth()->user()->doctor->id;
        $query = $request->input('query');
        $results = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->select('patients.id', 'users.name')
            ->where('patients.doctor_id', $userDoctorId)
            ->where('patients.fee_concessions_id', '>', 0)
            ->where('users.name', 'like', '%' . $query . '%')->get();
        return response()->json($results);
    }

    //
    public function getClinicData(Request $request)
    {
        $dayName = $request->input('dayName');
        $formattedDate = $request->input('formattedDate');
        $doctorId = auth()->user()->doctor->id;
        $Weekdays = Weekday::where('days', $dayName)->first();

        $data = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->join('timeslots', 'clinicavailabilities.timeslot_id', '=', 'timeslots.id')
            ->where('clinics.doctor_id', $doctorId)
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
                'timeslotid' => $entry->timeslot_id,
                'countdata' => $countdata,
                'message' => $message
            ];
        }

        return response()->json(['data' => $response]);
    }

    public function DoctorPatientBooking(Request $request)
    {
        $timestamp = now()->format('YmdHis');
        $randomNumber = rand(1000, 9999);
        $orderId = $timestamp . $randomNumber;

        $patient = $request->input('patient');

        $timeslot = $request->input('timeslot');
        $date = $request->input('date');

        $clinicId = DB::table('clinics')
            ->join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            ->where('clinicavailabilities.timeslot_id', $timeslot)
            ->first();
        $timeslot = Timeslot::where('id', $timeslot)->first();
        $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
        $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
        $label = $startTime . ' - ' . $endTime;

        $count = Booking::where('patient_id', $patient)
            ->where('token', '!=', '')
            ->where('status', 0)
            ->count();

        if ($count > 0) {
            return response()->json(['error' => 'Patient Having Already Appointment !']);
        } else {
            $booking = new Booking;
            $booking->clinic_id = $clinicId->clinic_id;
            $booking->patient_id = $patient;
            $booking->booking_date = $date;
            $booking->time = $label;
            $booking->booking_date = $date;
            $booking->order_id = $orderId;
            $booking->save();
            Session::put('clinicID', $clinicId->clinic_id);
            Session::put('Date', $date);
            return response()->json(['bookingId' => $booking->id]);
        }

    }
    public function getFollowupData(Request $request)
    {
        $patient = $request->input('patient');

        $lastBooking = Booking::where('token', '!=', '')
            ->where('booking_date', '<', Carbon::now()->format('Y-m-d'))
            ->where('booking_type', 0)
            ->where('patient_id', $patient)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
            ->first();
        $totalAmount = $request->input('totalAmount');

        if (!$lastBooking) {
            return response()->json(['error' => 'No previous booking found.']);
        }

        $lastBookingDate = $lastBooking->booking_date;
        $currentBookingDate = Carbon::now(); // Get current date using Carbon

        $daysDifference = Carbon::parse($currentBookingDate)->diffInDays(Carbon::parse($lastBookingDate));
        $discount = 0;
        $followUpData = FollowUp::where('min_days', '<=', $daysDifference)
            ->where('max_days', '>=', $daysDifference)
            ->first();

        if ($followUpData) {
            if ($followUpData->discount_type == 0) {
                // Apply flat rate discount
                $discount = $followUpData->percentage_amount;
                $updatedAmount = $totalAmount - $discount;

            } elseif ($followUpData->discount_type == 1) {
                // Apply percentage discount

                $discount = ($followUpData->percentage_amount / 100) * $totalAmount;

                $updatedAmount = $discount - $totalAmount;


            }
        } else {
            $updatedAmount = $totalAmount;

        }


        return response()->json(['discount' => $updatedAmount]);
    }


    public function DoctorPatientBookingInvoice($bookingId)
    {
        $doctorId = auth()->user()->doctor->id;
        $booking = Booking::where('id', $bookingId)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
            ->whereHas('clinic', function ($query) use ($doctorId) {
                $query->where('doctor_id', $doctorId);
            })
            ->first();

        $userId = User::join('patients', 'users.id', '=', 'patients.user_id')
            ->where('patients.id', $booking->patient_id)->first();

        // $timeslot = Timeslot::where('id', $booking->timeslot_id)->first();
        // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
        // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
        // $label = $startTime . ' - ' . $endTime;

        $fees = FeeConcessionGroup::with('fee')
            ->where('fee_concession_id', $userId->fee_concessions_id)
            ->where('status', 1)
            ->whereHas('fee', function ($query) {
                $query->where('consultant_type', 1);
            })
            ->get();
        //  dd($fees);
//

        return view('Doctor.Bookings.add', ['booking' => $booking, 'userId' => $userId, 'fees' => $fees]);
    }
    public function DoctorConfirmBooking(Request $request, $id)
    {
        try {


            $dateString = Session::get('Date');


            $patient = Booking::where('id', $id)
                ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
                ->first();
            $timestamp = now()->format('YmdHis');
            $randomNumber = rand(1000, 9999);
            $orderId = $timestamp . $randomNumber;

            $date = Carbon::parse($dateString);
            $month = $date->format('M');
            $year = $date->format('Y');
            $randomNumberToken = rand(100, 999);
            $token = $month . $year . $randomNumberToken;


            $patient = Booking::where('id', $id)
                ->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
                ->first();



            $data = [];

            if ($patient->token != '') {

                $clinicId = Session::get('clinicID');
                $countNumber = Booking::where('token', '!=', '')->where('booking_date', $dateString)->where('clinic_id', $clinicId)->count();
                $serialNumber = $countNumber + 1;
                $data = DB::table('bookings')
                    ->where('id', $id)
                    ->update([
                        'serial_number' => $serialNumber,
                        'problem' => $request->input('problem'),
                        'remark' => $request->input('remark'),
                        'booking_type' => $request->input('bookingType'),
                        'booking_source' => "Doctor",
                        'is_emergency' => $request->input('emergency') == "true" ? 1 : 0,
                    ]);
            } else {

                $clinicId = $patient->clinic_id;
                $countNumber = Booking::where('token', '!=', '')->where('booking_date', $patient->booking_date)->where('clinic_id', $clinicId)->count();
                $serialNumber = $countNumber + 1;

                $data = DB::table('bookings')
                    ->where('id', $id)
                    ->update([
                        'problem' => $request->input('problem'),
                        'serial_number' => $serialNumber,
                        'remark' => $request->input('remark'),
                        'booking_type' => $request->input('bookingType'),
                        'booking_source' => "Doctor",
                        'token' => $month . $year . $randomNumberToken,
                        'is_emergency' => $request->input('emergency') == "true" ? 1 : 0,
                    ]);
            }

            if ($data) {
                $paymentCheck = Payment::where('booking_id', $id)->first();

                if ($paymentCheck) {
                    $paymentdata = DB::table('payments')
                        ->where('booking_id', $id)
                        ->update([
                            'status' => 'paid',
                            'payment_date' => $request->input('paymentDate'),
                            'cheque_no' => $request->input('ChequeNo'),
                            'bank_name' => $request->input('bankName'),
                            'recieved_by' => $request->input('recievedBy'),
                            'discount' => $request->input('discountAmount'),
                            'after_discount' => $request->input('discountAmggount'),
                            'net_amount' => $request->input('netAmount'),
                            'balance' => $request->input('balanceAmount'),
                            'recieved_amount' => $paymentCheck->recieved_amount + $request->input('receivedAmountInput'),
                            'extra_fee' => $request->input('extraFee'),
                            'extra_fee_note' => $request->input('extraFeeNote'),
                        ]);

                    NotificationService::createNotification(
                        $patient->patient->user->id,
                        'You have Booking with Dr.' . auth()->user()->name,
                        'Booking confirmed successfully'
                    );
                } else {
                    $feeIds = $request->input('feeIds');
                    $amounts = $request->input('amounts');

                    if (count($feeIds) !== count($amounts)) {
                        // Handle the case where the counts don't match
                    }
                    //
                    foreach (array_combine($feeIds, $amounts) as $feeId => $amount) {
                        $bookingFee = BookingFee::create([
                            'booking_id' => $id,
                            'fee_id' => $feeId,
                            'amount' => $amount,
                        ]);

                        // Dump and die to check if the data is being stored

                    }



                    $payment = new Payment();
                    $payment->booking_id = $id;
                    $payment->payment_date = $request->input('paymentDate');
                    $payment->cheque_no = $request->input('ChequeNo');
                    $payment->bank_name = $request->input('bankName');
                    $payment->recieved_by = $request->input('recievedBy');
                    $payment->order_id = $orderId;
                    $payment->transaction_id = '';
                    $payment->total_amount = $request->input('totalAmount');
                    $payment->discount = $request->input('discountAmount');
                    $payment->after_discount = $request->input('discountAmggount');
                    $payment->net_amount = $request->input('netAmount');
                    $payment->balance = $request->input('balanceAmount');
                    $payment->recieved_amount = $request->input('receivedAmountInput');
                    $payment->currency = "INR";
                    $payment->payment_method = $request->input('paymentMethod');
                    $payment->status = "paid";

                    $payment->save();

                    NotificationService::createNotification(
                        $patient->patient->user->id,
                        'You have Booking with Dr.' . auth()->user()->name,
                        'Booking confirmed successfully'
                    );
                }

                return response()->json(['message' => 'Booking confirmed successfully', 'showNotification' => true]);
            }

            return response()->json(['error' => 'Booking confirmation failed'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }



    }
    public function confirmBookingInvoice(Request $request, $id)
    {


        try {

            $doctorId = auth()->user()->doctor->id;
            $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
                ->whereHas('clinic', function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId);
                })
                ->first();

            $fees = FeeConcessionGroup::with('fee')
                ->where('fee_concession_id', $booking->patient->fee_concessions_id)
                ->where('status', 1)
                ->whereIn('fee_id', $booking->bookingFee->pluck('fee_id'))
                ->get();


            //    {{ $fee->fee->amount - ($fee->fee->amount * $fee->amount / 100) }}
            return view('Doctor.Bookings.invoice', compact('booking', 'fees'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function ShowClinicBooking(Request $request)
    {


        if ($request->ajax()) {
            $doctorId = auth()->user()->doctor->id;
            $bookings = Booking::
                with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
                ->whereHas('clinic', function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId);
                })
                ->whereHas('payment', function ($query) {
                    $query->whereIn('status', ['Unpaid', 'Paid']); // Use 'whereIn' for multiple statuses
                })
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
                ->addColumn('link', function ($booking) {
                    if ($booking->meeting_link) {
                        return '<a href="' . $booking->meeting_link . '" target="_blank">Join Meeting</a>';
                    } else {
                        return 'No Meeting Link';
                    }
                })

                ->addColumn('patientMobile', function ($booking) {
                    return $booking->patient->number;


                })

                ->addColumn('group', function ($booking) {
                    return $booking->patient->feeConcessions->group_name;


                })
                ->addColumn('amount', function ($booking) {
                    return $booking->payment->total_amount;


                })
                ->addColumn('timeslots', function ($booking) {
                    // $timeslot = Timeslot::where('id', $booking->timeslot_id)->first();
                    // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                    // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                    // $label = $startTime . ' - ' . $endTime;
    

                    return $booking->time;
                })
                ->addColumn('payment', function ($booking) {
                    if ($booking->payment->balance == 0.00) {
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

                    $statusBadge = '<span class="' . $color . '">' . $buttonText . '</span>';



                    if ($booking->status === 2) {
                        $prescriptions = Prescription::where('booking_id', $booking->id)->with('medicines', 'prescribedTests')->first();
                        if ($prescriptions) {
                            $prescriptionLink = '<a class="view-prescription-link" href="' . route('doctor.prescription.edit', ['id' => $booking->id]) . '">Edit Prescription</a>';
                            $prescriptionLinkView = '<a class="view-prescription-link" href="' . route('doctor.patient.booking.prescription.view', ['id' => $booking->id]) . '">View Prescription</a>';
                        } else {
                            $prescriptionLink = '<a class="view-prescription-link" href="' . route('doctor.patient.booking.prescription', ['id' => $booking->id]) . '">Add Prescription</a>';
                            $prescriptionLinkView = '';
                        }

                        return $prescriptionLink . '<br>' . $prescriptionLinkView;
                    }

                    return $statusBadge;


                })
                ->addColumn('serial', function () use (&$counter) {

                    return $counter++;
                })
                ->addColumn('fee', function ($booking) {

                    // if ($booking->payment->balance == 0.00) {
                    //     return ' <a href="' . route('confirm.booking.invoice.print', $booking->id) . '" class="icon_btn"><i class="bi bi-file-earmark-text"></i>
    
                    //     </a> ';
    
                    // } else {
                    //     return ' <a href="' . route('confirm.booking.invoice.print', $booking->id) . '" class="icon_btn"><i class="bi bi-file-earmark-text"></i>
    
                    //     </a> <br> <a href="' . route('fee.collection.edit', $booking->id) . '" class="icon_btn"><i class="bi bi-cash"></i>
                    //     </a> <br> ';
    


                    // }
                    return ' <a href="' . route('confirm.booking.invoice.print', $booking->id) . '" class="icon_btn"><i class="bi bi-file-earmark-text"></i>

                    </a> <br> <a href="' . route('fee.collection.edit', $booking->id) . '" class="icon_btn"><i class="bi bi-cash"></i>
                    </a> <br> ';
                })

                ->rawColumns(['link', 'fee', 'amount', 'payment', 'clinicName', 'patientName', 'patientMobile', 'bookingDate', 'token', 'timeslots', 'group', 'status', 'serial'])
                ->make(true);



        }

        return view('Doctor.Appoitnment.list');
    }
    public function paymentAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required|string|in:cash,paytm,creditCard,debitCard,upi,netBanking,wallet',
            'amountpay' => 'required|numeric',
            'transactionId' => 'nullable|required_if:paymentMethod,paytm|string',
            'bookingid' => 'numeric'
        ]);

        $payment = Payment::where('booking_id', $validatedData['bookingid'])->firstOrFail();

        // If the payment record doesn't exist, return an error response or handle it accordingly.
        if (!$payment) {
            return response()->json(['error' => 'Payment record not found.'], 404);
        }

        // Update the payment information
        $payment->payment_method = $validatedData['paymentMethod'];
        $payment->amount = $validatedData['amountpay'];
        $payment->transaction_id = $validatedData['transactionId'];
        $payment->status = 'paid';

        // Save the changes to the database
        $payment->save();
        $statusfind = Booking::where('id', $payment->booking_id)->first();
        return response()->json(['message' => 'Payment updated successfully.', 'slot' => $statusfind->status, 'bookingid' => $payment->booking_id]);

    }
    public function FeeCollectionEdit(Request $request, $id)
    {
        $booking = Booking::
            where('id', $id)->
            with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
            ->first();

        $fees = FeeConcessionGroup::with('fee')
            ->where('fee_concession_id', $booking->patient->fee_concessions_id)
            ->where('status', 1)
            ->whereIn('fee_id', $booking->bookingFee->pluck('fee_id'))
            ->get();
        // dd($booking);
        return view('Doctor.Bookings.edit', compact('booking', 'fees'));

    }
    public function TokenTrackingShow(Request $request)
    {
        $UserDoctorId = auth()->user()->doctor->id;

        $clinics = Clinic::where('doctor_id', $UserDoctorId)
            ->with(['bookings', 'bookings.patient.user', 'bookings.payment', 'bookings.patient.feeConcessions'])
            ->whereHas('bookings', function ($query) {
                $query->where('booking_date', Carbon::now()->format('Y-m-d'))
                    ->orderByRaw('CASE WHEN is_emergency = 1 THEN 0 ELSE 1 END, serial_number');
            })
            ->get();
        // dd($clinics);
        return view('Doctor.Bookings.tracktoken', compact('clinics'));

    }


}