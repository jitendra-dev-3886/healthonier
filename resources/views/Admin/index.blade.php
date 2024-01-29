@extends('layouts.admin')
@section('content')
<div class="pagetitle">
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d1.png') }}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Doctors</span>
                                    <h6> {{ $countdoctor }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card primary-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d2.png') }}"></div>
                                <div class="ps-3"><span class="fw-bold">Total Clinic</span>
                                    <h6>{{ $clinic }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card success-card sales-card">
                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d3.png') }}">
                                </div>
                                <div class="ps-3">
                                    <span class="fw-bold">Total Department</span>
                                    <h6>{{ $speciality }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="overflow-auto">
                        <div class="card">
                            <h5 class="table_title"></h5>
                            <div class="table-responsive">
                                <table id="users-table" class="w100 p-3 pt-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Doctor Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Active Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
                }, {
                    data: 'doctor_name'
                    , name: 'doctor_name'
                }, {
                    data: 'email'
                    , name: 'email'
                }

                , {
                    data: 'actions'
                    , name: 'actions'
                    , orderable: false
                    , searchable: false
                }, {
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
                alert('Doctor deleted successfully');
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
                    alert('status Updated !');
                }
                , error: function(xhr) {

                }
            });
        });
    });

</script>
@endpush
