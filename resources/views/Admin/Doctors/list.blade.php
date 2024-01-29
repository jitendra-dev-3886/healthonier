@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>Doctors</h3>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('add.doctor') }}">Add Doctor</a>
    </div>
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
                                <th scope="col">S.No</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                <th scope="col">Active Status</th>
                            </tr>
                        </thead>
                    </table>
                {{-- </div> --}}
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
                    <p>Are you sure you want to delete this "Doctor"?</p>
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
            , ajax: '/show-doctor'
            , columns: [{
                    data: 'serial'
                    , name: 'serial'
                }
                , {
                    data: 'doctor_name'
                    , name: 'doctor_name'
                }, {
                    data: 'dname'
                    , name: 'dname'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }

                , {
                    data: 'actions'
                    , name: 'actions'
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'status'
                    , name: 'status'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

    $(document).on('click', '.delete', function() {
        var doctorId = $(this).data('id');
        $('#confirmationModal').modal('show');
        $('#confirmDelete').data('doctorId-id', doctorId);
    });

    $(document).on('click', '#confirmDelete', function() {
        var doctorId = $(this).data('doctorId-id');
        $.ajax({
            url: '/delete-doctor/' + doctorId
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , type: 'DELETE'
            , success: function(response) {
                Swal.fire({
                    icon: 'success'
                    , title: 'Doctor Deleted'
                    , text: 'Doctor deleted successfully!'
                });
                var table = $('#users-table').DataTable();
                table.ajax.reload();
                // alert('Doctor deleted successfully');
                // location.reload();
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
            var doctorId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '/update-status-doctor'
                , method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

                , data: {
                    doctorId: doctorId
                    , status: status
                }
                , success: function(response) {
                    if (status === 1) {
                        Swal.fire({
                            icon: 'success'
                            , title: 'Doctor Activated'
                            , text: 'Doctor Activated Successfully!'
                        });
                        // alert('Doctor Activated Successfully!');
                    } else {
                        Swal.fire({
                            icon: 'success'
                            , title: 'Doctor Deactivated'
                            , text: 'Doctor Deactivated successfully!'
                        });
                        // alert('Doctor Deactivated Successfully!');
                    }
                }
                , error: function(xhr) {

                }
            });
        });
    });

</script>
@endpush
