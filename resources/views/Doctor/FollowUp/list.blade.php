@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="pagetitle">
            <h3>Follow Up</h3>
        </div>
    </div>
    <div class="col-md-3">
        <a class="btn btn-theme" href="{{ route('add.followup') }}">Add Follow up</a>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
            <div id="save-data" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div id="follow-up-sucess" style="display:none" class="alert alert-primary" role="alert">
                Follow Up Deleted !
            </div>
            <div style="display:none" class="alert  alert-warning" role="alert">
                Follow Up status change !
            </div>
            <div class="card">
                <h5 class="table_title"></h5>

                    <table id="users-table" class="p-3 pt-0">
                        <thead>
                            <tr>
                                <th>Min Days</th>
                                <th>Max Days</th>
                                <th>Discount Type</th>
                                <th>Discount</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
            
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this "Fllow Up Type"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
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
        var usersTable = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-follow-up'

            , columns: [{
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
                , {

                    data: 'actions'

                    , name: 'actions'

                    , orderable: false

                    , searchable: false

                }

            , ]

        });
        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');

            $('#confirmationModal').modal('show');
            $('#confirmDelete').data('id', id);
        });

        $(document).on('click', '#confirmDelete', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '/delete-follow-up/' + id
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'DELETE'
                , success: function(response) {
                    $('.alert-primary').show();
                    // location.reload();
                    usersTable.ajax.reload();
                }
                , error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            $('#confirmationModal').modal('hide');
        });

        $(document).on('click', '.modal-footer .btn-secondary', function() {

            $('#confirmationModal').modal('hide');
        });
        $(document).ready(function() {

            $(document).on('change', 'input[type="checkbox"][id^="statusSwitch_"]', function() {
                var FollowUpId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;
                $.ajax({

                    url: '/update-status-follow-up'

                    , method: 'POST'

                    , headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }



                    , data: {

                        FollowUpId: FollowUpId

                        , status: status

                    }

                    , success: function(response) {
                            $('.alert-warning').show();

                            usersTable.ajax.reload();
                        }

                    , error: function(xhr) {



                    }

                });

            });

        });


    });

</script>

@endpush
