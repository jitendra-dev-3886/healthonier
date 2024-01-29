@extends('layouts.admin')
@section('content')
<style>
    a.view-prescription-link {
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        padding: 3px 2px;
        border-radius: 5px;
        display: inline-block;
        transition: background-color 0.3s;
    }

    a.view-prescription-link:hover {
        background-color: #0056b3;
    }

    #search-results {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #search-results li {
        margin: 10px 0;
        padding: 10px;
        background-color: #f8f8f8;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    #search-results li a {
        text-decoration: none;
        color: #333;
    }

    #search-results li a:hover {
        color: #555;
    }

</style>

<div class="row">
    <div class="col-md-4">
        <div class="pagetitle">
            <h3>Bookings</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-outline">
            <input type="search" id="search" class="form-control" placeholder="Search Patient name" aria-label="Search" />
        </div>

        <ul id="search-results"></ul>


    </div>
    <div class="col-md-4">
        <a class="btn btn-theme" href="{{ route('doctor.add.patient') }}">Add Patient</a>
    </div>
</div>
<br>
<div id="statusChange" class="alert alert-primary" role="alert" style="display:none">
    Fee Status Chnaged !
</div>
<div id="statusDeleted" class="alert alert-primary" role="alert" style="display:none">
    Fee Deleted !
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <h5 class="table_title"></h5>
              
                    <table id="users-table" class="w100 p-3 pt-0">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Clinic Name</th>
                                <th>Patient Name</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Token</th>
                                <th>Meeting Link</th>
                                <th>Time</th>
                                <th>Group</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Fee collection</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
            
            </div>
        </div>
    </div>

</section>

{{-- <div class="modal" id="payment">
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
                <button type="button" class="btn btn-primary submitPayment" id="submitPayment">Submit</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function() {
        var data = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-doctor-confirm-booking'

            , columns: [{
                    data: 'serial'
                    , name: 'serial'
                }, {
                    data: 'clinicName'

                    , name: 'clinicName'

                }, {
                    data: 'patientName'

                    , name: 'patientName'

                }
                , {
                    data: 'patientMobile'

                    , name: 'patientMobile'

                }
                , {
                    data: 'bookingDate'

                    , name: 'bookingDate'

                }
                , {
                    data: 'token'

                    , name: 'token'

                }
                , {
                    data: 'link'

                    , name: 'link'

                }
                , {
                    data: 'timeslots'

                    , name: 'timeslots'

                }
                , {
                    data: 'group'

                    , name: 'group'

                }
                , {
                    data: 'amount'

                    , name: 'amount'

                }
                , {

                    data: 'payment'

                    , name: 'payment'


                }
                , {

                    data: 'fee'

                    , name: 'fee'


                }
                , {

                    data: 'status'

                    , name: 'status'

                }

            , ]

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


                    data.ajax.reload();
                    setTimeout(function() {
                        $('.paymentdone').hide(); // Hide the payment success message
                        setTimeout(function() {
                            location.reload(); // Reload the page after 3 seconds
                        }, 1000); // Reload after 3 seconds
                    }, 2000); // Hide after 2 seconds
                }
                , error: function(error) {
                    console.error('Form submission failed:', error);
                }
            });
        });




    });

</script>

<script>
    $('#search').on('keyup', function() {
        // alert('dfghjkl')
        let query = $(this).val();
        if (query.length >= 3) {
            $.ajax({
                url: '{{ route("doctor.search.clinic.booking") }}'
                , method: 'GET'
                , data: {
                    query: query
                }
                , success: function(data) {
                    data.forEach(element => {
                        $("#search-results").empty()

                        var route = '{{ route("doctor.dashboard.patient", ":id") }}';
                        route = route.replace(':id', element.id);
                        $('#search-results').append('<li><a href="' + route + '">' + element.name + ' </a></li>');
                    });
                }
            });
        }
    });
    $(document).ready(function() {
        $('#payment').on('show.bs.modal', function(event) {

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

</script>

@endpush
