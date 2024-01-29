@extends('layouts.admin')



@section('content')



<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>Clinic List</h3>
        </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('add.clinic') }}">Add Clinic</a>
    </div>
</div>
<br>

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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Number</th>
                                <th>Available Days</th>

                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- End Table with stripped rows -->
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
                    <p>Are you sure you want to delete this "Clinic Timeslot"?</p>
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

            , ajax: '/show-clinic'

            , columns: [{

                    data: 'name'

                    , name: 'name'

                }

                , {

                    data: 'address'

                    , name: 'address'

                }

                , {

                    data: 'contact_number'

                    , name: 'contact_number'

                }





                , {

                    data: 'weekly_days'

                    , name: 'weekly_days'

                    , orderable: false

                    , searchable: false

                }
                , {

                    data: 'status'

                    , name: 'status'

                    , orderable: false



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

    $(document).on('click', '.delete', function() {
        var doctorId = $(this).data('id');

        $('#confirmationModal').modal('show');
        $('#confirmDelete').data('doctorId-id', doctorId);
    });

    // Handle the click event for the "Yes" button in the modal
    $(document).on('click', '#confirmDelete', function() {
        var doctorId = $(this).data('doctorId-id');
        //  alert(doctorId);
        $.ajax({
            url: '/delete-clinic/' + doctorId
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , type: 'DELETE'
            , success: function(response) {
                alert('Clinic Deleted Successfully');
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

    $(document).ready(function() {

        $(document).on('change', 'input[type="checkbox"][id^="statusSwitch_"]', function() {

            //alert('hi');

            var clinicId = $(this).data('id');

            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({

                url: '/update-status-clinic'
                , method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    clinicId: clinicId
                    , status: status
                }
                , success: function(response) {

                    Swal.fire({
                        icon: 'success'
                        , title: 'Clinic Updated'
                        , text: 'The Clinic Status has been updated successfully.'
                    });
                }
                , error: function(xhr) {}

            });

        });

    });

</script>

@endpush
