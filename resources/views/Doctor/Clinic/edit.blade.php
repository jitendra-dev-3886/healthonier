@extends('layouts.admin')



@section('content')
<div class="pagetitle">
    <h4>Edit Clinic</h4>


</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="p-4">


                    <form action="{{ route('update.clinic', $item[0]->id) }}" method="POST">

                        @csrf

                        @method('PUT')

                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @endif

                        <div class="row mt-3">
                            <div class="col-lg-4">

                                <div class="col-md-12">

                                    <label for="clinicName" class="form-label">Clinic Location</label>

                                    <input value="{{$item[0]->name}}" name="name" type="text" class="form-control" id="clinicName" required>

                                </div>

                                <div class="col-12">

                                    <label for="ClinicAddress" class="col-form-label">Address</label>



                                    <textarea name="address" class="form-control" required>{{$item[0]->address}}</textarea>



                                </div>

                                <div class="col-md-12">

                                    <label for="inputNumber" class="col-form-label">Mobile</label>

                                    <input value="{{$item[0]->contact_number}}" name="number" type="number" class="form-control" required>



                                </div>


                            </div>
                            <div class="col-lg-8">
                                @foreach ($Weekdays as $weekday)
                                <div class="form-group row mt-3">
                                    <div class="col-md-12 font-weight-bold">
                                        <input class="weekday-checkbox" type="checkbox" name="weekdays[]" value="{{ $weekday->id }}" @if (in_array($weekday->id, $item[0]->availabilities->pluck('weekday_id')->toArray()))
                                        checked
                                        @endif
                                        >
                                        <label for=""> {{ $weekday->days }}</label>
                                    </div>

                                    @php
                                    $availabilityFound = false;
                                    @endphp

                                    @foreach ($item[0]->availabilities as $availability)
                                    @if ($availability->weekday_id == $weekday->id)
                                    <div class="form-line col-md-4">
                                        <label>From</label>
                                        <input type="time" name="starttime[]" class="time12 pl-20 form-control" placeholder="time " value="{{ $availability->timeslots->start_time }}">
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label>To</label>
                                        <input type="time" name="endtime[]" class="time12 pl-20 form-control" placeholder="time " value="{{ $availability->timeslots->end_time }}">
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label for="inputNumber" class="col-sm-12 col-form-label">Number Of Tokens</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="booking[]" class="form-control" value="{{ $availability->timeslots->slots }}" />
                                        </div>
                                    </div>

                                    @php
                                    $availabilityFound = true;
                                    @endphp
                                    @endif
                                    @endforeach

                                    @if (!$availabilityFound)
                                    <div class="form-line col-md-4">
                                        <label>From</label>
                                        <input type="time" name="starttime[]" class="time12 pl-20 form-control" placeholder="time " value="09:00">
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label>To</label>
                                        <input type="time" name="endtime[]" class="time12 pl-20 form-control" placeholder="time " value="12:00">
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label for="inputNumber" class="col-sm-12 col-form-label">Number Of Tokens</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="booking[]" class="form-control" />
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>


                        </div>





                        <button type="submit" class="btn btn-theme">Update</button>

                    </form>



                </div>

            </div>

        </div>

    </div>

</section>









@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // Initially disable the inputs
        $('.weekday-checkbox:not(:checked)').each(function() {
            var parentDiv = $(this).closest('.form-group');
            parentDiv.find('input[type="time"]').prop('disabled', true);
            parentDiv.find('input[type="number"]').prop('disabled', true);
        });

        // Enable/disable inputs based on checkbox change
        $('.weekday-checkbox').change(function() {
            var isChecked = $(this).is(':checked');
            var parentDiv = $(this).closest('.form-group');

            parentDiv.find('input[type="time"]').prop('disabled', !isChecked);
            parentDiv.find('input[type="number"]').prop('disabled', !isChecked);
        });
    });

</script>
@endpush
