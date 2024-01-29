<?php
use App\Models\Weekday;
use App\Models\Timeslot;
use Carbon\Carbon;

?>
<div class="inner-box box_design">
    <h3 class="mb-4">Running Token </h3>
    <div class="row my-row ">
        @if(isset($bookings))
        @foreach($bookings as $item)
      
         <div class="col-md-3">
            <p class="@if($item->status == 0) incomp 
                @elseif($item->status == 1) ongoing
                @elseif($item->status == 2) comp
                @elseif($item->status == 3) can @endif"> 
                @if($enteredTokenNumber == $item->token && $item->status == 0) <?php echo "Your Token" ?>
                @elseif($item->status == 1) <?php echo "Ongoing" ?>
                @elseif($item->status == 2) <?php echo "Completed" ?>
                @elseif($item->status == 3) <?php echo "Cancelled" ?>
                @elseif($item->status == 0) <?php echo "pending" ?>
                  @endif <span></span> </p>
            <span class=" @if($enteredTokenNumber == $item->token && $item->status == 0) highlight 
                @elseif($item->status == 1) in
                @elseif($item->status == 2) out
                @elseif($item->status == 3) cancelled
                @elseif($item->status == 0) pending
                @endif ">{{ $item->token }}</span>
        </div>
    
      
       
        @endforeach
        @else
        <h5 class="mt-3">Select your Clinic and Enter your Token To see the status !</h5>
        @endif
       
    </div>
    <p></p>


    {{-- @if(isset($timeslot->start_time))
    <h4 class="mt-3 mb-0">
        Clinic timing: {{ \Carbon\Carbon::parse($timeslot->start_time)->format('h:i a') }} To {{ \Carbon\Carbon::parse($timeslot->end_time)->format('h:i a') }}
    </h4>
    @else
    <p>No Bookings ! </p>
    @endif --}}
    @if(isset($estimatedTimeDifference))
    <h5 class="mt-3">Estimated time: {{$estimatedTimeDifference}} </h5>
    @else
    @endif
</div>





