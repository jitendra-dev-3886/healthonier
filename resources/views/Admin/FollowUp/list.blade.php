@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Doctor Follow Up</h3>
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
                                <th>Min Days</th>
                                <th>Max Days</th>
                                <th>Discount Type</th>
                                <th>Discount</th>
                                <th>status</th>
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

            , ajax: '/admin-doctor-follow-up-Show'

            , columns: [{

                    data: 'doctor'

                    , name: 'doctor'

                }
                , {
                    data: 'min_days'

                    , name: 'min_days'

                }
                , {
                    data: 'max_days'

                    , name: 'max_days'

                }
                , {
                    data: 'discount_type'

                    , name: 'discount_type'

                }
                , {
                    data: 'percentage_amount'

                    , name: 'percentage_amount'

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
