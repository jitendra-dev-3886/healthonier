<!DOCTYPE html>
<html lang="en">



<head>
    <!-- ========== Meta Tags ========== -->
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
  
    <!-- ========== Favicon Icon ========== -->
    <!-- <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon"> -->
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('physiotherapist/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/elegant-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('physiotherapist/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('physiotherapist/assets/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->



    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">

    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />


</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
    @yield('content')

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('physiotherapist/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('physiotherapist/assets/js/main.js') }}"></script>
    {{-- fullcalender --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function () {

            $('#contact-form').submit(function (event) {

                // alert('hi');

                event.preventDefault(); // Prevent the default form submission



                var formData = $(this).serialize(); // Serialize the form data



                $.ajax({

                    url: '{{ route('contact.form') }}'

                    , type: 'POST'

                    , data: formData

                    , success: function (response) {

                        $('#success-message').text(response.message).addClass('btn btn-success'); // Display the success message

                        // You can also perform other actions or redirects here

                        $('#contact-form').trigger('reset');

                    }

                    , error: function (xhr, status, error) {

                        // Handle the error response if needed

                    }

                });

            });

        });

    </script>
   
</body>



</html>