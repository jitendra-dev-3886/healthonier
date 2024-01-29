@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center dashboard">
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d2.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Clinic</span>
                                    <h6> {{count($Location)}}</h6>

                                </div>

                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card primary-card sales-card">
                        <div class="p-3">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Token</span>
                                    <h6> {{count($ClinicData)}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card success-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d3.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Patient </span>
                                    <h6>{{count($ClinicData)}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->


            </div>
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Token Pending</span>
                                    <h6 id="total-pending-count"> {{count($Pending)}}</h6>

                                </div>

                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card primary-card sales-card">
                        <div class="p-3">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Token Cancelled</span>
                                    <h6 id="total-cancelled-count"> {{count($Cancelled)}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-xxl-4 col-md-4">
                    <div class="card success-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Token Completed </span>
                                    <h6 id="total-completed-count">{{count($Completed)}}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                {{-- <div class="col-xxl-8 col-md-8">
                    <div class="card success-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/token.png')}}">
            </div>
            <div class="ps-3">
                <span class="fw-bold">Doctor Status Indicator </span>
                <!-- Your HTML code -->
                @foreach($DoctorStatusData as $item)
                <div class="col-md-12 font-weight-bold">
                    <input type="radio" class="status-checkbox" name="status_available" value="{{$item->id}}" @if ($item->id== auth()->user()->doctor->available_status) checked @endif>
                    <label for=""> {{$item->status}}</label>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div> --}}
</div><!-- End Sales Card -->
</div>
</div>


</div>
</div>

@include('Doctor.clinic')
@endsection
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to handle the status change
        function changeStatus(tokenId, status) {
            $.ajax({
                url: '/booking-status/' + tokenId
                , method: 'POST'
                , data: {
                    _token: '{{ csrf_token() }}'
                    , status: status
                }
                , success: function(response) {
                    $('#total-pending-count').text(response.totalPendingCount);
                    $('#total-cancelled-count').text(response.totalcancelledCount);
                    $('#total-completed-count').text(response.totalcompletedCount);
                    var button = $("#dropdownMenuButton" + tokenId);
                    button.text(response.token);

                    switch (status) {
                        case 'In':
                            button.removeClass().addClass("token_active dropdown-toggle");
                            break;
                        case 'Out':
                            button.removeClass().addClass("token_complete dropdown-toggle");
                            break;
                        case 'Cancelled':
                            button.removeClass().addClass("token_cancel dropdown-toggle");
                            break;
                        default:

                    }
                    var dropdownMenu = button.siblings('.dropdown-menu');
                    switch (response.slot) {
                        case 0:
                            console.log('status 0');

                            dropdownMenu.find('.dropitem').show();
                            break;
                        case 1:

                            dropdownMenu.find('.dropitem:contains("In")').hide();
                            dropdownMenu.find('.dropitem:contains("Out")').show();
                            dropdownMenu.find('.dropitem:contains("Cancelled")').hide();
                            console.log('status 1');
                            break;
                        case 2:
                            console.log('status 2');
                            dropdownMenu.find('.dropitem').hide();
                            // Show the dropdown items for the "Cancelled" status
                            // dropdownMenu.find('.dropitem:contains("In")').show();
                            // dropdownMenu.find('.dropitem:contains("Out")').show();
                            // dropdownMenu.find('.dropitem:contains("Cancelled")').hide();
                            break;
                        case 3:
                            console.log('status 3');
                            dropdownMenu.find('.dropitem:contains("In")').show();
                            dropdownMenu.find('.dropitem:contains("Out")').hide();
                            dropdownMenu.find('.dropitem:contains("Cancelled")').hide();

                            break;
                        default:
                            console.log('status none');
                            dropdownMenu.find('.dropitem').hide();

                    }

                    console.log(response.message);
                }
                , error: function(xhr) {

                    console.error(xhr.responseText);
                }
            });
        }

        $('.dropitem').on('click', function(e) {
            e.preventDefault();
            let status = $(this).text();
            let tokenId = $(this).closest('.dropdown').find('button').attr('id').replace('dropdownMenuButton', '');

            $(this).closest('.dropdown').find('.dropdown-item').removeClass('active');
            $(this).addClass('active');

            // Call the function to change the status
            changeStatus(tokenId, status);
        });
    });

    jQuery(document).ready(function() {
        jQuery(".first_div").tab("show");
    });
    $(document).ready(function() {
        $('#payment').on('show.bs.modal', function(event) {
            // alert('hi');
            var button = $(event.relatedTarget);
            var clinicId = button.data('id');
            var amount = button.data('amount');
            $('.modal-title', this).text('Payment Details for Booking ID: ' + clinicId);
            $('#amountpay', this).val(amount);
            $('#bookingid', this).val(clinicId);

        });
        $('#paymentMethod').on('change', function() {
            var selectedMethod = $(this).val();
            if (selectedMethod === 'paytm') {
                $('#transactionIdContainer').show();
            } else {
                $('#transactionIdContainer').hide();
            }
        });


    });
    $('#submitPayment').on('click', function() {
        //alert('hi');
        var formData = $('#paymentForm').serialize();
        $.ajax({
            url: '/payment-submit'
            , method: 'POST'
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , data: formData
            , success: function(response) {
                console.log('Form submitted successfully:', response);
                $('.paymentdone').show();
                var button = $("#dropdownMenuButton" + response.bookingid);
                switch (response.slot) {
                    case 0:
                        console.log('status 0');
                        button.siblings('.dropdown-menu').find('.dropitem:contains("In")').show();
                        button.siblings('.dropdown-menu').find('.dropitem:contains("Out")').show();
                        button.siblings('.dropdown-menu').find('.dropitem:contains("Cancelled")').show();
                        $('.modal-button[data-id="' + response.bookingid + '"]').hide();
                        break;
                    case 1:
                        console.log('status 1');
                        break;
                    case 2:
                        console.log('status 2');
                        break;
                    case 3:

                        break;
                    default:
                        console.log('status none');

                }
                setTimeout(function() {
                    $('.paymentdone').hide();

                }, 2000);
            }
            , error: function(error) {
                console.error('Form submission failed:', error);
            }
        });
    });


    $(document).ready(function() {
        $('#status_dropdown').change(function() {

            var statusId = $(this).val();

            $.ajax({
                url: '/doctor-status', // URL to update doctor status
                type: 'POST'
                , data: {
                    status_id: statusId
                    , _token: '{{ csrf_token() }}'
                }
                , success: function(response) {
                    alert('Doctor Status Updated!');
                    console.log(response);
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const tokens = document.querySelectorAll('.draggable-token');

        tokens.forEach(token => {
            token.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', e.target.dataset.tokenid);
            });
        });

        const container = document.getElementById('token-container');

        container.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        container.addEventListener('drop', (e) => {
            e.preventDefault();
            const draggedTokenId = e.dataTransfer.getData('text/plain');
            const draggedToken = document.querySelector(`[data-tokenid="${draggedTokenId}"]`);
            const dropTarget = e.target.closest('.draggable-token');

            if (dropTarget && draggedToken !== dropTarget) {
                const draggedSerial = draggedToken.dataset.serial;
                const dropTargetSerial = dropTarget.dataset.serial;

                // Swap positions
                const temp = dropTarget.nextSibling;
                container.insertBefore(draggedToken, dropTarget);
                container.insertBefore(dropTarget, temp);

                // Update serial numbers for all tokens
                const updatedTokens = Array.from(container.querySelectorAll('.draggable-token'));
                updatedTokens.forEach((token, index) => {
                    token.dataset.serial = index + 1;
                });

                // Send the updated serial numbers to the server
                const updatedOrder = updatedTokens.map(token => ({
                    tokenid: token.dataset.tokenid
                    , serial: token.dataset.serial
                }));

                fetch('/update-serial-numbers', {
                    method: 'POST'
                    , headers: {
                        'Content-Type': 'application/json'
                        , 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                    , body: JSON.stringify(updatedOrder)
                });
            }
        });
    });

</script>
<script>
    function openInNewWindow(link) {
        window.open(link, '_blank');
    }
</script>


@endpush
