@extends('layouts.admin')
@section('content')

<section class="section">
    @if(session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>

    @endif
    <div class="row">
        <div class="col-md-10">
            <div class="pagetitle">
                <h3>Department</h3>
            </div>
        </div>
        <div class="col-md-2">
            <a class="btn btn-theme" href="{{ route('add.speciality') }}">Add Department</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h5 class="table_title"></h5>
                <div class="table-responsive">
                    <table id="users-table" class="p-3 pt-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
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
                    <p>Are you sure you want to delete this "Department"?</p>
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
        $('#users-table').DataTable({
            serverSide: true
            , processing: true
            , ajax: '/show-speciality'
            , columns: [{
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'status'
                    , name: 'status'
                    , orderable: false
                    , searchable: false
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
    $(document).ready(function() {
        $(document).on('change', 'input[type="checkbox"][id^="statusSwitch_"]', function() {
            var specialitytId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: '/update-status-speciality'
                , method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    specialitytId: specialitytId
                    , status: status
                }
                , success: function(response) {
                    if (status === 1) {
                        Swal.fire({
                            icon: 'success'
                            , title: 'Department Activated'
                            , text: 'Doctor Department Activated Successfully!'
                        });
                        // alert('Doctor Department Activated Successfully!');
                    } else {
                        Swal.fire({
                            icon: 'success'
                            , title: 'Department Deactivated'
                            , text: 'Doctor Department Deactivated Successfully!'
                        });
                        // alert('Doctor Department Deactivated Successfully!');
                    }

                }
                , error: function(xhr) {}
            });
        });
    });

    $(document).on('click', '.delete', function() {
        var specialityId = $(this).data('id');
        $('#confirmationModal').modal('show');

        $('#confirmDelete').data('speciality-id', specialityId);
    });

    $(document).on('click', '#confirmDelete', function() {
        var specialityId = $(this).data('speciality-id');
        $.ajax({
            url: '/delete-speciality/' + specialityId
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , type: 'DELETE'
            , success: function(response) {
                Swal.fire({
                    icon: 'success'
                    , title: 'Speciality Deleted'
                    , text: 'Speciality Deleted successfully.'
                });
                // alert('Speciality deleted successfully');
                location.reload();
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

</script>
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {

            successMessage.remove();
        }
    }, 1000);

</script>

@endpush
