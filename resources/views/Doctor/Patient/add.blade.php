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
                    <form class="row g-3" action="{{ route('doctor.patient.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                        @if(session('suceess') == "This Email Is Already Exist!")
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                        @else
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label for="inputNanme4" class="form-label">Patient Name</label>
                                    <input name="name" type="text" class="form-control" id="inputNanme4" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="inputPassword4" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Add Group </label>
                                    <select class="form-select form-control" name="group" aria-label="Default select example" required>
                                        {{-- <option selected>Select Group </option> --}}
                                        @foreach($items as $item)
                                        <option value="{{$item->id}}">{{$item->group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label for="image">Profile </label>

                                    <input class="form-control" type="file" name="image">


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label for="inputNanme4" class="form-label">Mobile</label>
                                    <input name="mobile" type="number" class="form-control" id="inputNanme4" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Pincode</label>
                                    <input name="pincode" type="number" class="form-control" id="inputEmail4" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Date-Of-Birth</label>
                                    <input name="dob" type="date" class="form-control" id="inputPassword4" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" id="inputPassword4" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Gender </label>
                                    <select class="form-select form-control" name="gender" aria-label="Default select example" required>
                                        <option value="female" selected>Female </option>
                                        <option value="male">Male </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4>Health card</h3>
                                    <div class="col-md-12">
                                        <label for="inputBP" class="form-label">Blood Pressure</label>
                                        <input name="bp" type="text" class="form-control" id="inputBP">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputpulse" class="form-label">Pulse</label>
                                        <input name="pulse" type="text" class="form-control" id="inputpulse">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputheight" class="form-label">Height</label>
                                        <input name="height" type="text" class="form-control" id="inputheight">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputweight" class="form-label">Weight</label>
                                        <input name="weight" type="text" class="form-control" id="inputweight">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputtemperature" class="form-label">Temperature</label>
                                        <input name="temperature" type="text" class="form-control" id="inputtemperature">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputspo2" class="form-label">spo2</label>
                                        <input name="spo2" type="text" class="form-control" id="inputspo2">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputbmi" class="form-label">BMI</label>
                                        <input name="bmi" type="text" class="form-control" id="inputbmi">
                                    </div>
                            </div>

                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-theme">Submit</button>
                            <button type="reset" class="btn theme-btn-three"> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
