@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active">Testimonial List</li>

        </ol>

    </nav>

</div><!-- End Page Title -->



<section class="section">

    <div class="row">

        <div class="col-lg-12">



            <div class="card">

                <div class="">
                    <!-- Table with stripped rows -->

                    <h5 class="table_title"></h5>
                    <table id="users-table" class="p-3">

                        <thead>

                            <tr>

                                <th>S.No</th>

                                <th>Name</th>

                                <th>Review</th>

                                <th>Designation</th>

                                <th>Status</th>

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
    $(function () {

        var data = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/show-testimonial'

            , columns: [{

                data: 'serial'

                , name: 'serial'

            }, {

                data: 'name'

                , name: 'name'

                , orderable: false

                , searchable: false

            }

                , {

                data: 'review'

                , name: 'review'

            }

                , {

                data: 'designation'

                , name: 'designation'

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

                ,]

        });
        $(document).on('click', '.delete', function () {
            if (confirm('Are you sure you want to delete?')) {
                var testimonialId = $(this).data('id');
                $.ajax({
                    url: '/delete-testimonial/' + testimonialId
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , type: 'DELETE'
                    , success: function (response) {
                        alert('Testimonial deleted successfully');
                        location.reload();
                    }
                    , error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });

            }


        });

    });

    $(document).ready(function () {

        $(document).on('change', 'input[type="checkbox"][id^="statusSwitch_"]', function () {

            //alert('hi');

            var testimonialId = $(this).data('id');

            var status = $(this).is(':checked') ? 1 : 0;



            $.ajax({

                url: '/update-status-testimonial'

                , method: 'POST'

                , headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }



                , data: {

                    testimonialId: testimonialId

                    , status: status

                }

                , success: function (response) {
                      alert('Testimonials Status Changed successfully');}

                , error: function (xhr) {



                }

            });

        });

    });


</script>

@endpush