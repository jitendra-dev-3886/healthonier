@extends('layouts.admin')



@section('content')





<div class="pagetitle">

    <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Appointment List</li>

        </ol>

    </nav>

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
                                <th>PATIENT</th>
                                <th>APPOINTMENT AT</th>
                                <th>SPAYMENT METHOD </th>
                                <th>AMOUNT</th>
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

        var usersTable = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-transaction'

            , columns: [{

                    data: 'serial'

                    , name: 'serial'

                }

                , {
                    data: 'patient'
                    , name: 'patient'
                }
                , {

                    data: 'timeslots'

                    , name: 'timeslots'

                }
                , {

                    data: 'payment_method'

                    , name: 'payment_method'



                }
                , {
                    data: 'amount'
                    , name: 'amount'
                }

                , {

                    data: 'actions'

                    , name: 'actions'

                    , orderable: false

                    , searchable: false

                }

            , ]

        });



    });

</script>


@endpush
