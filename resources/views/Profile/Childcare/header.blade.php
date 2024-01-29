<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

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
    <!-- <link rel="icon" href="{{ asset('Childcare/assets/img/favicon.png') }}" type="image/png"> -->
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    <link rel="stylesheet" href="{{ asset('Childcare/assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/vendors/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/vendors/owl_carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ asset('Childcare/assets/css/style.css') }} " />
    {{-- //fullcalender --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

    <style>
        .image img {
        width: 100% !important;
    }
        </style>
</head>

<body>

    @yield('content')



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('Childcare/assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('Childcare/assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('Childcare/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('Childcare/assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('Childcare/assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('Childcare/assets/vendors/parallax/jquery.parallax-scroll.js') }}"></script>
    <script src="{{ asset('Childcare/assets/vendors/parallax/parallax.js') }}"></script>

    <script src="{{asset('Childcare/assets/vendors/wow/wow.min.js')}}"></script>

    <script src="{{ asset('Childcare/assets/vendors/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Childcare/assets/vendors/counter/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('Childcare/assets/vendors/isotop/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('Childcare/assets/vendors/isotop/isotope.pkgd.js') }}"></script>

    <script src="{{ asset('Childcare/assets/js/custom.js') }}"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
        integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
        data-cf-beacon='{"rayId":"7e7fda1e2b2c0e38","version":"2023.4.0","r":1,"b":1,"token":"327f02abe4ab496bb762653489d2ae1d","si":100}'
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- fullcalender --}}
    @stack('scripts')
  

</body>


</html>