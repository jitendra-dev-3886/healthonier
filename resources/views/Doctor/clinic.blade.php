<style>
    /* Add this to your stylesheet */

    .emergency-flag {
        background-color: red;
        color: white;
        padding: 2px 6px;
        margin-left: 5px;
        border-radius: 3px;
        border-radius: 10px;
        margin-left: 14px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        font-size: 10px;
        padding: 3px 8px;
    }

</style>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="card overflow-hidden">

                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @php $firstDiv = "first_div"; @endphp
                        @foreach($Location as $location)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $firstDiv }}" id="{{ $location->id }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $location->id }}" type="button" role="tab" aria-controls="{{ $location->id }}" aria-selected="false">{{ $location->name }}</button>
                        </li>
                        @php $firstDiv = ""; @endphp
                        @endforeach
                    </ul>


                    <div class="card-body">
                        <div class="tab-content pt-2" id="myTabContent">
                            @foreach($Location as $clinic)
                            <div class="tab-pane fade" id="{{ $clinic->id }}" role="tabpanel" aria-labelledby="{{ $clinic->id }}-tab">

                                <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="inner-box pt-3">
                                                <h5 class="fw-bold mb-4">Clinic Timing: <span class="text-theme">{{ $clinic->time }}</span> </h5>
                                                <h5 class="mb-4">You can change the status of running token </h5>
                                                <div class="row" id="token-container">
                                                    @foreach($clinic->bookings as $token)
                                                    @if($token->status == 0)
                                                    <div class="col-md-2 draggable-token" draggable="true" data-tokenid="{{$token->id}}" data-serial="{{$token->serial_number}}">
                                                        <!-- Adjust the column size as needed -->
                                                        @if($token->payment->status=='paid')
                                                        <div class="dropdown" id="pending">
                                                            @if($token->is_emergency == 1)
                                                            <span class="emergency-flag">Emergency</span>

                                                            @endif
                                                            @if($token->consultation_type == "online")
                                                            <span class="emergency-flag" style="background-color: #4CAF50; color: white; padding: 5px; border-radius: 5px;">Online Meeting</span>
                                                            @else
                                                            <span class="emergency-flag" style="background-color: rgb(5, 66, 233); color: white; padding: 5px; border-radius: 5px;">Offline Visit</span>

                                                            @endif

                                                            <button class="token_btn dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token}}</button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="dropdown-item dropitem" @if($token->meeting_link)
                                                                        
                                                                        onclick="openInNewWindow('{{ $token->meeting_link }}')"
                                                                        @endif
                                                                        >In</a>
                                                                </li>
                                                                <li><a class="dropdown-item dropitem" href="#">Out</a></li>
                                                                <li><a class="dropdown-item dropitem" href="#">Cancelled</a></li>
                                                            </ul>
                                                        </div>

                                                        @else
                                                        <div class="dropdown">
                                                            <button class="token_btn dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token = '' ? $token->token :$token->patient->user->name }}</button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                                                <li><a style="display:none" class="dropdown-item dropitem" href="#">In</a></li>
                                                                <li><a style="display:none" class="dropdown-item dropitem" href="#">Out</a></li>
                                                                <li><a style="display:none" class="dropdown-item dropitem" href="#">Cancelled</a></li>
                                                                <li><button class="btn">Unpaid</button></li>

                                                                {{-- <li><button class="btn modal-button" data-toggle="modal" data-target="#payment" data-id="{{$token->id }}" data-amount="{{ $token->payment->amount}}">Unpaid</button></li> --}}
                                                            </ul>
                                                        </div>

                                                        @endif

                                                    </div>
                                                    @elseif($token->status == 1)

                                                    <div class="col-md-2">

                                                        <div class="dropdown">
                                                            <button class="token_active dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token}}</button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                                                <li><a class="dropdown-item dropitem" href="#">Out</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @elseif($token->status == 3)
                                                    <div class="col-md-2">
                                                        <div class="dropdown">
                                                            <button class="token_cancel dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token}}</button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                                                <li><a class="dropdown-item dropitem" href="#">In</a></li>
                                                                <li><a class="dropdown-item dropitem" href="#">Out</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col-md-2">

                                                        <div class="dropdown">
                                                            <button class="token_complete" type="button">{{$token->token}}</button>

                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach

                                                </div>



                                            </div>
                                        </div>

                                        <div class="col-md-3 pt-3">
                                            <p><i class="bi bi-circle active_out"></i> Status Pending</p>
                                            <p><i class="bi bi-circle active_point"></i> Status In</p>
                                            <p><i class="bi bi-circle active_comp"></i> Status Out</p>
                                            <p><i class="bi bi-circle active_can"></i> Status Cancel</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div> <!-- End Default Tabs -->

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="modal" id="payment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="alert alert-primary paymentdone" role="alert" style="display:none">
                    Payment Updated!
                </div>
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">Payment Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="paymentForm">
                        <input type="hidden" class="form-control" id="bookingid" name="bookingid">
                        <div class="form-group">
                            <label for="paymentMethod">Select Payment Method:</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod">
                                <option value="cash">Cash</option>
                                <option value="paytm">Paytm</option>
                                <option value="creditCard">Credit Card</option>
                                <option value="debitCard">Debit Card</option>
                                <option value="upi">UPI (Unified Payments Interface)</option>
                                <option value="netBanking">Net Banking</option>
                                <option value="wallet">Digital Wallet (e.g., PhonePe, Google Pay)</option>
                            </select>
                        </div>

                        <div class="form-group" id="amountpaycpntainer">
                            <label for="amountpay">Amount:</label>
                            <input type="text" class="form-control" id="amountpay" name="amountpay" readonly>
                        </div>
                        <div class="form-group" id="transactionIdContainer" style="display: none;">
                            <label for="transactionId">Transaction ID:</label>
                            <input type="text" class="form-control" id="transactionId" name="transactionId">
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitPayment" id="submitPayment">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
