@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>Tax Types</h3>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('add.tax') }}">Add Tax</a>
    </div>
</div>
<br>
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

                <table id="users-table" class="p-3">
                    <thead>
                        <tr>
                            <th>Tax Name</th>
                            <th>Tax Percentage</th>
                            <th>Tax Description</th>
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
                    <p>Are you sure you want to delete this "Tax Type"?</p>
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

            , ajax: '/show-tax'

            , columns: [{
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
                url: '/check-tax-association/' + id
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'GET'
                , success: function(response) {
                    if (response.has_association) {
                        // The tax is associated with a fee, show a message
                        Swal.fire({
                            icon: 'error'
                            , title: 'Cannot Delete Tax'
                            , text: 'This tax is associated with a fee and cannot be deleted.'
                        });
                    } else {
                        // The tax is not associated with any fees, proceed with deletion
                        $.ajax({
                            url: '/delete-tax/' + id

                            , headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            , type: 'DELETE'
                            , success: function(response) {
                                Swal.fire({
                                    icon: 'success'
                                    , title: 'Tax Deleted'
                                    , text: 'The Tax Deleted successfully.'
                                });
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

                var taxID = $(this).data('id');

                var status = $(this).is(':checked') ? 1 : 0;




                $.ajax({

                    url: '/update-status-tax'

                    , method: 'POST'

                    , headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }



                    , data: {

                        taxID: taxID

                        , status: status

                    }

                    , success: function(response) {
                            Swal.fire({
                                icon: 'success'
                                , title: 'Tax Updated'
                                , text: 'The Tax Status has been updated successfully.'
                            });
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
