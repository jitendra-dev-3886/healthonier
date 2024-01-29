<style>
    /* td.fc-day-top.fc-future:hover {
        background: #ef344f;
        color: #fff;
        cursor: pointer;
    } */
    /* .selected-date-color .fc-today{
        background: #ef344f !important;

    } */

    .p-0 {
        padding: 0;
    }

    .box_design {
        background: url(../Massage/assets/img/bg.png);
        padding: 30px;
        border-radius: 20px;
        background-size: cover;
        box-shadow: 0 10px 30px #eaf2f1;
        min-height: 320px;
    }

    .can {
        font-size: 11px;
        background: #fe5948;
        padding-left: 5px;
        margin: 2px;
        border-radius: 5px;
        color: #fff !important;
        padding-right: 0;
    }

    .can span {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #fe5948;
        position: relative;
        text-align: center;
        top: 30px;
        right: 48%;
    }

    .comp {
        font-size: 11px;
        background: #09a475;
        padding-left: 5px;
        margin: 2px;
        border-radius: 5px;
        color: #fff !important;
        padding-right: 0;
    }

    .comp span {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #09a475;
        position: relative;
        text-align: center;
        top: 30px;
        right: 48%;
    }

    .incomp {
        font-size: 11px;
        background: #000;
        color: #fff !important;
        padding-left: 5px;
        margin: 2px;
        border-radius: 5px;
        padding-right: 0;
    }

    .incomp span {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #000;
        position: relative;
        text-align: center;
        top: 30px;
        right: 48%;
    }

    .ongoing {
        font-size: 11px;
        background: #feae00;
        padding-left: 5px;
        margin: 2px;
        border-radius: 5px;
        color: #fff !important;
        padding-right: 0;
    }

    .ongoing span {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #feae00;
        position: relative;
        text-align: center;
        top: 30px;
        right: 48%;
    }

    .token_btn {
        margin-top: 10px
    }

    .token_active {
        margin-top: 10px
    }

    /* .token_btn {
    border: 2px solid #39cabb;
    color: #39cabb !important;
    position: relative;
    display: inline-block;
    font-size: 15px;
    line-height: 3.2;
    text-align: center;
    width: 50px;
    border-radius: 50px;
    height: 50px;
    box-shadow: 0 20px 30px #d5edea;
    transition: all 500ms ease;
    font-weight: 600;
    margin-bottom: 10px;
} */
    .token_active {
        background: #39cabb;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #fff !important;
        text-align: center;
        width: 50px;
        border-radius: 30px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .theme-btn-one {
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 26px;
        font-weight: 600;
        color: #fff !important;
        text-align: center;
        padding: 12px 40px;
        border-radius: 30px;
        z-index: 1;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        background: #39cabb;
        border: 1px solid #39cabb !important;
    }

    .my-row {
        margin-right: -15px;
        margin-left: -15px;
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .pb-5 {
        padding-bottom: 3rem !important;
    }

    .pt-5 {
        padding-top: 3rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .tokencolor {
        display: flex;
        justify-content: space-between;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .highlight {
        border: 2px solid #39cabb;
        border-radius: 50px;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #080808 !important;
        text-align: center;
        width: 150px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
        animation: blink 1s infinite;
        background-color: #FFD700;
        color: #000;
    }

    .pending {
        border: 2px solid #39cabb;
        color: #39cabb !important;
        border-radius: 50px;
        background: #ffffff;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #080808 !important;
        text-align: center;
        width: 150px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .in {
        border: 2px solid #39cabb;
        color: #39cabb !important;
        border-radius: 50px;
        background: #08faca;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #050505 !important;
        text-align: center;
        width: 150px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .out {
        border: 2px solid #39cabb;
        color: #39cabb !important;
        border-radius: 50px;
        background: #39ca5f;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #fff !important;
        text-align: center;
        width: 150px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .cancelled {
        border: 2px solid #39cabb;
        color: #39cabb !important;
        border-radius: 50px;
        background: #ee6e65;
        position: relative;
        display: inline-block;
        font-size: 15px;
        line-height: 3.2;
        color: #fff !important;
        text-align: center;
        width: 150px;
        height: 50px;
        box-shadow: 0 20px 30px #d5edea;
        transition: all 500ms ease;
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 10px;
    }

</style>
<!-- Services Section -->
<section class="services-section doctor-details" id="appointment">
    <div class="shape-one"><img src="assets/images/shape/shape-7.png" alt=""></div>
    <input type="hidden" name="doctorid" value="{{$data->user_id}}" id="Id">
    <div class="auto-container container">
        <div class="doctor-block-four">
            <div class="inner-box" id="b">


                <div class="content-row">
                    <div class="row">
                        <div class="col-md-5">
                            <div id="calendar" style="padding:20px"></div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-inner">
                                <div class="appointment-time">
                                    <div class="php-email-form">
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
                                                <div style="color: white; padding: 10px; " id="email-error" class="error-message"></div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Patient Age </label>
                                                    <input max="<?php echo date('Y-m-d'); ?>" type="date" name="age" placeholder="DOB" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Patient Number </label>
                                                    <input type="tel" name="number" placeholder="Mobile Number" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="tel" name="number" placeholder="Mobile Number" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="quantity">Gender </label>
                                                <select class="form-select form-control" name="gender" aria-label="Default select example" required>
                                                    <option value="female" selected>Female </option>
                                                    <option value="male">Male </option>

                                                </select>
                                            </div>



                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Problem </label>
                                                    <textarea name="problem" placeholder="Enter Your Problem"></textarea>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="booking-summery">
                                    <h4>Booking Summery</h4>
                                    <div class="booking_box">
                                        <div id="mybooking11"class="block mybooking11">
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
                                                <tr>
                                                    <td>Consultation Type</td>
                                                    <td>
                                                        <label>
                                                            <input style="height:20px" type="radio" name="consultationType" id="onlineConsultation" value="online" checked> Online
                                                        </label>
                                                        <label>
                                                            <input style="height:20px" type="radio" name="consultationType" id="offlineVisit" value="offline"> Offline
                                                        </label>
                                                    </td>
                                                    
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
<section class="feature-section pt-5 pb-5">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-13.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-14.png);"></div>
    </div>
    <div class="container">
        <div class="sec-title centred">
            <h1 class="mb-5"> Track Your Token</h1>
        </div>

        <div class="row clearfix">
            <div class="col-lg-5 col-md-5 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="inner-box box_design">
                        <div class="appointme">
                            <div class="php-email-form">
                                <h2 class="mb-4">Choose clinic </h2>
                                <form id="tokenForm">
                                    @csrf
                                    @foreach($clinic as $index => $item)
                                    <label>
                                        <input type="radio" name="clinic" {{$index == 0 ? 'checked' : ''}} value="{{$item->id}}">
                                        <span>{{$item->name}}</span>
                                    </label>
                                    @endforeach
                                    <div class="form-group mt-4">
                                        <input type="text" name="token" class="form-control" id="" aria-describedby="" placeholder="Enter Your Token Number">
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptchaSiteKey }}"></div>
                                    <button type="button" id="trackToken" class="theme-btn-one mt-3"> Track Your Token</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 feature-block">
                <div class="feature-block-one wow fadeInUp animated animated animated tokendata" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">

                    @include('Profile.Dentiest.tokenbased')
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    $(document).ready(function() {
        $('#contact-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route('contact.form') }}'
                , type: 'POST'
                , data: formData
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
                    url: '/get-clinic'
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
                            var time = datanext[i].clinicTime;

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
                                            bookNow(dataId, formattedDate, time);
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
                                        bookNow(dataId, formattedDate, time);
                                    });


                            }

                            clinicDiv.append(clinicName, clinicTime, slots, bookButton);

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

    function bookNow(dataId, formattedDate, time) {

        document.getElementById("b").style.display = 'none';
        document.getElementById("Dglow").style.display = 'block';


        $.ajax({
            url: '/clinic-booking'
            , method: 'GET'
            , data: {
                dataId: dataId
                , formattedDate: formattedDate
                , time: time
            }
            , success: function(response) {
                // var fee = response.fee;
                var date = response.date;
                var venue = response.venue;
                // $('#amount').val(fee);
                $('#bookingdate').val(date);
                $('#venue').val(venue);
                console.log(response.message);

            }
            , error: function(error) {
                console.error(error);
            }
        });
    }

    function Onlineid(dataId) {

        $.ajax({
            url: '/onlinebooking-id'
            , method: 'GET'
            , data: {
                id: dataId
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
            var onlineBtn = $('#rzp-button');
            var offlineBtn = $('#offlinepay');
            var mybooking = $('#mybooking11');
            $.ajax({
                url: '{{ route('update.booking') }}'
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    var fee = response.fee;
                    $('#amount').val(fee);
                    submitBtn.hide();
                    mybooking.hide();
                    if ($('#onlineConsultation').is(':checked')) {
                        onlineBtn.show();
                        offlineBtn.hide();
                    } else {
                        onlineBtn.show();
                        offlineBtn.show();
                    }
                }
                , error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var emailError = xhr.responseJSON.errors.email;
                        $('#email-error').text(emailError[0]);
                        var clickedDate = $(this).data('date');

                        $('#email-error').addClass('alert alert-danger bg-danger');
                    }
                }
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
                    , name: 'Helathonier'
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
<script>
    // $(document).ready(function() {

    // });
    function verifyCaptcha() {
        var token = grecaptcha.getResponse();

        if (!token) {
            alert('Please complete the reCAPTCHA.');
            return false;
        }
        return true;
    }
    // document.getElementById('trackToken').addEventListener('click', function() {
    $('#trackToken').click(function() {
        if (verifyCaptcha()) {

            var formData = $('#tokenForm').serialize();

            $.ajax({
                type: 'POST'
                , url: '{{ route("track.token.show") }}'
                , data: formData
                , success: function(response) {
                    $('.tokendata').html(response);
                }
            });
        }
    });
    // });

</script>


@endpush
