@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h1>Edit Tax</h1>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="{{route('update.followup' ,$item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Min Days</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->min_days}}" type="number" name="min_days" class="form-control" required placeholder="Enter Min Days " />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Max Days</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->max_days}}" type="number" name="max_days" class="form-control" required placeholder="Enter Max Days " />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Discount</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->percentage_amount}}" type="number" name="percentage_amount" class="form-control" required placeholder="Enter Discount" />

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount_type">Discount Type</label>

                                    <select class="form-select" id="discount_type" name="discount_type">
                                        <option value="0" {{$item->discount_type == 0 ? 'selected' : ''}}>Flat</option>
                                        <option value="1" {{$item->discount_type == 1 ? 'selected' : ''}}>Percentage</option>
                                    </select>
                                </div>

                            </div>
                            <div id="taxDetailsContainer"></div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
