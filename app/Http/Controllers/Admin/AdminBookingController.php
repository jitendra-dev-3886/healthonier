<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use DataTables;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Prescription;
use App\MOdels\FeeConcessionGroup;

class AdminBookingController extends Controller
{


    public function DoctorBookingList()
    {
        return view('Admin.Booking.list');
    }

    public function DoctorBookingShow(Request $request)
    {


        if ($request->ajax()) {

            $bookings = Booking::
                with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
                ->whereHas('payment', function ($query) {
                    $query->whereIn('status', ['Unpaid', 'Paid']); // Use 'whereIn' for multiple statuses
                })
                ->get();


            // dd($bookings);
            // return $clinicData;
            $counter = 1;

            return DataTables::of($bookings)
                ->addColumn('doctor', function ($item) {
                    $doctor = Doctor::where('id', $item->clinic->doctor_id)->first();
                    return $doctor->doctor_name;
                })
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

                ->addColumn('amount', function ($booking) {
                    return $booking->payment->total_amount;


                })
                ->addColumn('timeslots', function ($booking) {
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



                    // if ($booking->status === 2) {
                    //     $prescriptions = Prescription::where('booking_id', $booking->id)->with('medicines', 'prescribedTests')->first();
                    //     if ($prescriptions) {

                    //         $prescriptionLinkView = '<a class="view-prescription-link" href="' . route('doctor.patient.booking.prescription.view', ['id' => $booking->id]) . '">View Prescription</a>';
                    //     } else {
                    //         $prescriptionLinkView = '';
                    //     }

                    //     return $prescriptionLinkView;
                    // }

                    return $statusBadge;


                })
                ->addColumn('serial', function () use (&$counter) {

                    return $counter++;
                })
                ->addColumn('fee', function ($booking) {


                    return ' <a class="view-prescription-link" href="' . route('admin.doctor.booking.invoice', $booking->id) . '" class="icon_btn">View Invoice

                    </a>';
                })
                ->addColumn('prescription', function ($booking) {
                
                        $prescriptions = Prescription::where('booking_id', $booking->id)->with('medicines', 'prescribedTests')->first();
                        if ($prescriptions) {

                            $prescriptionLinkView = '<a class="view-prescription-link" href="' . route('admin.doctor.booking.prescription', ['id' => $booking->id]) . '">View Prescription</a>';
                        } else {
                            $prescriptionLinkView = '';
                        }

                        return $prescriptionLinkView;
                   


                })
                ->rawColumns(['prescription','link', 'fee', 'amount', 'payment', 'clinicName', 'patientName', 'patientMobile', 'bookingDate', 'token', 'timeslots', 'group', 'status', 'serial'])
                ->make(true);



        }

        return view('Admin.Booking.list');
    }
    public function DoctorBookingInvoice(Request $request, $id)
    {


        try {
            $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions', 'bookingFee'])
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
    public function DoctorBookingPrescription(Request $request, $id)
    {
        $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
            ->first();
        $prescription = Prescription::where('booking_id', $id)->with('medicines', 'prescribedTests')->first();
        return view('Doctor.Bookings.viewprescription', compact('booking', 'prescription'));
    }

}