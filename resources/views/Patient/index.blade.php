@extends('layouts.admin')

@section('content')
<style>
    .token-container {
        display: flex;
        overflow: hidden;
    }

    .token-box {
        width: 200px;
        height: 100px;

        color: #0b0b0b;
        text-align: center;
        line-height: 100px;
        font-size: 24px;
        border-radius: 10px;
        margin-right: 10px;
        animation: moveToken 20s linear infinite alternate;
    }

    .clinic-info {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .clinic-info h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .clinic-info p {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .token-container {
        display: flex;
        overflow: hidden;
    }

    .incomp {
        background-color: #FFC107;

    }

    .ongoing {
        background-color: #0C75AC;
    }

    .comp {
        background-color: #009786;
    }

    .can {
        background-color: #E53B10;
    }


    @keyframes moveToken {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(-100%);
        }
    }

</style>
<div class="container">
    <div class="row justify-content-center dashboard">
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d2.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Today's Appointment :{{$Pending}}</span>
                                    <h6></h6>

                                </div>

                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card primary-card sales-card">
                        <div class="p-3">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Completed Appointment: {{$Completed}}</span>
                                    <h6></h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
               


            </div>


        </div>

    </div>
   


</div>



@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endpush
