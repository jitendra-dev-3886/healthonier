@extends('layouts.admin')
@section('content')

<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

    <!--end::Header-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid fade-in-image" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="card card-body col-md-12">
                    <div class="card-header p-4">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0"> Fee Collection</h3>
                        </div>
                        <!--end::Card title-->
                    </div>

                    <div class="mb-5 mb-xl-10">
                        <div class="card-body">
                            <div class="card-search-box">




                            </div>
                            <div class="clearfix"></div>
                            <div class="row">


                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12" id="dvFeeDetailss">
                                    <h3 class="sub-heading">Fee Head Details</h3>
                                    <div id="dvFeeDetails">
                                        <table class="tableAmount">
                                            <thead>
                                                <tr>
                                                    <td>Fee Head</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Fee Head</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <h3 class="sub-heading">Payment Details</h3>
                                    <div class="table-responsive dvFeeDetails">
                                        <table class="table">
                                            <tbody>
                                                <tr class="m-0">
                                                    <td class=""><input type="checkbox" id="isLateFee" name="feeCollection.IsLateFee"> Late Fee</td>
                                                    <td class="">
                                                        <input type="text" class="form-control numberonly" name="feeCollection.LateFee" placeholder="Late Fee" id="LateFee" disabled="" value="0.00">
                                                    </td>
                                                    <td class="">Absent Fine</td>
                                                    <td class=""> <input type="text" id="AbsendFee" name="feeCollection.AbsentFine" class="form-control numberonly" value="0.00"></td>
                                                    <td class=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive mt-2 dvFeeDetails">
                                        <table class="table">
                                            <tbody>
                                                <tr class="">
                                                    <td>
                                                        <input type="checkbox" id="">
                                                        Concession</td>
                                                    <td>(%)</td>
                                                    <td> <input type="checkbox" id="" name=""></td>
                                                    <td>(Amt) </td>
                                                    <td>
                                                        <input type="text" class="form-control numberonly">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th class="">Receipt Amt</th>
                                                    <th class="">Extra Amt Receive</th>
                                                    <th class="">Short Amt. Received</th>
                                                    <th class="">Net Payable</th>
                                                    <th class="">Balanced Amount</th>
                                                    <th class="">Actual Amount Received <span class="text-danger">*</span></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td class=""> <input type="text" id="ReceiptAmt" name="feeCollection.ReceiptAmt" disabled="" class="form-control" value="781"></td>
                                                    <td class=""> <input type="text" id="ExtraAmt" name="feeCollection.ExtraAmt" disabled="" class="form-control" value="781"></td>
                                                    <td class=""> <input type="text" id="AdjustAmt" name="feeCollection.AdjustAmt" disabled="" class="form-control" value="781"></td>
                                                    <td class=""> <input type="text" id="NetAmount" name="feeCollection.NetAmount" disabled="" class="form-control" value="781"></td>
                                                    <td class=""> <input type="text" id="Balanced" name="feeCollection.NetAmount" disabled="" class="form-control" value="781"></td>
                                                    <td class=" bg-b-blue">

                                                        <input type="text" id="DepositeAmt" name="feeCollection.DepositeAmt" class="form-control numberonly" value="0.00">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Fee Deposited</label>
                                        <div class="d-flex radio-box">
                                            <div class="radio-item me-2">
                                                <input type="radio" id="SchoolCounter" checked="" name="" value="School"> School Counter
                                            </div>
                                            <div class="radio-item">
                                                <input type="radio" id="BankCounter" name="" value="Bank"> Bank
                                                Counter
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Mode</label>
                                        <div class="d-flex radio-box">
                                            <div class="radio-item me-2">
                                                <input type="radio" name="feeCollection.PaymentMode" id="Cash" value="Cash" checked=""> Cash
                                            </div>
                                            <div class="radio-item me-2">
                                                <input type="radio" name="feeCollection.PaymentMode" id="Cheque" value="Cheque"> Cheque
                                            </div>
                                            <div class="radio-item me-2">
                                                <input type="radio" name="feeCollection.PaymentMode" id="UPI" value="UPI"> UPI
                                            </div>
                                            <div class="radio-item me-2">
                                                <input type="radio" name="feeCollection.PaymentMode" id="Others" value="Others"> Others
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>School Bank Name</label>

                                        <select class="form-control" name="feeCollection.SchoolBank" id="SchoolBank">
                                            <option value="138">AIR PAY Payment Gateway</option>
                                            <option value="65">HDFC Bank</option>
                                            <option value="3">ICICI Bank</option>
                                            <option value="64">SBI Bank</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3" style="display:none;">
                                    <div class="form-group">
                                        <label>Bank Name/PO</label>
                                        <input type="text" class="form-control" name="" id="POBank">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Cheque/DD No.</label>
                                        <input type="text" class="form-control" name="" id="ChequeNo">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" value="27-Oct-2023">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Other Details</label>
                                        <input type="text" class="form-control" name="feeCollection.OtherRemark" id="OtherRemark">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Remark</label>
                                        <input type="text" class="form-control" name="feeCollection.FeeRemark" id="FeeRemark">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="button" id="" value="Save" class="btn btn-primary">
                                    <input type="button" value="Print Receipt" class="btn btn-success">

                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Patient Panel</h2>
            <label for="serviceAmount">Service Amount (Rs):</label>
            <input type="number" id="serviceAmount" class="form-control">
        </div>
        <div class="col-md-6">
            <h2>Doctor Panel</h2>
            <div class="form-group">
                <label for="discountInput">Discount (Rs):</label>
                <input type="number" class="form-control" id="discountInput" min="0">
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h3>Payment Details</h3>
            <p>Selected Service Amount: Rs<span id="selectedAmount">0</span></p>
            <p>Discount Applied: Rs<span id="discountAmount">0</span></p>
            <p>Total Amount: Rs<span id="totalAmount">0</span></p>
        </div>
        <div class="col-md-6">
            <h3>Payment Status</h3>
            <div class="form-group">
                <label for="receivedAmountInput">Received Amount (Rs):</label>
                <input type="number" class="form-control" id="receivedAmountInput" min="0">
            </div>
            <p>Balance Amount: Rs<span id="balanceAmount">0</span></p>
        </div>
    </div>
