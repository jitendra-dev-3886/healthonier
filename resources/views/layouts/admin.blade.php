<!DOCTYPE html>
<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Healthonier - Admin</title>

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



    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">





    <!-- Template Main CSS File -->



    <link href="{{ asset('assests/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assests/css/time.css') }}" rel="stylesheet">

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- Scripts -->

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}



    <!-- CSRF Token -->

    <!-- Add this in the <head> section -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .nav-item.active .nav-link.collapsed {
            background-color: #b6f0df;
        }

    </style>

</head>

<body>

    @include('layouts.nav')

    @include('layouts.sidebar')









    <main id="main" class="main">

        @yield('content')

    </main>

    </div>



    <!-- ======= Footer ======= -->

    <footer id="footer" class="footer">

        <div class="copyright">

            &copy; Copyright <strong><span> Healthonier </span></strong>. All Rights Reserved

        </div>

        <div class="credits">

            Designed by <a href="https://xoniertechnologies.com/">Xonier Technologies</a>

        </div>

    </footer><!-- End Footer -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Add this in the <head> section of your layout file -->



    <script>
        // Get the current URL path
        var currentPath = window.location.pathname;

        // Find all the nav links
        var navLinks = document.querySelectorAll('.nav-link');

        // Loop through the nav links
        navLinks.forEach(function(link) {
            var linkHref = link.getAttribute('href');

            // Check if the current URL path matches the link's href, considering the base URL
            if (currentPath === new URL(linkHref, window.location.origin).pathname) {
                link.parentNode.classList.add('active');

            }
        });
        $(document).ready(function() {
            $('#status_dropdown').change(function() {

                var statusId = $(this).val();

                $.ajax({
                    url: '/doctor-status', // URL to update doctor status
                    type: 'POST'
                    , data: {
                        status_id: statusId
                        , _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        alert('Doctor Status Updated!');
                        console.log(response);
                    }
                });
            });
        });

        function showBrowserNotification(title, options) {
            if (!("Notification" in window)) {
                alert("This browser does not support system notifications");
            } else if (Notification.permission === "granted") {
                new Notification(title, options);
            } else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(function(permission) {
                    if (permission === "granted") {
                        new Notification(title, options);
                    }
                });
            }
        }

    </script>


    <script src="{{ asset('assests/vendor/apexcharts/apexcharts.min.js') }}"></script>

    {{-- <script src="{{ asset('assests/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <script src="{{ asset('assests/vendor/chart.js/chart.umd.js') }}"></script>

    <script src="{{ asset('assests//vendor/echarts/echarts.min.js') }}"></script>

    <script src="{{ asset('assests/vendor/quill/quill.min.js') }}"></script>

    {{-- <script src="{{ asset('assests/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}

    <script src="{{ asset('assests/vendor/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('assests/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('assests/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}


    <!-- Template Main JS File -->



    <script src="{{ asset('assests/js/main.js') }}"></script>

    <!-- Add this just before the closing </body> tag -->

    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.js"></script>




    <script src="{{ asset('assests/js/timepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @stack('scripts')
</body>

</html>
