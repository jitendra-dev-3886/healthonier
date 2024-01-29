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
                        <h3 class="fw-bold m-0"> Add Prescription</h3>
                    </div>
                    <!--end::Card title-->
                </div>

                <div class="mb-5 mb-xl-10">
                    <div class="card-body py-3">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!--begin::Table container-->
                        <form class="row g-3" action="{{ route('doctor.prescription.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bookingid" value="{{ $id}}">
                            <div class="col-md-12 form-group">
                                <label for="">Diagnostic summary </label>
                                <textarea type="text" rows="4" name="diagnostic_summary" class="form-control" placeholder=""></textarea>
                            </div>
                            <fieldset class="drugs_labels">
                                <div class="repeatable">
                                    <section class="field-group">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <label for="">Medicine Name</label>
                                                <input type="text" class="form-control" name="medicine[]">
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Composition</label>
                                                    <input type="text" id="strength" name="composition[]" class="form-control" placeholder="">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Dosage</label>
                                                    <div class="d-flex align-items-center mt-3">
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                            <input class="form-check-input" name="morning[]" type="checkbox" value="1">
                                                            <span class="fw-semibold ps-2 fs-6">Morning</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                            <input class="form-check-input" name="afternoon[]" type="checkbox" value="1">
                                                            <span class="fw-semibold ps-2 fs-6">Afternoon</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                            <input class="form-check-input" name="evening[]" type="checkbox" value="1">
                                                            <span class="fw-semibold ps-2 fs-6">Evening</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Timing</label>
                                                    <input type="text" id="" name="timing[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Dose Repetition</label>
                                                    <input type="text" id="" name="dose[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Remark</label>
                                                    <input type="text" id="" name="remark[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <a type="button" align="center" class="btn btn-danger removed text-white"><i class="fa fa-plus"></i> Removed </a>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                            </fieldset>
                            <div class="form-group">
                                <a type="button" align="center" class="btn btn-success add text-white"><i class="fa fa-plus"></i> Add More </a>
                            </div>
                            <div class="row" id="testContainer">
                                <div class="col-md-6 form-group">
                                    <label class="col-form-label"> Prescribed Test </label>
                                    <input type="text" name="test[]" class="form-control" required="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <a type="button" align="center" class="btn btn-success addtest text-white mt-5">
                                        <i class="fa fa-plus"></i> Add More
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Next Booking Date </label>
                                        <input class="form-control" min="<?php echo date('Y-m-d'); ?>" type="date" name="date" placeholder="Next Booking Date">

                                    </div>
                                </div>

                            </div>




                            <div class="col-md-12 form-group">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Add Prescription</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Table container-->

                    </div>

                    <!--begin::Body-->
                </div>
            </div>
        </div>
    </div>

    @endsection
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add More Button
            document.querySelector('.add').addEventListener('click', function() {
                const fieldset = document.querySelector('.repeatable');
                const newFieldset = fieldset.cloneNode(true);

                // Clear input fields in the cloned section, including checkboxes
                const inputFields = newFieldset.querySelectorAll('input');
                inputFields.forEach(function(input) {
                    if (input.type === 'text') {
                        input.value = '';
                    } else if (input.type === 'checkbox') {
                        // Ensure the value attribute is set to an appropriate value
                        input.value = '1'; // You can set it to '1' for checked checkboxes
                        input.checked = false; // Uncheck the cloned checkboxes
                    }
                });

                // Append the new fieldset to the parent container
                fieldset.parentNode.appendChild(newFieldset);

                // Add a new 'Removed' button to the cloned section
                addRemovedButton(newFieldset);
            });

            // Removed Button
            const addRemovedButton = function(fieldset) {
                const removedButton = fieldset.querySelector('.removed');
                removedButton.addEventListener('click', function() {
                    fieldset.parentNode.removeChild(fieldset);
                });
            };

            // Add a 'Removed' button to the first section
            addRemovedButton(document.querySelector('.repeatable'));
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testContainer = document.getElementById('testContainer');

            testContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('addtest')) {
                    const newTestGroup = document.createElement('div');
                    newTestGroup.classList.add('row');
                    newTestGroup.innerHTML = `
                <div class="col-md-6 form-group">
                    <label class="col-form-label"> Prescribed Test </label>
                    <input type="text" name="test[]" class="form-control" required="">
                </div>
                <div class="col-md-6 form-group">
                    <a type="button" align="center" class="btn btn-danger remove text-white mt-5">
                        <i class="fa fa-minus"></i> Remove 
                    </a>
                </div>
            `;
                    testContainer.appendChild(newTestGroup);
                }

                if (event.target.classList.contains('remove')) {
                    const rowToRemove = event.target.closest('.row');
                    rowToRemove.parentNode.removeChild(rowToRemove);
                }
            });
        });

    </script>
    @endpush
