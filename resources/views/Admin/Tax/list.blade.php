@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Doctor Tax </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="table_title"></h5>
                {{-- <div class="table-responsive"> --}}
                    <table id="users-table" class="w100 p-3 pt-0">
                        <thead>
                            <tr>
                                <th>Doctor</th>
                                <th>Tax Name</th>
                                <th>Percentage %</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                {{-- </div> --}}
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

            , ajax: '/admin-doctor-tax-Show'

            , columns: [{

                    data: 'doctor'

                    , name: 'doctor'

                }
                , {

                    data: 'tax_name'

                    , name: 'tax_name'

                }
                , {

                    data: 'amount'

                    , name: 'amount'

                }
                , {

                    data: 'tax_description'

                    , name: 'tax_description'

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
