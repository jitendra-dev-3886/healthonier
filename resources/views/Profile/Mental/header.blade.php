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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">

    <!-- Bootstrap CSS -->

    <link href="{{ asset('Mental/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/elegant-icons.css ')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/magnific-popup.css ')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/owl.carousel.min.css ')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/animate.css ')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/bootsnav.css ')}}" rel="stylesheet" />
    <link href="{{ asset('Mental/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('Mental/assets/css/responsive.css ')}}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->



    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">

</head>

<body>


    @yield('content')



    <!-- <a href="#" class="back_top"> <i class="icofont-rounded-up"></i></a> -->

    <!-- Javascript -->

   

    <script src="{{ asset('Mental/assets/js/jquery-1.12.4.min.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/bootstrap.min.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/equal-height.min.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/jquery.appear.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/jquery.easing.min.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/jquery.magnific-popup.min.js ')}}"></script>
    <script src="{{ asset('Mental/assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/count-to.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/bootsnav.js')}}"></script>
    <script src="{{ asset('Mental/assets/js/main.js')}}"></script>

    {{-- fullcalender --}}

    @stack('scripts')


</body>


</html>