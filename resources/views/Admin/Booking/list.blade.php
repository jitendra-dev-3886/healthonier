@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Doctor Fee</h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="table_title"></h5>
                <div class="table-responsive">
                    <table id="users-table" class="p-3 pt-0">
                        <thead>
                            <tr>
                                <th>Doctor</th>
                                <th>Clinic Name</th>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Token</th>
                                <th>Meeting Link</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Fee collection</th>
                                <th>Prescription</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script>
    $(function() {
        $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/admin-doctor-booking-Show'

            , columns: [{

                    data: 'doctor'

                    , name: 'doctor'

                }
                , {
                    data: 'clinicName'

                    , name: 'clinicName'

                }, {
                    data: 'patientName'

                    , name: 'patientName'

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

                }, {
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

                    data: 'prescription'

                    , name: 'prescription'


                }
                , {

                    data: 'status'

                    , name: 'status'

                }


            ]

        });

    });

</script>

@endpush
