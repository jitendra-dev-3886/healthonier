<header class="main-header style-one">



    <!-- header-lower -->

    <div class="header-lower">

        <div class="auto-container">

            <div class="outer-box">

                <div class="logo-box">

                    <div class="pattern" style="background-image: url({{ asset('Pediatrics/assets/images/shape/shape-1.png') }});"></div>

                    <div class="bg-color"></div>

                    <figure class="logo"><a href="#home"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif" alt=""></a>

                    </figure>

                </div>

                <div class="menu-area">

                    <!--Mobile Navigation Toggler-->

                    <div class="mobile-nav-toggler">

                        <i class="icon-bar"></i>

                        <i class="icon-bar"></i>

                        <i class="icon-bar"></i>

                    </div>

                    <nav class="main-menu navbar-expand-md navbar-light">

                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">

                            <ul class="navigation scroll-nav clearfix">

                                <li class="#home">

                                    <a href="#home">Home</a>



                                </li>

                                <li><a href="#about">About</a></li>

                                <li><a href="#appointment">Appointment</a></li>

                                <li><a href="#team">Working hours</a></li>

                                <li><a href="#testimonial">Testimonials</a></li>

                                <li><a href="#contact">Contact</a></li>



                            </ul>

                        </div>

                    </nav>

                </div>



            </div>

        </div>

    </div>



    <!--sticky Header-->

    <div class="sticky-header">

        <div class="auto-container">

            <div class="outer-box">

                <div class="logo-box">

                    <div class="bg-color"></div>

                    <figure class="logo">

                        <a href="#home"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Pediatrics/assets/images/logo.png')}} @endif" alt=""></a>

                    </figure>

                </div>

                <div class="menu-area">

                    <nav class="main-menu clearfix">

                        <!--Keep This Empty / Menu will come through Javascript-->

                    </nav>

                </div>



            </div>

        </div>

    </div>

</header>

