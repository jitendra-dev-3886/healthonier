@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Add Clinic</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form class="row g-3" action="{{ route('admin.submit.clinic') }}" method="POST" id="adddoctor">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <input name="doctor_id" type="hidden" class="form-control" id="doctorid" value="{{$timeslot->doctor_id}}">
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Clinic Location</label>
                                    <input name="name" type="text" class="form-control" id="inputNanme4" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="col-form-label">Address</label>
                                    <textarea name="address" class="form-control" style="height: 100px" required></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputNumber" class="col-form-label">Mobile</label>
                                    <input name="number" type="number" class="form-control" required>
                                </div>
                                {{-- <div class="col-12">
                                    <label for="fee" class="col-form-label">General Consultation Fee</label>
                                    <input name="fee" type="number" class="form-control" required>
                                </div> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <label class="col-sm-2 col-form-label">Time slots</label>
                                    <select class="form-select" name="timeSlot" aria-label="Default select example">
                                        <option value="{{$timeslot->id}}">{{$label}}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <h5>Available Days</h5>
                                    @foreach ($Weekdays as $weekday)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="weekdays[]" value="{{ $weekday->id }}">
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $weekday->days }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
