<div class="card-body">
    <div class="tab-content pt-2" id="myTabContent">
        @foreach($Location as $location)
        <div class="tab-pane fade" id="{{ $location->clinic->id }}" role="tabpanel" aria-labelledby="{{ $location->clinic->id }}-tab">

            <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="row">
                    <div class="col-md-9">
                        <div class="inner-box pt-3">
                            <h5 class="fw-bold mb-4">Clinic Timing: <span class="text-theme">{{ $location->time }}</span> </h5>
                            <h5 class="mb-4">You can change the status of running token </h5>
                            <div class="row" id="token-container">
                                @foreach($clinicDatas as $token)
                                @if($token->status == 0)
                                <div class="col-md-2 draggable-token" draggable="true" data-tokenid="{{$token->id}}" data-serial="{{$token->serial_number}}">
                                    <!-- Adjust the column size as needed -->
                                    @if($token->payment->status=='paid')
                                    <div class="dropdown" id="pending">
                                        @if($token->is_emergency == 1)
                                        <span class="emergency-flag">Emergency</span>

                                        @endif
                                        <button class="token_btn dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token}}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                            <li><a class="dropdown-item dropitem" href="#">In</a></li>
                                            <li><a class="dropdown-item dropitem" href="#">Out</a></li>
                                            <li><a class="dropdown-item dropitem" href="#">Cancelled</a></li>

                                        </ul>
                                    </div>

                                    @else
                                    <div class="dropdown">
                                        <button class="token_btn dropdown-toggle" type="button" id="dropdownMenuButton{{$token->id}}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$token->token}}</button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$token->id}}">
                                            <li><a style="display:none" class="dropdown-item dropitem" href="#">In</a></li>
                                            <li><a style="display:none" class="dropdown-item dropitem" href="#">Out</a></li>
                                            <li><a style="display:none" class="dropdown-item dropitem" href="#">Cancelled</a></li>

                                            <li><button class="btn modal-button" data-toggle="modal" data-target="#payment" data-id="{{$token->id }}" data-amount="{{ $token->payment->amount}}">Unpaid</button></li>
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
