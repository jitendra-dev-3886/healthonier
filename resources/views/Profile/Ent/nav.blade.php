<!-- main header -->
<nav class="navbar navbar-expand-lg fixed-top custom-nav sticky">

    <div class="container">

        <!-- LOGO -->
        <div class="bg-color"></div>

        <a class="navbar-brand brand-logo mr-4" href="#">

            <img src=@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif" class="img-fluid logo-light" alt="">

            <img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif"
                class="img-fluid logo-dark" alt="">

        </a>

        <div class="navbar-collapse collapse justify-content-center" id="navbarCollapse">

            <ul class="navbar-nav navbar-center" id="mySidenav">

                <li class="nav-item active">

                    <a href="#home" class="nav-link">Home</a>

                </li>


                <li class="nav-item">

                    <a href="#aboutus" class="nav-link">About Us</a>

                </li>

                <li class="nav-item">

                    <a href="#appointment" class="nav-link">Appointment</a>

                </li>

                <li class="nav-item">

                    <a href="#working" class="nav-link">Working Hours</a>

                </li>

                <li class="nav-item">

                    <a href="#testimonial" class="nav-link">Testimonials</a>

                </li>

                <li class="nav-item">

                    <a href="#contact" class="nav-link">Contact Us</a>

                </li>

            </ul>

        </div>



    </div>

</nav>