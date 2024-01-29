<!DOCTYPE html>
<html lang="zxx">


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
    
     <link href="{{asset('Cardio/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/elegant-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{asset('Cardio/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Cardio/assets/css/responsive.css')}}" rel="stylesheet" />
    <!-- <link rel="icon" type="image/png" href="{{asset('Cardio/assets/img/favicon.png')}}"> -->
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


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
   <script src="{{asset('Cardio/assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/equal-height.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/count-to.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/bootsnav.js')}}"></script>
    <script src="{{asset('Cardio/assets/js/main.js')}}"></script>
     
    {{-- fullcalender --}}

    @stack('scripts')

</body>


</html>