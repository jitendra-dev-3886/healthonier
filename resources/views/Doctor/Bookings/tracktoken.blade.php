@extends('layouts.admin')
@section('content')
<style>
    /* Custom styles for max-width, max-height, and padding */
    .card-body {
      height:70px;
      padding: 10px; /* Adjust padding as needed */
    }
  </style>
@foreach($clinics as $clinic)

<div class="container mt-5">
    <!-- Clinic Name Section -->
    <div class="row mb-4">
        <div class="col">
            <h2>{{$clinic->name}}</h2>
        </div>
    </div>

    <!-- Booking Token Rows -->

    <div class="row">
        <!-- Booking Token 1 -->
        @foreach($clinic->bookings as $token)
        <div class="col-md-2 mb-3"  >
            <div class="card" style="background-color: @if($token->status == 0) white @elseif($token->status == 1) #39cabb @elseif($token->status == 2) #39ca5f @elseif($token->status == 3) #fe5948 @endif ;">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">{{$token->token != '' ?  $token->token:$token->patient->user->name }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endforeach



@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endpush
