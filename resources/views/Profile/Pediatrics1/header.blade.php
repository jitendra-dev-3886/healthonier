<!DOCTYPE html>
<html lang="zxx"> 
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Doctor Consulting App</title>
    <meta name="keywords" content="">
    <meta name="robots" content="noindex,nofollow">
    <meta name="title" property='og:title' content='' />
    <meta name="type" property='og:type' content='website' />
    <meta name="image" property='og:image' content="" />
    <meta name="url" property='og:url' content='' />
    <meta name="description" property='og:description' content='' />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="author" content="Jyoti Mishra Web Designer at Xonier">
    
     <link href="{{ asset('Pediatrics/assets/css/font-awesome-all.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/flaticon.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/owl.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/animate.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/color.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('Pediatrics/assets/css/calender.css') }}">

    <link href="{{ asset('Pediatrics/assets/css/timePicker.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('Pediatrics/assets/css/responsive.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

    <!-- <link rel="icon" type="image/png" href="{{asset('Pediatrics/assets/images/favicon.png')}}"> -->
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-offset="120">




    @yield('content')





    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>

  <script src="{{ asset('Pediatrics/assets/js/jquery.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/popper.min.js') }}"></script>

    <script src=" {{ asset('Pediatrics/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/owl.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/wow.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/validation.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/jquery.fancybox..js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/appear.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/scrollbar.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/tilt.jquery.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('Pediatrics/assets/js/pagenav.js') }}"></script>



    <script src="{{ asset('Pediatrics/assets/js/timePicker.js') }}"></script>



    <script src="{{ asset('Pediatrics/assets/js/jquery-ui.js') }}"></script>



    <!-- main-js -->

    <script src="{{ asset('Pediatrics/assets/js/script.js') }}"></script>



    <script src="{{ asset('Pediatrics/assets/js/calendar.js') }}"></script>
     
     
    {{-- fullcalender --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({

                dayClick: function (date, jsEvent, view) {

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

                            , success: function (response) {

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



                                    input.on('click', function () {

                                        var dataId = $(this).data('id');

                                        timeslotId(dataId);

                                    });



                                    label.append(input);

                                    label.append(span);

                                    $('#radioButtonsDiv').append(label);

                                }

                            }

                            , error: function (xhr) {

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

                , success: function (response) {



                    if (response.countdata == 'No Slots') {

                        var button = $('<button>')

                            .attr('id', 'original-button')

                            .addClass('theme-btn')

                            .text(response.label);

                        var span = $('<span>').addClass('btn mb-3').text(response.countdata);



                    } else {

                        var button = $('<button>')

                            .attr('id', 'original-button')

                            .addClass('theme-btn')

                            .attr('onclick', 'splitButton()')

                            .text(response.label);

                        button.on('click', function () {

                            showContent('Dglow');

                        });



                        var span = $('<span>').addClass('btn mb-3').text(response.countdata);

                    }





                    $('#timeslot').empty().append(button).append(span);

                    console.log(response);

                }

                , error: function (error) {

                    // Handle any errors that occur during the request

                    console.error(error);

                }

            });



        }
    </script>

    <script>
        $(document).ready(function () {

            $('#book').submit(function (e) {

                e.preventDefault();



                var formData = $(this).serialize();

                var submitBtn = $(this).find('button[type="submit"]');

                var anotherBtn = $('#rzp-button');



                $.ajax({

                    url: '{{ route('update.booking') }}'

, type: 'POST'

                    , data: formData

                    , success: function (response) {

                        submitBtn.hide();

                        anotherBtn.show();

                    }

                    , error: function (xhr) {

                        // Handle the error here

                    }

                });

            });

        });
        document.getElementById('rzp-button').onclick = function (e) {

            e.preventDefault(); // Prevent form submission

            // alert('hi');



            // Make an AJAX request to create the order ID

            fetch('{{ route('order.id') }}', {



                method: 'POST'

                , headers: {

                    'Content-Type': 'application/json'

                    , 'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    ,
                }

                , body: JSON.stringify({

                    // Include any necessary data for order creation

                })

                ,
            })

                .then(response => response.json())

                .then(data => {

                    var orderId = data.order_id;

                    var mame = data.name;

                    var email = data.email;

                    var contact = data.contact; // Retrieve the order ID from the response

                    var amounts = $('#amount').val();



                    var options = {

                        key: '{{ env('

RAZORPAY_KEY ') }}'

, amount: amounts, // replace with your actual order amount

                        currency: 'INR', // replace with your currency code

                        name: 'Doctor'

                        , description: 'Doctor Booking'

                        , order_id: orderId

                        , handler: function (response) {

                            // console.log(response);

                            // alert('Payment success');

                            savePayment(response);



                            // Handle success callback

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

                    // , signature: response.razorpay_signature

                })

            })

                .then(function (response) {

                    return response.json();

                })

                .then(function (response) {

                    console.log(response);

                    var redirectUrl = response.redirect_url;

                    window.location.href = redirectUrl;

                })

                .catch(function (error) {

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

                , success: function (response) {

                    var fee = response.fee;
                    var date = response.date;
                    var venue = response.venue;

                    $('#amount').val(fee);
                    $('#bookingdate').val(date);
                    $('#venue').val(venue);



                    console.log(response.message);

                }

                , error: function (xhr) {

                    console.log(response.error);

                }

            });

        }
    </script>
    <script>
        function splitButton() {
            document.getElementById("Dglow").style.display = 'block';
        }

    </script>


</body>


</html>