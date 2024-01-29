@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Add Doctor </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    <form class="row g-3" action="{{ route('submit.doctor') }}" method="POST" id="adddoctor">
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
                       

                        @if($errors->any())
                        <div class="alert alert-danger" id="error-message">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="col-md-12">
                            <label for="inputNanme4" class="form-label">Doctor Name</label>
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
                            <label for="quantity">Add Speciality </label>
                            <select class="form-select form-control" name="speciality" aria-label="Default select example" required>
                                <option selected>Select Speciality </option>
                                @foreach($speciality as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
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
