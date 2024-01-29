<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Healthonier Appointment Booking App - Login</title>
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

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('doctordata/fevicon/1694077413.png')}}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="{{ asset('assests/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assests/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link href="{{ asset('assests/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <main>
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('assests/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assests/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assests/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assests//vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assests/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assests/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assests/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assests/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assests/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->

    <script src="{{ asset('assests/js/main.js') }}"></script>
</body>
</html>
