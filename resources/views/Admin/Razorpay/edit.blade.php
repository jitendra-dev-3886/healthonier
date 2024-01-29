@extends('layouts.admin')



@section('content')





<div class="pagetitle">
<h3>Edit Doctor RazorPay Detail</h3>

</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="p-4">

                    <h5 class="card-title"></h5>
                    <form  method="POST" class="row g-3" action="{{ route('admin.update.doctorrazorpay') }}" id="adddoctor">
                        @csrf


                        @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                        @endif

                        @csrf
                        <input name="doctorid" type="hidden" class="form-control" id="doctorid" value="{{$id}}">

                        <div class="col-12">

                            <label for="razorpaykeyid" class="form-label">Razorpay Key Id</label>

                            <input name="razorpaykeyid" type="text" class="form-control" id="razorpaykeyid" value="{{$data->razor_pay_key_id}}">

                        </div>
                        <div class="col-12">

                            <label for="razorpaysecretkey" class="form-label">Razorpay Secret Key</label>

                            <input name="razorpaysecretkey" type="text" class="form-control" id="razorpaysecretkey" value="{{$data->razor_pay_key_secret}}">

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-theme">Update</button>

                        </div>

                    </form><!-- Vertical Form -->


                </div>

            </div>

        </div>

    </div>

</section>









@endsection
