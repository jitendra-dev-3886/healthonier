<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
    <title>Healthonier</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('Healthonier/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{asset('Healthonier/assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Healthonier/assets/css/responsive.css')}}" rel="stylesheet">

</head>


<body>




    @yield('content')



    <!-- jequery plugins -->
    <script src="{{asset('Healthonier/assets/js/jquery.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/popper.min.js"')}}"></script>
    <script src=" {{asset('Healthonier/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/owl.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/wow.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/validation.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/appear.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/tilt.jquery.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('Healthonier/assets/js/jquery.nice-select.min.js')}}"></script>

    <!-- main-js -->
    <script src="{{asset('Healthonier/assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- fullcalender --}}
    {{-- <script>
        $(document).ready(function() {
            $('#contact-form').submit(function(event) {
                 alert('hi');
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: '{{ route('
                    contact.form ') }}'
    , type: 'POST'
    , data: formData
    , headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    , success: function(response) {
    Swal.fire({
    icon: 'success'
    , title: 'Enquire Send !'
    , text: response.message
    });
    $('#success-message').text(response.message).addClass('btn btn-success');
    $('#contact-form').trigger('reset');
    }
    , error: function(xhr, status, error) {

    }
    });
    });
    });

    </script> --}}
    @stack('scripts')

</body>


</html>
