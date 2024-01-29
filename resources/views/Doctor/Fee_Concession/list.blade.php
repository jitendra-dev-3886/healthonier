@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="pagetitle">
            <h3>Fee Consessions</h3>
        </div>
    </div>
    <div class="col-md-3">
        <a class="btn btn-theme" href="{{ route('add.fee.concession') }}">Add Fee Concession</a>
    </div>
</div>
<br>
<div id="statusChange" class="alert alert-primary" role="alert" style="display:none">
    Fee Concession Status Chnaged !
</div>
<div id="statusDeleted" class="alert alert-primary" role="alert" style="display:none">
    Fee Concession Deleted !
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

                <table id="users-table" class="p-3 pt-0">
                    <thead>
                        <tr>
                            <th>Group Name</th>

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
                    <p>Are you sure you want to delete this "Fee"?</p>
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
        var data = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-fee-concession'

            , columns: [{
                    data: 'group_name'

                    , name: 'group_name'

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

            // Check if the tax is associated with any fees
            $.ajax({
                url: '/check-fee-concession-association/' + id
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'GET'
                , success: function(response) {
                    if (response.has_association) {
                        // The tax is associated with a fee, show a message
                        Swal.fire({
                            icon: 'error'
                            , title: 'Cannot Delete Fee Concession'
                            , text: 'This Fee Concession is associated with a Patient and cannot be deleted.'
                        });
                    } else {
                        // The tax is not associated with any fees, proceed with deletion
                        $.ajax({
                            url: '/delete-fee-concession/' + id
                            , headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            , type: 'DELETE'
                            , success: function(response) {
                                // var successMessage = $('#statusDeleted').show();
                                Swal.fire({
                                    icon: 'success'
                                    , title: 'Fee Concession Deleted'
                                    , text: 'The Fee Concession Deleted successfully.'
                                });
                                // setTimeout(function() {
                                //     successMessage.remove();
                                // }, 10000);
                                data.ajax.reload();
                            }
                            , error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
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

    });

</script>

@endpush
