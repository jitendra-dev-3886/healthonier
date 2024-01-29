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
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('Eyecare/assets/css/dark-theme.css')}}"> 
    {{-- <link rel="icon" type="image/png" href="{{asset('Eyecare/assets/img/favicon.png')}}"> --}}
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

</head>

<body data-bs-spy="scroll" data-bs-offset="120">




    @yield('content')





    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('Eyecare/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/aos.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/fancybox.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/tweenmax.min.js')}}"></script>
    <script src="{{asset('Eyecare/assets/js/main.js')}}"></script>
    {{-- fullcalender --}}
    @stack('scripts')

</body>


</html>