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

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&amp;family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap"
        rel="stylesheet">


    <link rel="shortcut icon" href="{{ asset('Dentiest/assets/images/favicon.png') }}" type="image/x-icon">
    <!-- <link rel="icon" href="{{ asset('Dentiest/assets/images/favicon.png') }}" type="image/x-icon"> -->
    <link rel="icon"
        href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif"
        type="image/png">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/color.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/calender.css">
    <link href="{{ asset('Maternity/assets/css/timePicker.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('Maternity/assets/css/responsive.css')}}" rel="stylesheet">

</head>

<body>


    @yield('content')


    <script src="{{ asset('Maternity/assets/js/jquery.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/owl.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/wow.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/validation.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/appear.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/scrollbar.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/tilt.jquery.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('Maternity/assets/js/pagenav.js')}}"></script>

    <script src="{{ asset('Maternity/assets/js/timePicker.js')}}"></script>

    <script src="{{ asset('Maternity/assets/js/jquery-ui.js')}}"></script>

    <!-- main-js -->
    <script src="{{ asset('Maternity/assets/js/script.js')}}"></script>

    <script src="{{ asset('Maternity/assets/js/calendar.js')}}"></script>

    {{-- fullcalender --}}

    @stack('scripts')


</body>


</html>