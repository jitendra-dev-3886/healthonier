@extends('layouts.admin')
@section('content')
<style>
    .col-md-6 {
        /* Add any styles you want for the outer div here */
    }

    #followupBookingDetails {
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    label {
        font-weight: bold;
        font-size: 16px;
    }

</style>
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div class="content d-flex flex-column flex-column-fluid fade-in-image" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card card-body col-md-12">
                <div class="card-header p-4">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Prescription</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <div class="">
                    <!-- begin::Wrapper-->
                    <div class="mw-lg-950px mx-auto w-100">
                        <!-- begin::Header-->
                        <div class="d-flex justify-content-between mb-3">
                            <!--end::Logo-->
                            <!--begin::Logo-->
                            <a href="#" class="d-block p-3">
                                <img alt="Logo" src="{{ asset('doctordata/logo/1694002120.png')}}" height="100px">
                            </a>
                            <!--end::Logo-->
                            <div class="text-end">
                                <!--begin::Text-->
                                <div class="text-sm-end fw-semibold fs-4 text-muted p-3">
                                    <div>Dr. Manish Sharma</div>
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
                                                        <span class="text-muted">Patient Name:{{$booking->patient->user->name}}</span>
                                                    </div>
                                                    <div class="flex-root d-flex flex-column">
                                                        <span class="text-muted">Contact: {{$booking->patient->number}}</span>
                                                    </div>
                                                    <div class="flex-root d-flex flex-column">
                                                        <span class="text-muted">DOB: {{$booking->patient->age}}</span>
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
                                                <div class="gap-4 gap-md-5 fw-bold">
                                                    <div class="flex-root d-flex flex-column">
                                                        <span class="text-muted">Clinic Name: {{$booking->clinic->name}}</span>
                                                    </div>
                                                    <div class="flex-root d-flex flex-column">
                                                        <span class="text-muted">Contact: {{$booking->clinic->contact_number}}</span>
                                                    </div>
                                                    {{-- <div class="flex-root d-flex flex-column">
                                                        <span class="text-muted">Email:
                                                            doctor@gmail.com</span>
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
                                <h5>Diagnostic summary</h5>
                                <p> {{$prescription->diagnostic_summary}}</p>
                                <!--begin::Separator-->
                                <div class="separator"></div>
                                <!--begin::Separator-->
                                <!--begin:Order summary-->
                                <div class="d-flex justify-content-between flex-column">
                                    <!--begin::Table-->
                                    <div class="table-responsive mb-9">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <thead>
                                                <tr class=" fs-6 fw-bold text-muted">
                                                    <th class="min-w-175px pb-2">Medicine Name</th>
                                                    <th class="min-w-70px pb-2 ">Composition</th>
                                                    <th class="min-w-80px pb-2 ">Dosage</th>
                                                    <th class="min-w-80px pb-2 ">Timing </th>
                                                    <th class="min-w-100px pb-2 ">Dose Repetition </th>
                                                    <th class="min-w-100px pb-2 ">Remark </th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Products-->
                                                @foreach($prescription->medicines as $data)
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td>{{$data->medicine_name}} </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="">{{$data->composition}}</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="">{{$data->morning == 1 ? 'Morning':''}},
                                                        {{$data->afternoon == 1 ? 'Afternoon':''}},
                                                        {{$data->evening == 1 ? 'Evening':''}}</td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Total-->
                                                    <td class="">{{$data->timing}}</td>
                                                    <!--end::Total-->
                                                    <td class="">{{$data->dose_repetition}} </td>
                                                    <td class="">{{$data->remark}} </td>
                                                </tr>
                                                @endforeach
                                                <!--end::Products-->
                                                <!--begin::Products-->

                                                <!--end::Products-->

                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end:Order summary-->

                                <h5>Prescribed Test</h5>
                                @foreach($prescription->prescribedTests as $test)
                                @endforeach
                                <p class="m-0 p-0">{{$test->test_name}}</p>
                                <!--begin::Separator-->
                                <div class="separator"></div>
                                <!--begin::Separator-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Body-->

                    </div>
                    <!-- end::Wrapper-->
                </div>
            </div>
        </div>
    </div>

    @endsection
    @push('scripts')

    @endpush
