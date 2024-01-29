@extends('layouts.admin')



@section('content')


<style>
    .read {
        background-color: white;
        padding: 10px;
        margin: 8px;
        border-radius: 30px;
    }

    .unread {
        background-color: #40e0d0 !important;
        padding: 10px;
        margin: 8px;
        border-radius: 30px;
    }

    a.mark-as-read {
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid #ccc;
        background-color: #e24f4f;
        text-decoration: none;
        color: #333;
        cursor: pointer;
        border-radius: 5px;
    }

</style>


<div class="pagetitle">
    <h4>Notification</h4>

    <!-- <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Clinic List</li>

        </ol>

    </nav> -->

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
                                <th>Subject</th>
                                <th>Notification</th>
                                <th>Action</th>

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

<script>
    $(function() {

        $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-notification'

            , columns: [{

                    data: 'serial'

                    , name: 'serial'

                }
                , {

                    data: 'type'

                    , name: 'type'

                }, {

                    data: 'message'

                    , name: 'message'

                }
                , {

                    data: 'action'

                    , name: 'action'

                }
            ]

        });

    });

</script>

@endpush
