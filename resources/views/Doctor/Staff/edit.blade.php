@extends('layouts.admin')



@section('content')





<div class="pagetitle"> 
<h4>Staff Edit</h4>
<!-- 
    <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Edit Staff</li>

        </ol>

    </nav> -->

</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="p-4"> 



                    <!-- Vertical Form -->

                    <form action="{{ route('update.staff', $item->id) }}" method="POST">

                        @csrf

                        @method('PUT')

                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @endif



                        <div class="form-group">

                            <label for="name">Name</label>

                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control">

                        </div>



                        <div class="form-group">

                            <label for="quantity">Email</label>

                            <input type="email" name="email" id="quantity" value="{{ $item->email }}" class="form-control">

                        </div>

                        <div class="form-group" style="display:none">

                            <label for="quantity">Add Clinic </label>

                            <select class="form-select form-control" name="clinic" aria-label="Default select example">

                                <option selected>select</option>

                                @foreach($data as $data)

                                <option value="{{$data->id}}">{{$data->name}}</option>

                                @endforeach

                            </select>

                        </div>



                        <button type="submit" class="btn btn-theme mt-3">Update</button>

                    </form>



                </div>

            </div>

        </div>

    </div>

</section>









@endsection

