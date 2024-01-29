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
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0"> Edit Prescription</h3>
                    </div>
                </div>

                <div class="mb-5 mb-xl-10">
                    <div class="card-body py-3">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form class="row g-3" action="{{ route('doctor.prescription.update', $prescription->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="bookingid" value="{{ $prescription->booking_id }}">

                            <div class="col-md-12 form-group">
                                <label for="">Diagnostic summary </label>
                                <textarea type="text" rows="4" name="diagnostic_summary" class="form-control" placeholder="">{{ $prescription->diagnostic_summary }}</textarea>
                            </div>
                            <fieldset class="drugs_labels">
                                @foreach($prescription->medicines as $medicine)
                                <div class="repeatable">
                                    <section class="field-group">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <label for="">Medicine Name</label>
                                                <input type="text" class="form-control" name="medicine[]" value="{{$medicine->medicine_name}}">
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Composition</label>
                                                    <input type="text" id="strength" name="composition[]" class="form-control" placeholder="" value="{{$medicine->composition}}">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Dosage</label>
                                                    <div class="d-flex align-items-center mt-3">
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                            <input class="form-check-input" name="morning[]" type="checkbox" value="1" {{$medicine->morning == 1 ? 'checked' : '' }}>
                                                            <span class="fw-semibold ps-2 fs-6">Morning</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                                            <input class="form-check-input" name="afternoon[]" type="checkbox" value="2" {{$medicine->afternoon == 1 ? 'checked' : '' }}>
                                                            <span class="fw-semibold ps-2 fs-6">Afternoon</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                                                            <input class="form-check-input" name="evening[]" type="checkbox" value="2" {{$medicine->evening == 1 ? 'checked' : '' }}>
                                                            <span class="fw-semibold ps-2 fs-6">Evening</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Timing</label>
                                                    <input type="text" id="" name="timing[]" class="form-control" placeholder="" value="{{$medicine->timing}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Dose Repetition</label>
                                                    <input type="text" id="" name="dose[]" class="form-control" placeholder="" value="{{$medicine->dose_repetition}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Remark</label>
                                                    <input type="text" id="" name="remark[]" class="form-control" placeholder="" value="{{$medicine->remark}}">
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
                                @endforeach

                            </fieldset>
                            <div class="form-group">
                                <a type="button" align="center" class="btn btn-success add text-white"><i class="fa fa-plus"></i> Add More </a>
                            </div>
                            <div class="testContainer">
                                @foreach($prescription->prescribedTests as $prescribedTests)

                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <label class="col-form-label"> Prescribed Test </label>
                                        <input type="text" name="test[]" class="form-control" required="" value="{{$prescribedTests->test_name}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <a type="button" align="center" class="btn btn-danger removetest text-white mt-5">
                                            <i class="fa fa-minus"></i> Remove
                                        </a>
                                        <a type="button" align="center" class="btn btn-success addtest text-white mt-5">
                                            <i class="fa fa-plus"></i> Add More
                                        </a>
                                    </div>
                                </div>


                                @endforeach
                            </div>





                            <div class="col-md-12 form-group">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Update Prescription</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        function addRemoveListener(button) {
            button.addEventListener('click', function() {
                const row = button.closest('.row');
                if (row) {
                    row.parentNode.removeChild(row);
                }
            });
        }

        const testContainer = document.querySelector('.testContainer');

        testContainer.addEventListener('click', function(event) {
            const target = event.target;
            if (target.classList.contains('addtest')) {
                const newTestGroup = document.createElement('div');
                newTestGroup.classList.add('row');
                newTestGroup.innerHTML = `
                <div class="col-md-6 form-group">
                    <label class="col-form-label"> Prescribed Test </label>
                    <input type="text" name="test[]" class="form-control" required="">
                </div>
                <div class="col-md-6 form-group">
                    <a type="button" align="center" class="btn btn-danger removetest text-white mt-5">
                        <i class="fa fa-minus"></i> Remove 
                    </a>
                    <a type="button" align="center" class="btn btn-success addtest text-white mt-5">
                        <i class="fa fa-plus"></i> Add More
                    </a>
                </div>
            `;
                testContainer.appendChild(newTestGroup);
                const removeButton = newTestGroup.querySelector('.removetest');
                addRemoveListener(removeButton);
            } else if (target.classList.contains('removetest')) {
                const row = target.closest('.row');
                if (row) {
                    row.parentNode.removeChild(row);
                }
            }
        });
    });

</script>
@endpush
