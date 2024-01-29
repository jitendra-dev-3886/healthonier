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
                    <form action="{{route('update.tax' ,$item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Name</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->tax_name}}" type="text" name="tax_name" class="form-control" required />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Percentage</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->amount}}" type="number" name="amount" class="form-control" required />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputNumber" class="col-sm-12 col-form-label">Tax Description</label>

                                <div class="col-sm-12">

                                    <input value="{{$item->tax_description}}" type="text" name="tax_description" class="form-control" required />

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
