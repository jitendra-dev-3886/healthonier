@extends('layouts.admin')



@section('content')





<div class="row">
    <div class="col-md-10">
        <div class="pagetitle">
            <h3>RazorPay Detail</h3>
        </div>
    </div>
    {{-- <div class="col-md-2">
        <a class="btn btn-theme" href="{{ route('add.doctor') }}">Add Doctor</a>
    </div> --}}
</div>



<section class="section">
    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="row">

        <div class="col-lg-12">



            <div class="card">


                <h5 class="table_title"></h5>
                <div class="table-responsive">

                    <!-- Table with stripped rows -->

                    <table id="users-table" class="p-3 pt-0">

                        <thead>

                            <tr>

                                <th>Doctor Name</th>

                                <th>RazorPay KeyId</th>

                                <th>Razorpay SecretKey</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                    </table>



                    <!-- End Table with stripped rows -->



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

            , ajax: '/admin-show-doctor-razorpay'

            , columns: [{

                    data: 'name'

                    , name: 'name'

                }

                , {

                    data: 'razor_pay_key_id'

                    , name: 'razor_pay_key_id'

                    , orderable: false

                    , searchable: false

                }
                , {

                    data: 'razor_pay_key_secret'

                    , name: 'razor_pay_key_secret'

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

            //alert('hi');

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

                        alert('status Updated !');

                    }

                , error: function(xhr) {



                }

            });

        });

    });



    $(document).on('click', '.delete', function() {

        var specialityId = $(this).data('id');

        $.ajax({

            url: '/delete-speciality/' + specialityId

            , headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

            , type: 'DELETE'

            , success: function(response) {

                    alert('Speciality deleted successfully');

                    location.reload();

                }

            , error: function(xhr) {

                console.log(xhr.responseText);

            }

        });

    });

</script>

@endpush