</div>

<script>
    document.getElementById('serviceAmount').addEventListener('input', updateAmounts);
    document.getElementById('discountInput').addEventListener('input', updateAmounts);
    document.getElementById('receivedAmountInput').addEventListener('input', updateBalance);

    function updateAmounts() {
        var serviceAmount = parseFloat(document.getElementById('serviceAmount').value);
        var discount = parseFloat(document.getElementById('discountInput').value);

        var discountAmount = discount;
        var totalAmount = serviceAmount - discountAmount;

        document.getElementById('selectedAmount').textContent = serviceAmount.toFixed(2);
        document.getElementById('discountAmount').textContent = discountAmount.toFixed(2);
        document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);

        updateBalance();
    }

    function updateBalance() {
        var totalAmount = parseFloat(document.getElementById('totalAmount').textContent);
        var receivedAmount = parseFloat(document.getElementById('receivedAmountInput').value);

        var balanceAmount = totalAmount - receivedAmount;

        document.getElementById('balanceAmount').textContent = balanceAmount.toFixed(2);
    }

</script>
<style>
    .invoice {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .details,
    .fee-section,
    .payment-method {
        margin-bottom: 20px;
    }

    label,
    input,
    button,
    select {
        margin: 5px 0;
    }

    button {
        padding: 5px 10px;
    }

    .total-amount {
        font-weight: bold;
    }

</style>

<div class="invoice">
    <h2>Booking Invoice</h2>
    <div class="details">
        <p><strong>Patient Name:</strong> {{$userId->name}}</p>
        <p><strong>Booking Date:</strong> {{$booking->booking_date}}</p>
        <p><strong>Booking Time:</strong> {{$label }}</p>
    </div>

    <form action="{{route('doctor.confirm.booking' ,$booking->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" class="form-control" id="patient" name="patient" value="{{$booking->patient_id}}">
        <input type="hidden" class="form-control" id="amounttotal" name="totalamount" value="">
        <input type="hidden" class="form-control" id="date" name="date" value=" {{$booking->booking_date}}">
        <input type="hidden" class="form-control" id="discounttype" name="discounttype" value="">
        <div class="form-group">
            <label for="bookingType">Booking Type:</label>
            <select class="form-control" id="bookingType" name="bookingType">
                <option value="new">New Booking</option>
                <option value="followup">Follow-up</option>
            </select>
        </div>

        <!-- Placeholder for booking details and fees -->
        <div id="followupBookingDetails" style="display:none;">
            <!-- Content will be loaded here -->
        </div>

        <div class="fee-section">
            <label>Apply Fees:</label><br>
            @foreach($fees as $fee)
            <input type="checkbox" name="fee" value="{{ $fee->fee->amount - ($fee->fee->amount * $fee->amount / 100) }}">{{$fee->fee->tittle}} {{$fee->fee->amount}} Rs - Discount Amount: {{$fee->amount}} % =
            {{ $fee->fee->amount - ($fee->fee->amount * $fee->amount / 100) }} Rs <br>

            @endforeach
            {{-- <button onclick="calculateFees()">Calculate Fees</button> --}}
            <div class="total-amount" id="totalAmount"></div>
        </div>
        <div class="form-group">
            <label for="problem">Problem</label>
            <input name="problem" type="text" class="form-control" id="problem" required>
        </div>
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


        <div class="form-group" id="transactionIdContainer" style="display: none;">
            <label for="transactionId">Transaction ID:</label>
            <input type="text" class="form-control" id="transactionId" name="transactionId">
        </div>
        <button type="submit" class="btn btn-secondary">Confirm Booking</button>

    </form>

</div>
@endsection
@push('scripts')
<script>
    function loadFollowupDetails() {
        var bookingType = $('#bookingType').val();
        var patient = $('#patient').val();
        var followupDetails = $('#followupBookingDetails');

        if (bookingType === 'followup') {

            $.ajax({
                url: '/get_followup_data'
                , method: 'GET'
                , dataType: 'json'
                , data: {
                    patient: patient
                }
                , success: function(response) {
                    followupDetails.empty();



                    if (response.bookings) {
                        var content = ''; // Initialize content variable
                        for (var i = 0; i < response.bookings.length; i++) {
                            content += '<label>';
                            content += '<input type="radio" name="bookingfollow" value="' + response.bookings[i].id + '">';
                            content += response.bookings[i].problem;
                            content += '</label><br>';
                        }
                        followupDetails.html(content);
                        followupDetails.show();
                        $('input[name="bookingfollow"]').on('change', function() {
                            calculateFees();
                        });
                    } else {
                        followupDetails.html('<p>Error fetching follow-up data.</p>');
                    }
                }
                , error: function() {
                    followupDetails.html('<p>Error fetching follow-up data.</p>');
                }
            });
        } else {


            // $('#followupBookingDetails').hide();
            followupDetails.empty();
            followupDetails.hide();
            $('input[name="bookingfollow"]').off('change');
            calculateFees();
        }

    }

    $(document).ready(function() {
        $('input[name="fee"]').on('click', function() {
            calculateFees();
        });


        $('#bookingType').change(loadFollowupDetails);

    });


    function calculateFees() {

        var feeInputs = document.getElementsByName('fee');
        var totalAmountElement = document.getElementById('totalAmount');
        var totalAmountInput = document.getElementById('amounttotal');
        var totalAmount = 0;
        var bookingType = $('#bookingType').val();
        var discountTypeInput = $('#discounttype');

        if (bookingType === 'followup') {
            discountTypeInput.val('1');
        } else {
            discountTypeInput.val('0');
        }

        var atLeastOneFeeSelected = false; // Flag to track if at least one fee is selected

        for (var i = 0; i < feeInputs.length; i++) {
            if (feeInputs[i].checked) {
                totalAmount += parseFloat(feeInputs[i].value);
                atLeastOneFeeSelected = true; // Set flag to true if a fee is selected
            }
        }

        var selectedBookingId = null;
        var bookingRadioButtons = document.getElementsByName('bookingfollow');

        for (var i = 0; i < bookingRadioButtons.length; i++) {
            if (bookingRadioButtons[i].checked) {
                selectedBookingId = bookingRadioButtons[i].value;

                break;
            }
        }

        if (atLeastOneFeeSelected) {
            if (selectedBookingId !== null) {
                $.ajax({
                    url: '/get_followup_discount'
                    , method: 'GET'
                    , dataType: 'json'
                    , data: {
                        bookingId: selectedBookingId
                        , totalAmount: totalAmount
                    }
                    , success: function(response) {
                        totalAmountElement.textContent = 'Total Amount: Rs ' + response.discount;
                        totalAmountInput.value = response.discount;
                    }
                    , error: function() {
                        // Handle error
                    }
                });
            } else {
                // Handle case when no follow-up booking is selected
                totalAmountElement.textContent = 'Total Amount: Rs ' + totalAmount;
                totalAmountInput.value = totalAmount;
            }
        } else {
            // Hide total amount if no fee is selected
            totalAmountElement.textContent = '';
            totalAmountInput.value = '';
        }
    }


    $(document).ready(function() {

        $('#paymentMethod').on('change', function() {
            var selectedMethod = $(this).val();
            if (selectedMethod === 'paytm') {
                $('#transactionIdContainer').show();
            } else {
                $('#transactionIdContainer').hide();
            }
        });


    });

</script> <!-- You can create a JS file for scripting -->
@endpush
