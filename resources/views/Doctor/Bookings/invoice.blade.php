@extends('layouts.admin')
@section('content')
<style>
    /* Add this CSS to your stylesheet or in a <style> tag in your HTML file */
    .highlight-text {
        font-weight: bold;
        color: #FF5733;
        /* You can adjust the color as needed */
    }

    .big-text {
        font-size: 18px;
        /* Adjust the font size as needed */
        font-weight: bold;
        color: #009900;
        /* You can adjust the color as needed */
    }

</style>
<div class="card card-body py-10">
    <!-- begin::Wrapper-->
    <div class="mw-lg-950px mx-auto w-100">
        <!-- begin::Header-->
        <div class="d-flex justify-content-between mb-5">
            <!--end::Logo-->
            <!--begin::Logo-->
            <a href="#" class="d-block mw-150px ms-sm-auto">
                <img alt="Logo" src="{{ asset('doctordata/logo/1694002120.png')}}" class="w-100">
            </a>
            <!--end::Logo-->
            <div class="text-end">
                <!--begin::Text-->
                <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                    <div>H-187 Sector -63 Noida</div>
                    <div>Uttar Pradesh, India</div>
                </div>
                <!--end::Text-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="pb-12">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column gap-7">
                <!--begin::Separator-->
                <div class="separator"></div>
                <!--begin::Separator-->
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="">
                                <h5>Patient Details </h5>
                                <!--begin::Order details-->
                                <div class="gap-4 gap-md-10 fw-bold">
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">User ID: {{$booking->patient->user->id}}</span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Patient Name:{{$booking->patient->user->name}}</span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Contact: {{$booking->patient->number}}</span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Patient DOB: {{$booking->patient->age}}</span>
                                    </div>
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Address: {{$booking->patient->address}}</span>
                                    </div>
                                </div>
                                <!--end::Order details-->
                            </td>
                            <td class="text-end">
                                <h5>Clinic Details </h5>
                                <!--begin::Order details-->
                                <div class="gap-4 gap-md-10 fw-bold">
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Clinic Name:{{$booking->clinic->name}}</span>
                                    </div>
                                    {{-- <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Doctor Name: Full Name</span>
                                    </div> --}}
                                    <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Contact: {{$booking->clinic->contact_number}}</span>
                                    </div>
                                    {{-- <div class="flex-root d-flex flex-column">
                                        <span class="text-muted">Email: {{$booking->clinic->email}}</span>
                                </div> --}}
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">Clinic Address: {{$booking->clinic->address}}</span>
                                </div>
            </div>
            <!--end::Order details-->
            </td>
            </tr>
            </tbody>
            </table>

            <!--begin::Separator-->
            <div class="separator"></div>
            <!--begin::Separator-->
            <!--begin:Order summary-->
            <div class="d-flex justify-content-between flex-column">
                <!--begin::Table-->
                <div class="table-responsive border-bottom mb-9">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <thead>
                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                <th class="min-w-175px pb-2">Fee Title</th>
                                <th class="min-w-70px pb-2 ">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            <!--begin::Products-->
                            @if(count($fees) === count($booking->bookingFee))
                            @foreach ($fees as $fee)
                            @php
                            $bookingFee = $booking->bookingFee->where('fee_id', $fee->fee_id)->first();
                            @endphp
                            <tr>
                                <!--begin::Product-->
                                <td>{{ $fee->fee->tittle }}</td>
                                <!--end::Product-->
                                <!--begin::SKU-->
                                <td class="text">
                                    ₹ {{ $bookingFee->amount }} 
                                 
                                </td>
                                <td class="text"></td>
                                <td class="text"></td>
                                <td class="text"></td>
                                <td class="text"></td>
                                <td class="text"></td>
                                <!--end::SKU-->
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text fw-bold">Total</td>
                                <td>₹ {{ $booking->payment->total_amount }}</td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="8">Mismatch in counts between fees and booking fees</td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <tbody class="fw-semibold text-gray-600">
                            <!-- Total Amount -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Total Amount</td>

                                <td>₹ {{$booking->payment->total_amount}}</td>
                            </tr>

                            <!-- Discount -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Discount</td>
                                <td>₹ {{$booking->payment->discount}}</td>
                            </tr>

                            <!-- Net Payable -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Net Payable</td>
                                <td>₹ {{$booking->payment->net_amount}}</td>
                            </tr>

                            <!-- Balanced Amount -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Balanced Amount</td>
                                <td>₹ {{$booking->payment->balance}}</td>
                            </tr>

                            <!-- Amount Received -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Extra Fee </td>
                                <td>₹ {{$booking->payment->extra_fee}}</td>
                            </tr>
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2">Amount Received</td>
                                <td>₹ {{$booking->payment->recieved_amount}}</td>
                            </tr>

                            <!-- Paid Amount -->
                            <tr>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2"></td>
                                <td class="min-w-175px pb-2 text-dark">Paid Amount</td>
                                <td class="">₹ {{$booking->payment->recieved_amount}}</td>
                            </tr>

                            <!-- Payment Mode -->
                            <tr>

                                <td class="min-w-175px pb-2 text-dark">Payment Mode</td>
                                <td class=""> {{$booking->payment->payment_method}}</td>

                            </tr>
                            <tr>
                                <td class="min-w-175px pb-2 text-dark">cheque no</td>
                                <td class=""> {{$booking->payment->cheque_no}}</td>
                            </tr>
                            <tr>
                                <td class="min-w-175px pb-2 text-dark">Payment Date</td>
                                <td class=""> {{$booking->payment->payment_date}}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <!--end::Table-->
            </div>
            <!--end:Order summary-->
        </div>
        <!--end::Wrapper-->
        <div class="my-1">
            <p>Thank you for booking. Your <span class="highlight-text">token</span> is <span class="big-text">{{$booking->token}}</span>.</p>
        </div>
    </div>
    <!--end::Body-->
    <!-- begin::Footer-->
    <div class="d-flex flex-stack flex-wrap">
        <!-- begin::Actions-->
        <div class="my-1 me-5">
            <!-- begin::Print-->
            <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();">Print Invoice</button>
            <!-- end::Print-->
        </div>
        <!-- Add thank you message here -->

    </div>


    <!-- end::Actions-->
</div>
<!-- end::Footer-->
</div>
<!-- end::Wrapper-->
</div>
@endsection
@push('scripts')


@endpush
