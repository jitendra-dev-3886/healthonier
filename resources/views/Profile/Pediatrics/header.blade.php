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
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{asset('Pediatrics/assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/color.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Pediatrics/assets/css/calender.css')}}">
    <link href="{{asset('Pediatrics/assets/css/timePicker.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Pediatrics/assets/css/responsive.css')}}" rel="stylesheet">

    <!-- <link rel="icon" type="image/png" href="{{asset('Pediatrics/assets/images/favicon.png')}}"> -->
    <link rel="icon" href=" @if($data) {{$data->fevicon_path != '' ? asset($data->fevicon_path)	  : asset('Childcare/assets/img/favicon.png') }} @endif" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body data-bs-spy="scroll" data-bs-offset="120">




    @yield('content')





    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

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
        }

    </script>
    <!-- jequery plugins -->
    <script src="{{asset('Pediatrics/assets/js/jquery.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/owl.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/wow.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/validation.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/appear.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/tilt.jquery.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{asset('Pediatrics/assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('Pediatrics/assets/js/pagenav.js')}}"></script>

    <script src="{{asset('Pediatrics/assets/js/timePicker.js')}}"></script>

    <script src="{{asset('Pediatrics/assets/js/jquery-ui.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('Pediatrics/assets/js/script.js')}}"></script>

    <script src="{{asset('Pediatrics/assets/js/calendar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js')}}/2.29.1/moment.min.js"></script>

    @stack('scripts')



</body>


</html>