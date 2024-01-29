@extends('layouts.admin')
@section('content')
<style>
    .col-md-6 {
        /* Add any styles you want for the outer div here */
    }

    #followupBookingDetails {
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    label {
        font-weight: bold;
        font-size: 16px;
    }

</style>
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div class="content d-flex flex-column flex-column-fluid fade-in-image" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="row gy-5 g-xl-10">
                <div class="card card-body col-md-12">
                    <div class="card-header p-4">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0"> Fee Collection</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <form id="feeCollectionForm" action="" method="POST">
                        <input type="hidden" class="form-control" id="patient" name="patient" value="{{$booking->patient_id}}">
                        <input type="hidden" id="bookingdate" name="bookingdate" value="{{$booking->booking_date}}">
                        <div class="mb-5 mb-xl-10">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="sub-heading">Patient Details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">User Id :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->user->id}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Patient :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->user->id}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Address :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->address}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Phone No. :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->number}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Email :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->user->email}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Date of Birth :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->patient->age}}</div>
                                                </div>
                                                <input type="hidden" id="reCollectionId" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="sub-heading">Clinic Details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">Clinic Name :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->clinic->name}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Appointment Date :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->booking_date}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Appointment Time :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->time}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">Phone No. :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->clinic->contact_number}}</div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-md-6">Email :</div>
                                                    <div class="col-md-6 font-weight-bold">{{$booking->contact_number}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Date of Birth :</div>
                                            <div class="col-md-6 font-weight-bold">07-Jun-2023</div>
                                        </div> --}}
                                        <input type="hidden" id="reCollectionId" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-search-box">
                            <h3 class="sub-heading">Fee Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bookingType">Booking Type:</label>
                                        <select class="form-control" id="bookingType" name="bookingType">
                                            <option value="0">New Booking</option>
                                            <option value="1">Follow-up</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="followupBookingDetails" style="display:none;">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12" id="dvFeeDetailss">
                                <h3 class="sub-heading">Fee Head Details</h3>
                                <table class="tableAmount">
                                    <thead>
                                        <tr>
                                            <th>Fee Title</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fees as $fee)
                                        <tr>



                                            <td>{{ $fee->fee->tittle }}</td>
                                            <td>@if($fee->percentage == 1 )
                                                {{ $fee->fee->amount - ($fee->fee->amount * $fee->amount / 100) }}
                                                @else
                                                {{ $fee->fee->amount -  $fee->amount }}
                                                @endif
                                            </td>
                                            <input type="hidden" name="amount[]" value="{{ $fee->fee->amount }}">

                                            <input type="hidden" name="fee_ids[]" value="{{ $fee->fee->id }}">
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="table-responsive mt-2 dvFeeDetails">
                                    <h3 class="sub-heading">Discount</h3>
                                    <table class="table">
                                        <tbody>
                                            <tr class="">
                                                <td>
                                                    <label>Discount</label>
                                                <td>(%)</td>
                                                {{-- <td> <input type="checkbox" name=""></td> --}}
                                                <td>(Amt) </td>
                                                <td>
                                                    <input type="text" class="form-control numberonly" id="discountInput">
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <label for="extraFee">Extra Fee Amount</label>
                                                </td>
                                                {{-- <td> <input type="checkbox" name=""></td> --}}
                                                <td>(Amt) </td>
                                                <td>
                                                    <input type="text" class="form-control numberonly" id="extraFee" name="extraFee" value="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control numberonly" id="extraFeeNote" name="extraFeeNote" placeholder="Note for extra fee add">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th class="">Total Amount</th>
                                                <th class="">Disocunt AMount</th>
                                                <th class="">After Discount</th>
                                                <th class="">Net Payable</th>
                                                <th class="">Balanced Amount</th>
                                                <th class="">Actual Amount Received <span class="text-danger">*</span></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td class=""> <input type="text" id="totalamountInput" name="totalamount" disabled="" class="form-control" value="{{$booking->payment->total_amount}}"></td>
                                                <td class=""> <input type="text" id="discountAmount" name="discountamount" disabled="" class="form-control" value="{{$booking->payment->discount}}"></td>
                                                <td class=""> <input type="text" id="discountAmggount" name="afterdiscount" disabled="" class="form-control" value="{{$booking->payment->after_discount}}"></td>
                                                <td class=""> <input type="text" id="netamount" name="netamount" disabled="" class="form-control" value="{{$booking->payment->balance}}"></td>
                                                <td class=""> <input type="text" id="balanceAmount" name="balanceamount" disabled="" class="form-control" value="{{$booking->payment->balance}}"></td>

                                                <td class=" bg-b-blue">

                                                    <input type="text" id="receivedAmountInput" name="feeRecieved" class="form-control numberonly" value="0.00">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Fee Deposited</label>
                                    <div class="form-group">
                                        <select class="form-control" id="recievedBy" name="recievedBy">
                                            <option value="Doctor Panle">Doctor Panel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="bookingType">Payment Method:</label>
                                    <select class="form-control" id="paymentMethod" name="paymentmethod">
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Clinic Bank Name</label>

                                    <select class="form-control" name="bankinfo" id="bankName">
                                        <option value="">select bank</option>
                                        <option value="AIR PAY Payment Gateway">AIR PAY Payment Gateway</option>
                                        <option value="HDFC Bank">HDFC Bank</option>
                                        <option value="ICICI Bank">ICICI Bank</option>
                                        <option value="SBI Bank">SBI Bank</option>

                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-sm-4 col-md-3 col-lg-3" style="display:none;">
                                <div class="form-group">
                                    <label>Bank Name/PO</label>
                                    <input type="text" class="form-control" name="" id="POBank">
                                </div>
                            </div> --}}
                            <div class="col-sm-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Cheque/DD No.</label>
                                    <input type="text" class="form-control" name="cheque_no" id="ChequeNo">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="paymentDate" id="paymentDate" type="date" class="form-control" value="27-Oct-2023">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Problem</label>
                                    <input type="text" class="form-control" name="problem" id="problem">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Remark</label>
                                    <input type="text" class="form-control" name="remark" id="remark">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" id="" value="Save" class="btn btn-primary">
                                {{-- <input type="button" value="Print Receipt" class="btn btn-success"> --}}

                            </div>
                            <div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#bookingType').change(loadFollowupDetails);

    });

    function loadFollowupDetails() {

        var bookingType = $('#bookingType').val();
        var patient = $('#patient').val();
        var followupDetails = $('#followupBookingDetails');
        var totalAmount = parseFloat(document.getElementById('totalamountInput').value);

        if (bookingType == 1) {


            $.ajax({
                url: '/get_followup_data'
                , method: 'GET'
                , dataType: 'json'
                , data: {
                    patient: patient
                    , totalAmount: totalAmount

                }
                , success: function(response) {
                    var serviceAmount = parseFloat(document.getElementById('totalamountInput').value);
                    var discount = parseFloat(serviceAmount - response.discount);
                    var netAmount = serviceAmount - discount;


                    if (discount != 0) {
                        document.getElementById('discountAmount').value = discount;
                        document.getElementById('discountAmggount').value = netAmount.toFixed(2);
                        document.getElementById('netamount').value = netAmount.toFixed(2);
                        document.getElementById('discountInput').disabled = true;

                    }




                }
                , error: function() {
                    followupDetails.html('<p>Error fetching follow-up data.</p>');
                }
            });
        } else {
            const amountCells = document.querySelectorAll('.tableAmount tbody td:nth-child(2)');
            let totalAmount = 0;
            amountCells.forEach(function(cell) {
                totalAmount += parseFloat(cell.textContent);
            });
            const totalAmountInput = document.getElementById('totalamountInput');
            const netAmountInput = document.getElementById('netamount');
            totalAmountInput.value = totalAmount.toFixed(2);
            netAmountInput.value = totalAmount.toFixed(2);
            discountInput.disabled = false;
            discountInput.value = '';
            document.getElementById('discountAmount').value = 0; // Clear the discount amount field
            document.getElementById('discountAmggount').value = 0;
            document.getElementById('netamount').value = totalAmount.toFixed(2);
        }

    }

    document.getElementById('totalamountInput').addEventListener('input', updateAmounts);
    document.getElementById('discountInput').addEventListener('input', updateAmounts);
    document.getElementById('receivedAmountInput').addEventListener('input', updateBalance);


    // document.addEventListener('DOMContentLoaded', function() {
    //     const amountCells = document.querySelectorAll('.tableAmount tbody td:nth-child(2)');
    //     let totalAmount = 0;
    //     amountCells.forEach(function(cell) {
    //         totalAmount += parseFloat(cell.textContent);
    //     });
    //     const totalAmountInput = document.getElementById('totalamountInput');
    //     const netAmountInput = document.getElementById('netamount');
    //     totalAmountInput.value = totalAmount.toFixed(2);
    //     netAmountInput.value = totalAmount.toFixed(2);
    // });

    function updateAmounts() {
        var serviceAmount = parseFloat(document.getElementById('totalamountInput').value);

        var discount = parseFloat(document.getElementById('discountInput').value);

        var discountAmount = (discount / 100) * serviceAmount;
        var netAmount = serviceAmount - discountAmount;

        document.getElementById('discountAmount').value = discountAmount.toFixed(2);
        document.getElementById('discountAmggount').value = netAmount.toFixed(2);
        document.getElementById('netamount').value = netAmount.toFixed(2);

        updateBalance();
    }

    function updateBalance() {
        var netAmount = parseFloat(document.getElementById('netamount').value);
        var extraFee = parseFloat(document.getElementById('extraFee').value)
        var receivedAmount = parseFloat(document.getElementById('receivedAmountInput').value);

        var balanceAmount = netAmount - receivedAmount + extraFee;

        document.getElementById('balanceAmount').value = balanceAmount.toFixed(2);
    }
    document.getElementById('extraFee').addEventListener('input', updateBalance);
    $(document).ready(function() {
        $('#feeCollectionForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var bookingDate = $('#bookingdate').val(); // Use jQuery to get values
            var problem = $('#problem').val();
            var remark = $('#remark').val();
            var paymentDate = $('#paymentDate').val();
            var bankName = $('#bankName').val();
            var ChequeNo = $('#ChequeNo').val();
            var paymentMethod = $('#paymentMethod').val();
            var recievedBy = $('#recievedBy').val();
            var bookingType = $('#bookingType').val();

            var totalAmount = parseFloat($('#totalamountInput').val());
            var discountAmount = parseFloat($('#discountAmount').val());
            var discountAmggount = parseFloat($('#discountAmggount').val());
            var netAmount = parseFloat($('#netamount').val());
            var balanceAmount = parseFloat($('#balanceAmount').val());
            var receivedAmountInput = parseFloat($('#receivedAmountInput').val());
            var extraFee = parseFloat($('#extraFee').val());
            var extraFeeNote = parseFloat($('#extraFeeNote').val());

            var feeIds = []; // Initialize an array to store fee IDs
            $('input[name="fee_ids[]"]').each(function() {
                feeIds.push($(this).val()); // Add each fee ID to the array
            });
            var amounts = []; // Initialize an array to store fee IDs
            $('input[name="amount[]"]').each(function() {
                amounts.push($(this).val()); // Add each fee ID to the array
            });

            $.ajax({
                url: "{{ route('doctor.confirm.booking', $booking->id) }}"
                , type: "POST"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    problem: problem
                    , remark: remark
                    , paymentDate: paymentDate
                    , paymentMethod: paymentMethod
                    , ChequeNo: ChequeNo
                    , bankName: bankName
                    , recievedBy: recievedBy
                    , totalAmount: totalAmount
                    , discountAmount: discountAmount
                    , discountAmggount: discountAmggount
                    , netAmount: netAmount
                    , balanceAmount: balanceAmount
                    , receivedAmountInput: receivedAmountInput
                    , bookingType: bookingType
                    , feeIds: feeIds
                    , extraFee: extraFee
                    , extraFeeNote: extraFeeNote
                    , amounts: amounts
                }
                , dataType: "json"
                , success: function(response) {
                    window.location.href = "{{ route('confirm.booking.invoice.print', $booking->id) }}";
                }
                , error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });

</script>
@endpush
