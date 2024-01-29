@extends('layouts.admin')
@section('content')

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
                                <th>S No</th>
                                <th>Clinic</th>
                                <th>Date</th>
                                <th>Token</th>
                                <th>Time</th>
                                <th>Invoice</th>
                                <th>Prescription</th>
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

            , ajax: '/patient/show-meeting'

            , columns: [{
                    data: 'serial'
                    , name: 'serial'
                }
                , {
                    data: 'clinicName'
                    , name: 'clinicName'
                }
                , {
                    data: 'bookingDate'
                    , name: 'bookingDate'
                }, {
                    data: 'token'

                    , name: 'token'

                }, {
                    data: 'timeslots'

                    , name: 'timeslots'

                }
                , {
                    data: 'invoice'

                    , name: 'invoice'

                }, {
                    data: 'prescription'

                    , name: 'prescription'

                }, {
                    data: 'status'

                    , name: 'status'

                }

            , ]

        });

    });

</script>

@endpush
