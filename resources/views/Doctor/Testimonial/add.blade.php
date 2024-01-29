@extends('layouts.admin')

@section('content')


<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Testimonial</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('submit.testimonial') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>

                        @endif
                        <div class="col-md-12">
                            <label>Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Review</label>
                            <div class="col-sm-12">
                                <input type="text" name="review" class="form-control" />
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label>Designation</label>
                            <div class="col-sm-12">
                                <input type="text" name="designation" class="form-control" />
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label>Profile</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="file" name="profile">
                            </div>

                        </div>


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
