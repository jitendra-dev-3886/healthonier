@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>Patient</h3>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('doctor.add.patient') }}">Add Patient</a>
    </div>
</div>
<br>
<div id="statusChange" class="alert alert-primary" role="alert" style="display:none">
    Patient Status Chnaged !
</div>
<div id="statusDeleted" class="alert alert-primary" role="alert" style="display:none">
    Patient Deleted !
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Group</th>
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
                    <p>Are you sure you want to delete this "Patient"?</p>
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
<!-- Include SweetAlert2 CSS -->


<!-- Include SweetAlert2 JS -->


<script>
    $(function() {
        var data = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/doctor-show-patient'

            , columns: [{
                    data: 'name'

                    , name: 'name'

                }
                , {
                    data: 'email'

                    , name: 'email'

                }
                , {
                    data: 'number'

                    , name: 'number'

                }
                , {
                    data: 'group'

                    , name: 'group'

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
                url: '/doctor-delete-patient/' + id
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , type: 'DELETE'
                , success: function(response) {
                    var successMessage = $('#statusDeleted').show();

                    setTimeout(function() {
                        successMessage.remove();
                    }, 10000);
                    data.ajax.reload();
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

                var patientId = $(this).data('id');

                var status = $(this).is(':checked') ? 1 : 0;



                $.ajax({

                    url: '/doctor-status-update-patient'

                    , method: 'POST'

                    , headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }



                    , data: {

                        patientId: patientId

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

    function updateGroup(groupId, userId) {
        // Display a confirmation dialog
        Swal.fire({
            title: 'Are you sure?'
            , text: 'You are about to update the group. Do you want to continue?'
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/doctor-status-update-patient'
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , type: 'POST'
                    , data: {
                        group_id: groupId
                        , userId: userId
                    }
                    , success: function(response) {
                        if (response.success) {
                           

                            var table = $('#users-table').DataTable();
                            table.ajax.reload();

                            // Use SweetAlert2 for success message
                            Swal.fire({
                                icon: 'success'
                                , title: 'Group Updated'
                                , text: 'The group has been updated successfully.'
                            });
                        } else {
                            // Use SweetAlert2 for error message
                            Swal.fire({
                                icon: 'error'
                                , title: 'Error'
                                , text: 'Error updating group: ' + response.message
                            });
                        }
                    }
                    , error: function() {
                        // Use SweetAlert2 for error message
                        Swal.fire({
                            icon: 'error'
                            , title: 'Error'
                            , text: 'Error updating group.'
                        });
                    }
                });
            }
        });
    }

</script>

@endpush
