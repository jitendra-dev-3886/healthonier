@extends('layouts.admin')



@section('content')





<div class="pagetitle">

    <h3>Appointment List</h3>

</div><!-- End Page Title -->



<section class="section">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="">

                    <h5 class="table_title"></h5>

                    <!-- Table with stripped rows -->

                    <table id="users-table" class="p-3">

                        <thead>

                            <tr>
                                <th>S.NO</th>

                                <th>Clinic</th>
                                <th>Patient</th>
                                <th>Appointment At</th>
                                <th>Fee</th>
                                <th>Token</th>
                                <th>Payment</th>
                                <th>Status</th>

                            </tr>

                        </thead>

                    </table>



                    <!-- End Table with stripped rows -->



                </div>

            </div>



        </div>

    </div>

</section>

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
                <button type="button" class="btn btn-primary submitPayment" id="submitPayment">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection



@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(function () {

        var usersTable = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-appointment'

            , columns: [{

                data: 'serial'

                , name: 'serial'

            }, {

                data: 'clinicname'

                , name: 'clinicname'

            }

                , {
                data: 'patient'
                , name: 'patient'
            }
                , {

                data: 'timeslots'

                , name: 'timeslots'

            },
            {
                data: 'amount',
                name: 'amount'
            }


                , {

                data: 'token'

                , name: 'token'



            }

                , {

                data: 'payment'

                , name: 'payment'

                , orderable: false

                , searchable: false

            }

                , {

                data: 'status'

                , name: 'status'

                , orderable: false

                , searchable: false

            }

                ,]

        });

        $('#submitPayment').on('click', function () {
            //alert('hi');
            var formData = $('#paymentForm').serialize();
            $.ajax({
                url: '/payment-submit'
                , method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: formData
                , success: function (response) {
                    console.log('Form submitted successfully:', response);
                    $('.paymentdone').show();


                    usersTable.ajax.reload();
                    setTimeout(function() {
                    $('.paymentdone').hide(); // Hide the payment success message
                    setTimeout(function() {
                        location.reload(); // Reload the page after 3 seconds
                    }, 1000); // Reload after 3 seconds
                }, 2000); // Hide after 2 seconds
                }
                , error: function (error) {
                    console.error('Form submission failed:', error);
                }
            });
        });

    });

    $(document).ready(function () {
        $('#payment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var clinicId = button.data('id');
            var amount = button.data('amount');
            $('.modal-title', this).text('Payment Details for Booking ID: ' + clinicId);
            $('#amountpay', this).val(amount);
            $('#bookingid', this).val(clinicId);

        });
        $('#paymentMethod').on('change', function () {
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