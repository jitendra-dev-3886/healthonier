@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Doctor Clinic</h3>
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Number</th>
                                <th>Available Days</th>
                                {{-- <th>Time Slots</th> --}}
                                {{-- <th>Fee </th> --}}
                                {{-- <th>Actions</th> --}}
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
                    <p>Are you sure you want to delete this "Doctor Clinic"?</p>
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

            , ajax: '/admin-show-clinic'

            , columns: [{

                    data: 'doctor'

                    , name: 'doctor'

                }, {

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

            

                // , {

                //     data: 'actions'

                //     , name: 'actions'

                //     , orderable: false

                //     , searchable: false

                // }

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
            url: '/admin-delete-clinic/' + doctorId
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , type: 'DELETE'
            , success: function(response) {
                alert('Doctor Clinic Deleted Successfully');
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

@endpush
