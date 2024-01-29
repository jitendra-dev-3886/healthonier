  <!-- main header -->
  <header class="main-header style-one">

<!-- header-lower -->
<div class="header-lower">
    <div class="auto-container">
        <div class="outer-box">
            <div class="bg-color"></div>
            <div class="logo-box">
                <div class="pattern" style="background-image: url({{asset('Chiroprator/assets/images/shape/shape-1.png')}});"></div>

                <figure class="logo"><a href="#"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif" alt=""></a>
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
            <div class="bg-color"></div>
            <div class="logo-box">
                <figure class="logo">
                    <a href="#"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Dentiest/assets/images/logo-light.png')}} @endif" alt=""></a>
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
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
<div class="menu-backdrop"></div>
<div class="close-btn"><i class="fas fa-times"></i></div>

<nav class="menu-box">
    <div class="nav-logo"><a href="#"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Dentiest/assets/images/logo-light.png')}} @endif" alt="" title=""></a></div>
    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
    </div>
    <div class="contact-info">
        <h4>Contact Info</h4>
        <ul>
            <li>India</li>
            <li><a href="tel:+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif">@if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif</a></li>
            <li><a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@doctorconsultingapp.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@doctorconsultingapp.com'}} @endif</a></li>
        </ul>
    </div>
    <div class="social-links">
        <ul class="clearfix">
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
        </ul>
    </div>
</nav>
</div><!-- End Mobile Menu -->
