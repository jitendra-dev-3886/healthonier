<!DOCTYPE html>
<html lang="en">


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
    <!-- Stylesheets -->
    <link href="{{ asset('Dentiest/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('Dentiest/assets/css/style.css') }}" rel="stylesheet">
    <!-- Responsive File -->
    <link href="{{ asset('Dentiest/assets/css/responsive.css') }}" rel="stylesheet">
    <!-- Color File -->
    <link href="{{ asset('Dentiest/assets/css/color.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&amp;family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet">


    <link rel="shortcut icon" href="@if($data){{ $data->fevicon_path != '' ? asset($data->fevicon_path)  : asset('profile/assets/images/logo-3.png') }} @endif" type="image/x-icon">
    <!-- <link rel="icon" href="{{ asset('Dentiest/assets/images/favicon.png') }}" type="image/x-icon"> -->
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

</head>

<body>


    @yield('content')

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-arrow-up"></span></div>

    <script src="{{ asset('Dentiest/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/owl.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/appear.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/wow.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('Dentiest/assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('Dentiest/assets/js/script.js') }}"></script>
    {{-- fullcalender --}}

    @stack('scripts')


</body>


</html>
