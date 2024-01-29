@extends('layouts.admin')
@section('content')

<style>
    .selected-date-color {
        background: #ef344f !important;

    }

</style>

<div class="pagetitle">
    <h3>Patient Booking </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    <input type="hidden" name="doctorid" value="{{ auth()->user()->doctor->id}}" id="Id">
                    <input type="hidden" name="patientId" value="{{ $id}}" id="patientId">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <div id="calendar"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-inner">
                                    <div class="appointment-time">
                                        <div class="php-email-form">
                                            <h3>Clinic Location </h3>
                                            <hr>


                                            <div class="appointment_box">
                                                <div class="row" id=radioButtonsDiv>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="">
    <h5 class="">Booking History</h5>
</div>

<div class="card">

    <div class="table-responsive">
        <table id="users-table" class="p-3 pt-0">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Clinic Name</th>
                    <th>Patient Name</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Token</th>
                    <th>Time</th>
                    <th>Group</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        var selectedDate = null;

        $('#calendar').fullCalendar({
            dayClick: function(date, jsEvent, view) {
                selectedDate = moment(date);
                loadClinicInfo();
                $('td.fc-day-top').removeClass('selected-date-color');
                var clickedDate = $(this).data('date');

                $('td.fc-day-top[data-date="' + clickedDate + '"]').addClass('selected-date-color');
            }
        });

        // Get the default selected date when the calendar is first loaded
        var defaultDate = $('#calendar').fullCalendar('getDate');
        if (defaultDate) {
            selectedDate = moment(defaultDate);
            loadClinicInfo();
        }

        function loadClinicInfo() {
            if (selectedDate !== null) {

                var formattedDate = selectedDate.format('YYYY-MM-DD');
                var dayName = selectedDate.format('dddd');
                var doctorId = document.querySelector('#Id').value;

                $.ajax({
                    url: '/doctor-get-clinic'
                    , type: 'GET'
                    , data: {
                        dayName: dayName
                        , formattedDate: formattedDate
                        , doctorId: doctorId
                    }
                    , success: function(response) {
                        $('#dataDiv').html(response);

                        var datanext = response.data;
                        $('#radioButtonsDiv').empty();
                        $('#nobooking').hide();
                        $('.location').hide();

                        for (var i = 0; i < datanext.length; i++) {
                            var clinicDiv = $('<div>').addClass('col-md-12');
                            var clinicName = $('<h5>').text('Clinic Name: ' + datanext[i].clinicName);
                            var clinicTime = $('<h6>').text('Clinic Time: ' + datanext[i].clinicTime);
                            var slots = $('<h6>').text('Token Left: ' + datanext[i].countdata);

                            if (datanext[i].message == 'book') {
                                // var message = $('<p>').text('Book Now');
                                if (datanext[i].countdata == "No Slots") {
                                    var bookButton = $('<button>')
                                        .attr('type', 'button')
                                        .attr('data-id', datanext[i].timeslotid)
                                        .addClass('btn btn-primary')
                                        .text('Slots Booked');

                                } else {
                                    var bookButton = $('<button>')
                                        .attr('type', 'button')
                                        .attr('data-id', datanext[i].timeslotid)
                                        .addClass('btn btn-primary')
                                        .text('Book Now')
                                        .on('click', function() {
                                            var dataId = $(this).data('id');
                                            bookNow(dataId, formattedDate);
                                        });
                                }


                            } else if (datanext[i].message == 'no') {
                                // var message = $('<p>').text('No Time Left For Booking');
                                var bookButton = $('<button>')
                                    .attr('type', 'button')
                                    .addClass('btn btn-danger')
                                    .text('No Time Left For Booking');

                            } else if (datanext[i].message == 'next') {
                                var bookButton = $('<button>')
                                    .attr('type', 'button')
                                    .attr('data-id', datanext[i].timeslotid)
                                    .addClass('btn btn-primary')
                                    .text('Book Now')
                                    .on('click', function() {
                                        var dataId = $(this).data('id');
                                        bookNow(dataId, formattedDate);
                                    });


                            }

                            clinicDiv.append(clinicName, clinicTime, bookButton, slots);

                            $('#radioButtonsDiv').append(clinicDiv);
                        }
                    }
                    , error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }

        // ... Rest of your existing code ...
    });



    function bookNow(dataId, formattedDate) {

        var patientIdValue = document.getElementById('patientId').value;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: '/doctor-patient-book-timeslot'
            , method: 'POST'
            , headers: {
                'X-CSRF-TOKEN': csrfToken
            }
            , data: {
                patient: patientIdValue
                , timeslot: dataId
                , date: formattedDate
            }
            , success: function(response) {
                // Assuming the response contains the booking ID or some identifier
                if (response.error) {
                    alert(response.error)


                } else {
                    window.location.href = '/doctor-patient-book-invoice/' + response.bookingId;

                }

            }
            , error: function(error) {
                console.error(error);
            }
        });
    }



    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

</script>

<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function() {
        var patientId = $('#patientId').val();
        var data = $('#users-table').DataTable({

            serverSide: true

            , processing: true

            , ajax: '/doctor-dashboard-patient-booking-history/' + patientId

            , columns: [{
                    data: 'serial'
                    , name: 'serial'
                }, {
                    data: 'clinicName'

                    , name: 'clinicName'

                }, {
                    data: 'patientName'

                    , name: 'patientName'

                }
                , {
                    data: 'patientMobile'

                    , name: 'patientMobile'

                }
                , {
                    data: 'bookingDate'

                    , name: 'bookingDate'

                }
                , {
                    data: 'token'

                    , name: 'token'

                }
                , {
                    data: 'timeslots'

                    , name: 'timeslots'

                }
                , {
                    data: 'group'

                    , name: 'group'

                }
                , {
                    data: 'amount'

                    , name: 'amount'

                }
                , {

                    data: 'payment'

                    , name: 'payment'

                }
                , {

                    data: 'status'

                    , name: 'status'

                }

            , ]

        });




    });

</script>

@endpush
