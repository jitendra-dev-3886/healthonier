@extends('layouts.admin')



@section('content')





<div class="pagetitle"> 

<h4>Staff List</h4>

    <!-- <nav>

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home</a></li> 

            <li class="breadcrumb-item active">Staff List</li>

        </ol>

    </nav> -->

</div><!-- End Page Title -->



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

                                <th>Email</th>

                                <th>Actions</th>

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

            , ajax: '/show-staff'

            , columns: [{

                    data: 'name'

                    , name: 'name'

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

            , ]

        });

    });

    $(document).on('click', '.delete', function () {
        var staffId = $(this).data('id');
        $.ajax({
            url: '/delete-staff/' + staffId
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , type: 'DELETE'
            , success: function (response) {
                alert('Staff deleted successfully');
                location.reload();
            }
            , error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });

</script>

@endpush





