@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>Fee</h3>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('add.fee') }}">Add Fee</a>
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

                <table id="users-table" class="p-3 pt-0">
                    <thead>
                        <tr>
                            <th>Tittle</th>
                            <th>Amount</th>
                            <th>Apply On</th>
                            <th>Status</th>
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

            , ajax: '/show-fee'

            , columns: [{
                    data: 'tittle'

                    , name: 'tittle'

                }

                , {

                    data: 'total_amount'

                    , name: 'total_amount'

                }, {

                    data: 'consultant_type'

                    , name: 'consultant_type'

                }, {

                    data: 'status'

                    , name: 'status'

                }, {

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
                url: '/check-fee-association/' + id
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'GET'
                , success: function(response) {
                    if (response.has_association) {
                        // The tax is associated with a fee, show a message
                        Swal.fire({
                            icon: 'error'
                            , title: 'Cannot Delete Fee'
                            , text: 'This Fee is associated with a Bookings and cannot be deleted.'
                        });
                    } else {
                        // The tax is not associated with any fees, proceed with deletion
                        $.ajax({
                            url: '/delete-fee/' + id
                            , headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            , type: 'DELETE'
                            , success: function(response) {
                                Swal.fire({
                                    icon: 'success'
                                    , title: 'Fee Deleted'
                                    , text: 'The Fee Deleted successfully.'
                                });
                                // var successMessage = $('#statusDeleted').show();

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
        $(document).ready(function() {

            $(document).on('change', 'input[type="checkbox"][id^="statusSwitch_"]', function() {

                //alert('hi');

                var feeId = $(this).data('id');

                var status = $(this).is(':checked') ? 1 : 0;




                $.ajax({

                    url: '/update-status-fee'

                    , method: 'POST'

                    , headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }



                    , data: {

                        feeId: feeId

                        , status: status

                    }

                    , success: function(response) {
                            var successMessage = $('#statusChange').show();

                            setTimeout(function() {
                                successMessage.remove();
                            }, 10000);
                            data.ajax.reload();
                        }

                    , error: function(xhr) {



                    }

                });

            });

        });

    });

</script>

@endpush
