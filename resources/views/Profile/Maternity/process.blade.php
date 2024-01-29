<!-- Services Section -->
<section class="services-section doctor-details" id="appointment">
    <div class="shape-one"><img src="assets/images/shape/shape-7.png" alt=""></div>
    <input type="hidden" name="doctorid" value="{{$data->user_id}}" id="Id">
    <div class="auto-container container">
        <div class="doctor-block-four">
            <div class="inner-box" id="b">
           

                <div class="content-row">
                    <div class="row">
                        <div class="col-md-4">
                                 <div class="image"><img src="@if($data) {{$data->profile_path !='' ? asset($data->profile_path) : asset('Dentiest/assets/images/resource/image-39.jpg')}} @endif" alt=""></div>
                        </div>
                        <div class="col-md-4">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner">
                                <div class="appointment-time">
                                    <div class="php-email-form">
                                        <h3>Location </h3>
                                    <div class="appointment_box">
                                        <div id="radioButtonsDiv"></div>
                                        <div class="card location">
                                            <div class="card-body">
                                                <p>Please Select Your Date To Book Your appointment</p>
                                            </div>
                                        </div>

                                        <!-- <button type="button" class="btn btn-danger location">Select Date</button> -->
                                        <button style="display:none" type="button" class="btn btn-danger" id="nobooking">The Selected Date is Booked</button>
                                          <div class="appointment-time mt-3">
                                    <div id="timeslot"></div>
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




        <!-- Appointment page -->
        <div class="Dglow " id="Dglow">

            <div class="appointment-page">
                <div class="auto-container container">
                    <form id="book">
                        @csrf
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="wrapper-box">

                                    <h4 class="group-title">Your Information:</h4>
                                    <div class="formwrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient name </label>
                                                <input type="text" name="name" placeholder="Patient name" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Email </label>
                                                <input type="Email" name="email" placeholder="Email Id" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Age </label>
                                                <input type="date" name="age" placeholder="DOB" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Patient Number </label>
                                                <input type="tel" name="number" placeholder="Mobile Number" required>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message </label>
                                                <textarea name="note" placeholder="Note to the doctor (optional)"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                        </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="booking-summery">
                                    <h4>Booking Summery</h4>
                                    <div class="booking_box">
                                    <div class="block mybooking11">
                                        <table>
                                            <tr>

                                                <td>Date
                                                </td>
                                                <td>
                                                    <input type="text" class="" value="" id="bookingdate" readonly>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Location</td>
                                                <td><input type="text" class="" value="" id="venue" readonly></td>

                                            </tr>
                                        </table>
                                    </div>
                                    <div class="block">
                                        <table>
                                            <tr>
                                                <td>General Consultation</td>
                                                <td><input type="text" class="" value="" id="amount" name="amount" readonly></td>

                                            </tr>
                                        </table>
                                        <div class="link-btn">
                                            <div>
                                                <button type="submit" class="theme-btn mb-3">Book<i class="icon-Arrow-Right"></i></button>

                                                <button style="display:none" id="rzp-button" class="theme-btn mb-3">Online pay<i class="icon-Arrow-Right"></i></button>
                                                <a style="display:none" class="theme-btn mb-3" id="offlinepay">Offline Pay<i class="fas fa-long-arrow-alt-right"></i></a>

                                            </div>
                                        </div>

                                    </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    $(document).ready(function() {
        $('#contact-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route('contact.form') }}'
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    $('#success-message').text(response.message).addClass('btn btn-success');
                    $('#contact-form').trigger('reset');
                }
                , error: function(xhr, status, error) {

                }
            });
        });
    });

    $(document).ready(function() {
        $('#calendar').fullCalendar({

            dayClick: function(date, jsEvent, view) {

                //alert('hi');

                var selectedDate = moment(date);

                var currentDate = moment().startOf('day');

                var nextWeek = moment().startOf('day').add(7, 'days');

                if (selectedDate.isBetween(currentDate, nextWeek, 'day', '[]') && selectedDate.isoWeekday() !== 6 && selectedDate.isoWeekday() !== 7) {

                    var formattedDate = moment(date).format('YYYY-MM-DD');

                    var dayName = moment(date).format('dddd');
                    var doctorId = document.querySelector('#Id').value;
                    // alert(doctorId);



                    $.ajax({

                        url: '/get-clinic'

                        , type: 'GET'

                        , data: {

                            dayName: dayName

                            , formattedDate: formattedDate

                            , doctorId: doctorId

                        }

                        , success: function(response) {

                                $('#dataDiv').html(response);

                                var datanext = response.datanext;

                                console.log(datanext);

                                $('#radioButtonsDiv').empty();

                                $('#nobooking').hide();

                                $('.location').hide();

                                for (var i = 0; i < datanext.length; i++) {

                                    var label = $('<label>');

                                    var input = $('<input>').attr('type', 'radio').attr('name', 'radio');

                                    var span = $('<span>').text(datanext[i][0].name);

                                    input.attr('data-id', datanext[i][0].timeslot_id);



                                    input.on('click', function() {

                                        var dataId = $(this).data('id');

                                        timeslotId(dataId);

                                    });



                                    label.append(input);

                                    label.append(span);

                                    $('#radioButtonsDiv').append(label);

                                }

                            }

                        , error: function(xhr) {

                            console.log(xhr.responseText);

                        }

                    });

                } else {

                    $('#nobooking').show();

                    $('.location').hide();

                    $('#radioButtonsDiv').empty();

                    $('#timeslot').empty();
                }

            }

        });

    });

    function timeslotId(dataId) {
        $.ajax({
            url: '/timeslot-id'
            , method: 'GET'
            , data: {
                id: dataId
            }
            , success: function(response) {
                if (response.countdata == 'No Slots') {
                    var button = $('<button>')
                        .attr('id', 'original-button')
                        .addClass('theme-btn')
                        .text(response.label);
                    var span = $('<span>').addClass('btn mb-3').text(response.countdata);
                } else {
                    if (response.time == 'no') {
                        var button = $('<button>')
                            .attr('id', 'original-button')
                            .addClass('theme-btn')
                            .text(response.label);
                        var span = $('<span>').addClass('btn mb-3').text('No Time Left For Booking');
                    } else {
                        var button = $('<button>')
                            .attr('id', 'original-button')
                            .addClass('theme-btn')
                            .attr('onclick', 'splitButton()')
                            .text(response.label);
                        button.on('click', function() {
                            showContent('Dglow');
                        });
                        var span = $('<span>').addClass('btn mb-3').text(response.countdata);
                    }
                }
                $('#timeslot').empty().append(button).append(span);
                console.log(response);
            }
            , error: function(error) {
                console.error(error);
            }
        });
    }
    $(document).ready(function() {
        $('#book').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var submitBtn = $(this).find('button[type="submit"]');
            var anotherBtn = $('#rzp-button');
            var anotherBtn2 = $('#offlinepay');
            $.ajax({
                url: '{{ route('update.booking') }}'
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    submitBtn.hide();
                    anotherBtn.show();
                    anotherBtn2.show();
                }
                , error: function(xhr) {}
            });
        });
    });
    document.getElementById('rzp-button').onclick = function(e) {
        e.preventDefault();
        fetch('{{ route('order.id') }}', {
                    method: 'POST'
                    , headers: {
                        'Content-Type': 'application/json'
                        , 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                    , body: JSON.stringify({})
                , })
            .then(response => response.json())
            .then(data => {
                var orderId = data.order_id;
                var mame = data.name;
                var email = data.email;
                var contact = data.contact;
                var amounts = $('#amount').val();
                var options = {
                    key: data.keyID
                    , amount: amounts
                    , currency: 'INR'
                    , name: 'Doctor'
                    , description: 'Doctor Booking'
                    , order_id: orderId
                    , handler: function(response) {
                        savePayment(response);
                    }
                    , prefill: {
                        name: name
                        , email: email
                        , contact: contact
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function savePayment(response) {
        fetch('/save-payment', {
                method: 'POST'
                , headers: {
                    'Content-Type': 'application/json'
                    , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
                , body: JSON.stringify({
                    transaction_id: response.razorpay_payment_id
                    , order_id: response.razorpay_order_id
                })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(response) {
                console.log(response);
                var redirectUrl = response.redirect_url;
                window.location.href = redirectUrl;
            })
            .catch(function(error) {
                console.error(error);
            });
    }

    function showContent(contentId) {
        var content = document.getElementById(contentId);
        content.classList.remove("hidden-content");
        $('#calendar').hide();
        $.ajax({
            url: '{{ route("booking.data") }}'
            , type: 'POST'
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , success: function(response) {
                var fee = response.fee;
                var date = response.date;
                var venue = response.venue;
                $('#amount').val(fee);
                $('#bookingdate').val(date);
                $('#venue').val(venue);
                console.log(response.message);
            }
            , error: function(xhr) {
                console.log(response.error);
            }
        });
    }
    document.getElementById('offlinepay').onclick = function(e) {
        $.ajax({
            url: '{{ route("offline.payment") }}'
            , type: 'POST'
            , headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , success: function(response) {
                var redirectUrl = response.redirect_url;
                window.location.href = redirectUrl;
                console.log(response.message);
            }
            , error: function(xhr) {
                console.log(response.error);
            }
        });
    }

    function splitButton() {
        document.getElementById("Dglow").style.display = 'block';
        document.getElementById("b").style.display = 'none';
    }

</script>

@endpush
