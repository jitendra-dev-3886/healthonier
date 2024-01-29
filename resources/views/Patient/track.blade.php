@if(isset($tokens) && isset($booking))
<div class="container mt-5">
    <h1 class="text-center mb-4">Token Tracker</h1>
    <div class="row">
        <!-- Sales Card -->
        <div class="col-md-6">
            <div class="card info-card sales-card">
                <div class="p-3">
                    <h2>Clinic Name: {{$booking->clinic->name}}</h2>
                    <p>Date of Booking: {{$booking->booking_date}}</p>
                    <p>Time: {{$booking->time}}</p>

                    @if(isset($estimatedTimeDifference))
                    <h5 class="mt-3">Estimated time: {{$estimatedTimeDifference}} </h5>

                    @endif

                </div>

            </div>
        </div><!-- End Sales Card -->
        <div class="col-md-6">
            <div class="card info-card sales-card">
                <div class="p-3">
                        <p><i class="bi bi-circle active_out"></i> Status Pending</p>
                        <p><i class="bi bi-circle active_point"></i> Status In</p>
                        <p><i class="bi bi-circle active_comp"></i> Status Out</p>
                        <p><i class="bi bi-circle active_can"></i> Status Cancel</p>
                

                </div>

            </div>
        </div><!-- End Sales Card -->
    </div>
    <div id="tokenCarousel" class="token-container">
        @foreach($tokens as $token)
        <div class="token-box 
                @if($token->status == 0) incomp 
                @elseif($token->status == 1) ongoing
                @elseif($token->status == 2) comp
                @elseif($token->status == 3) can 
                @endif">
            {{$token->token}}
        </div>
        @endforeach
    </div>
</div>
@endif