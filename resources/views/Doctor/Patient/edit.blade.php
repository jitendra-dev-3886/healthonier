@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Add Patient </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    <form class="row g-3" action="{{ route('doctor.update.patient',$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        @endif

                        <div class="row">
                            <!-- Personal Information -->
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label for="inputName" class="form-label">Patient Name</label>
                                    <input value="{{ $item->name ?? '' }}" name="name" type="text" class="form-control" id="inputName" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputMobile" class="form-label">Mobile</label>
                                    <input value="{{ $item->number ?? '' }}" name="mobile" type="number" class="form-control" id="inputMobile" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPincode" class="form-label">Pincode</label>
                                    <input value="{{ $item->pincode ?? '' }}" name="pincode" type="number" class="form-control" id="inputPincode" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputDOB" class="form-label">Date-Of-Birth</label>
                                    <input value="{{ $item->age ?? '' }}" name="dob" type="date" class="form-control" id="inputDOB" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input value="{{ $item->address ?? '' }}" name="address" type="text" class="form-control" id="inputAddress" required>
                                </div>
                            </div>

                            <!-- Profile Image and Group Selection -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Profile</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-sm-12">
                                        <img width="200" height="150" src="@if($item->image_path){{ asset($item->image_path) }}@else{{ asset('assets/img/') }}@endif" class="img-fluid" alt="...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="groupSelect">Add Group</label>
                                    <select class="form-select form-control" name="group" id="groupSelect" required>
                                        <option selected>Select Group</option>
                                        @foreach($group as $groupItem)
                                        <option value="{{ $groupItem->id }}" {{ $item->fee_concessions_id == $groupItem->id ? 'selected' : '' }}>
                                            {{ $groupItem->group_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="genderSelect">Gender</label>
                                    <select class="form-select form-control" name="gender" id="genderSelect" required>
                                        <option value="female" {{ $item->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="male" {{ $item->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Health Card Information -->
                            <div class="col-md-4">
                                <h4>Health Card</h4>
                                <div class="col-md-12">
                                    <label for="inputBP" class="form-label">Blood Pressure</label>
                                    <input value="{{ $item->bp ?? '' }}" name="bp" type="text" class="form-control" id="inputBP">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPulse" class="form-label">Pulse</label>
                                    <input value="{{ $item->pulse ?? '' }}" name="pulse" type="text" class="form-control" id="inputPulse">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputHeight" class="form-label">Height</label>
                                    <input value="{{ $item->height ?? '' }}" name="height" type="text" class="form-control" id="inputHeight">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputWeight" class="form-label">Weight</label>
                                    <input value="{{ $item->weight ?? '' }}" name="weight" type="text" class="form-control" id="inputWeight">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputTemperature" class="form-label">Temperature</label>
                                    <input value="{{ $item->temperature ?? '' }}" name="temperature" type="text" class="form-control" id="inputTemperature">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputSpo2" class="form-label">spo2</label>
                                    <input value="{{ $item->spo2 ?? '' }}" name="spo2" type="text" class="form-control" id="inputSpo2">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputBmi" class="form-label">BMI</label>
                                    <input value="{{ $item->bmi ?? '' }}" name="bmi" type="text" class="form-control" id="inputBmi">
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-theme">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
