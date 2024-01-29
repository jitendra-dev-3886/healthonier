<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">





<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Healthonier</title>

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

    <!-- Fav Icon -->

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">



    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">



    <!-- Stylesheets -->

    <link href="{{ asset('profile/assets/css/font-awesome-all.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/flaticon.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/owl.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/animate.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/color.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('profile/assets/css/calender.css') }}">

    <link href="{{ asset('profile/assets/css/timePicker.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('profile/assets/css/responsive.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">







</head>

<body>

    {{-- @include('layouts.nav') --}}







    @yield('content')





    <!-- Template Main JS File -->





    <!-- main-footer -->

    <footer class="main-footer">

        <div class="footer-top">

            <div class="pattern-layer">

                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-30.png);"></div>

                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-31.png);"></div>

            </div>

            <div class="auto-container">

                <div class="widget-section">

                    <div class="row clearfix">

                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">

                            <div class="footer-widget logo-widget">
                                <?php
                                $dynamicURL = 'https://clinic.xonierconnect.com/data/' . $data->user_id; 
                                    ?>

                                <figure class="footer-logo"><a href="<?php echo $dynamicURL ;?>"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('profile/assets/images/logo.png')}} @endif" alt=""></a> </figure>

                                <div class="text">

                                    <p>Always consult a healthcare professional for accurate diagnosis and

                                        personalized treatment plans</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">

                            <div class="footer-widget links-widget">

                                <div class="widget-title">

                                    <h3>About</h3>

                                </div>

                                <div class="widget-content">

                                    <ul class="links clearfix">

                                        <li><a href="#about">About Us</a></li>

                                        <li><a href="#appointment">Appointment</a></li>

                                        <li><a href="#team">Working hours</a></li>

                                        <li><a href="#testimonials">Testimonials</a></li>

                                        <li><a href="#contact">Contact Us</a></li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">

                            <div class="footer-widget contact-widget">

                                <div class="widget-title">

                                    <h3>Contacts</h3>

                                </div>

                                <div class="widget-content">

                                    <ul class="info-list clearfix">

                                        <li><i class="fas fa-map-marker-alt"></i>

                                            Noida, India

                                        </li>

                                        <li><i class="fas fa-microphone"></i>

                                            <a href="tel:@if($data) {{$data->mobile != '' ? $data->mobile	  : 'None' }} @endif ">+91 @if($data) {{$data->mobile != '' ? $data->mobile	  : 'None' }} @endif </a>

                                        </li>

                                        <li><i class="fas fa-envelope"></i>

                                            <a href="mailto:@if($data) {{$data->email != '' ? $data->email	  : 'None' }} @endif">@if($data) {{$data->email != '' ? $data->email	  : 'None' }} @endif</a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <div class="auto-container">

                <div class="inner-box clearfix">

                    <div class="copyright pull-left">

                        <p><a href="#home">Xonier</a> &copy; 2023 All Right Reserved</p>

                    </div>



                </div>

            </div>

        </div>

    </footer>

    <!-- main-footer end -->





    <!--Scroll to top-->

    <button class="scroll-top scroll-to-target" data-target="html">

        <span class="fa fa-arrow-up"></span>

    </button>

    </div>



    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel"> </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body centred p-5">

                    <div class="content-box">

                        <div class="icon-box">

                            <i class="icon-Check-mark-2"></i>

                        </div>

                        <h3>Thanks for your booking!</h3>

                        <p>Your Appointment Booked Successfully With The Healthonier!

                        </p>

                        <h5 class="mt-3">Expected visit: 12:40 PM</h5>

                        <h2 class="theme-btn-one mt-4">Your Token No: 46

                        </h2>

                    </div>

                </div>



            </div>

        </div>

    </div>







    <script>
        function splitButton() {

            var originalButton = document.getElementById("original-button");

            originalButton.classList.add("hidden");



            var additionalButtons = document.getElementById("additional-buttons");

            additionalButtons.classList.remove("hidden");

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

    </script>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#book').submit(function(e) {

                e.preventDefault();



                var formData = $(this).serialize();

                var submitBtn = $(this).find('button[type="submit"]');

                var anotherBtn = $('#rzp-button');
                var anotherBtn2 = $('#offlinepay');
                anotherBtn2.show();



                $.ajax({

                    url: '{{ route('
                    update.booking ') }}'

                    , type: 'POST'

                    , data: formData

                    , success: function(response) {

                            submitBtn.hide();

                            anotherBtn.show();

                        }

                    , error: function(xhr) {

                        // Handle the error here

                    }

                });

            });

        });

    </script>



    <script>
        document.getElementById('rzp-button').onclick = function(e) {

            e.preventDefault(); // Prevent form submission

            // alert('hi');



            // Make an AJAX request to create the order ID

            fetch('{{ route('
                    order.id ') }}', {



                        method: 'POST'

                        , headers: {

                            'Content-Type': 'application/json'

                            , 'X-CSRF-TOKEN': '{{ csrf_token() }}'

                        , }

                        , body: JSON.stringify({

                                // Include any necessary data for order creation

                            })

                    , })

                .then(response => response.json())

                .then(data => {

                    var orderId = data.order_id;

                    var mame = data.name;

                    var email = data.email;

                    var contact = data.contact; // Retrieve the order ID from the response

                    var amounts = $('#amount').val();



                    var options = {

                        Key: data.keyID

                        , amount: amounts, // replace with your actual order amount

                        currency: 'INR', // replace with your currency code

                        name: 'Doctor'

                        , description: 'Doctor Booking'

                        , order_id: orderId

                        , handler: function(response) {

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

    </script>









    <!-- jequery plugins -->

    <script src="{{ asset('profile/assets/js/jquery.js') }}"></script>

    <script src="{{ asset('profile/assets/js/popper.min.js') }}"></script>

    <script src=" {{ asset('profile/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('profile/assets/js/owl.js') }}"></script>

    <script src="{{ asset('profile/assets/js/wow.js') }}"></script>

    <script src="{{ asset('profile/assets/js/validation.js') }}"></script>

    <script src="{{ asset('profile/assets/js/jquery.fancybox..js') }}"></script>

    <script src="{{ asset('profile/assets/js/appear.js') }}"></script>

    <script src="{{ asset('profile/assets/js/scrollbar.js') }}"></script>

    <script src="{{ asset('profile/assets/js/tilt.jquery.js') }}"></script>

    <script src="{{ asset('profile/assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('profile/assets/js/pagenav.js') }}"></script>



    <script src="{{ asset('profile/assets/js/timePicker.js') }}"></script>



    <script src="{{ asset('profile/assets/js/jquery-ui.js') }}"></script>



    <!-- main-js -->

    <script src="{{ asset('profile/assets/js/script.js') }}"></script>



    <script src="{{ asset('profile/assets/js/calendar.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({

                dayClick: function(date, jsEvent, view) {

                    var selectedDate = moment(date);

                    var currentDate = moment().startOf('day');

                    var nextWeek = moment().startOf('day').add(7, 'days');

                    if (selectedDate.isBetween(currentDate, nextWeek, 'day', '[]') && selectedDate.isoWeekday() !== 6 && selectedDate.isoWeekday() !== 7) {

                        var formattedDate = moment(date).format('YYYY-MM-DD');

                        var dayName = moment(date).format('dddd');

                        var doctorId = document.querySelector('#doctorId').value;

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

                                .addClass('btn btn-outline-theme mb-3')

                                .text(response.label);

                            var span = $('<span>').addClass('btn mb-3').text(response.countdata);



                        } else {

                            var button = $('<button>')

                                .attr('id', 'original-button')

                                .addClass('btn btn-outline-theme mb-3')

                                .attr('onclick', 'splitButton()')

                                .text(response.label);

                            button.on('click', function() {

                                showContent('content2');

                            });



                            var span = $('<span>').addClass('btn mb-3').text(response.countdata);

                        }





                        $('#timeslot').empty().append(button).append(span);

                        console.log(response);

                    }

                , error: function(error) {

                    // Handle any errors that occur during the request

                    console.error(error);

                }

            });



        }

    </script>

    <script>
        $(document).ready(function() {

            $('#contact-form').submit(function(event) {

                // alert('hi');

                event.preventDefault(); // Prevent the default form submission



                var formData = $(this).serialize(); // Serialize the form data



                $.ajax({

                    url: '{{ route('
                    contact.form ') }}'

                    , type: 'POST'

                    , data: formData

                    , success: function(response) {

                            $('#success-message').text(response.message).addClass('btn btn-success'); // Display the success message

                            // You can also perform other actions or redirects here

                            $('#contact-form').trigger('reset');

                        }

                    , error: function(xhr, status, error) {

                        // Handle the error response if needed

                    }

                });

            });

        });


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

    </script>













</body>

</html>
