@extends('layouts.admin')



@section('content')
<style>
    #tp-box {
        background: #39cabb !important;
    }

    .tp-up,
    .tp-down {
        color: black !important;
    }

    #tp-close {
        background: #117c71 !important;
    }

    #tp-set {
        background: #135c55 !important;
    }

</style>
<div class="pagetitle">
    <h4>Add Clinic</h4>

</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">

            <div class="card">

                <div class="p-4">


                    <form class="row g-3" action="{{ route('submit.clinic') }}" method="POST" id="adddoctor">

                        @csrf

                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @endif

                        <div class="row mt-3">

                            <div class="col-lg-4">

                                <div class="col-md-12">

                                    <label for="inputNanme4" class="form-label">Clinic Location</label>

                                    <input name="name" type="text" class="form-control" id="inputNanme4" required>

                                </div>

                                <div class="col-12">

                                    <label for="inputPassword" class="col-form-label">Address</label>



                                    <textarea name="address" class="form-control" required></textarea>



                                </div>

                                <div class="col-md-12">

                                    <label for="inputNumber" class="col-form-label">Mobile</label>

                                    <input name="number" type="number" class="form-control" required>



                                </div>

                            </div>





                            <div class="col-lg-8">
                                @foreach ($Weekdays as $weekday)
                                <div class="form-group row mt-3">
                                    <div class="col-md-12 font-weight-bold">
                                        <input type="checkbox" name="weekdays[]" value="{{ $weekday->id }}" class="weekday-checkbox">
                                        <label for=""> {{ $weekday->days }}</label>
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label>From</label>
                                        <input type="time" name="starttime[]" class="time12 pl-20 form-control" placeholder="time " value="09:00" disabled>
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label>To</label>
                                        <input type="time" name="endtime[]" class="time12 pl-20 form-control" placeholder="time " value="12:00" disabled>
                                    </div>

                                    <div class="form-line col-md-4">
                                        <label for="inputNumber" class="col-sm-12 col-form-label">Number Of Tokens</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="booking[]" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                @endforeach





                            </div>
                            <br>



                            <div class="text-center">

                                <button type="submit" class="btn btn-theme">Submit</button>

                                <button type="reset" class="btn theme-btn-three">Reset</button>

                            </div>



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
        $('.weekday-checkbox').change(function() {
            var isChecked = $(this).is(':checked');
            var parentDiv = $(this).closest('.form-group');

            parentDiv.find('input[type="time"]').prop('disabled', !isChecked);
            parentDiv.find('input[type="number"]').prop('disabled', !isChecked);
        });
    });

</script>
@endpush
