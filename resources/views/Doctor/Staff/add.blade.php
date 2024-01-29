@extends('layouts.admin')



@section('content')





<div class="pagetitle"> 
<h4>Staff Add</h4>

    <!-- <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Add Staff</li>

        </ol>

    </nav> -->

</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="p-4"> 



                    <!-- Vertical Form -->

                    <form class="row g-3" action="{{ route('submit.staff') }}" method="POST" id="adddoctor">

                        @csrf

                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @endif

                        <div class="col-12">

                            <label for="inputNanme4" class="form-label">Your Name</label>

                            <input name="name" type="text" class="form-control" id="inputNanme4">

                        </div>

                        <div class="col-12">

                            <label for="inputEmail4" class="form-label">Email</label>

                            <input name="email" type="email" class="form-control" id="inputEmail4">

                        </div>

                        <div class="col-12">

                            <label for="inputPassword4" class="form-label">Password</label>

                            <input name="password" type="password" class="form-control" id="inputPassword4">

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-theme">Submit</button>

                            <button type="reset" class="btn theme-btn-three">Reset</button>

                        </div>

                    </form><!-- Vertical Form -->



                </div>

            </div>

        </div>

    </div>

</section>









@endsection

