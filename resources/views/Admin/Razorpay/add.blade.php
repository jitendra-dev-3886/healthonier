@extends('layouts.admin')



@section('content')





<div class="pagetitle"> 
<h3>Add Doctor RazorPay Detail</h3>

</div><!-- End Page Title -->

<section class="section">

    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="card-body">

                    <h5 class="card-title"></h5>



                    <!-- Vertical Form -->

                    <form class="row g-3" action="{{ route('admin.submit.doctorrazorpay') }}" method="POST" id="adddoctor">

                        @csrf
                        <input name="doctorid" type="hidden" class="form-control" id="doctorid" value="{{$id}}">

                        <div class="col-12">

                            <label for="razorpaykeyid" class="form-label">Razorpay Key Id</label>

                            <input name="razorpaykeyid" type="text" class="form-control" id="razorpaykeyid" required>

                        </div>
                        <div class="col-12">

                            <label for="razorpaysecretkey" class="form-label">Razorpay Secret Key</label>

                            <input name="razorpaysecretkey" type="text" class="form-control" id="razorpaysecretkey" required>

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

