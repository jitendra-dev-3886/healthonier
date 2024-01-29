@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Edit Clinic</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{ route('admin.update.clinic', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Clinic Location</label>
                                    <input value="{{ $data->name }}" name="name" type="text" class="form-control" id="inputNanme4" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="col-form-label">Address</label>
                                    <textarea name="address" class="form-control" style="height: 100px" required>{{ $data->address }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputNumber" class="col-form-label">Number</label>
                                    <input value="{{ $data->contact_number	 }}" name="number" type="number" class="form-control" required>
                                </div>
                                {{-- <div class="col-12">
                                    <label for="fee" class="col-form-label">General Consultation</label>
                                    <input value="{{$data->fee}}" name="fee" type="number" class="form-control" required>
                                </div> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12" style="display:none">
                                    <label class="col-sm-2 col-form-label">Select</label>
                                    <select class="form-select" name="timeSlot" aria-label="Default select example">
                                        <option value="{{$timeslot->id}}">{{$label}}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <h5>Available Days</h5>
                                    @foreach ($days as $weekday)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="weekdays[]" value="{{ $weekday->id }}" @if (in_array($weekday->id, $storedArray))checked
                                        @endif>
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $weekday->days }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
