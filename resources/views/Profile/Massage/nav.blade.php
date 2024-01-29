<!-- main header -->
<header class="header-wrap style3">
    <div class="container">
        <div class="header-bottom">
            <nav class="navbar navbar-expand-lg navbar-light header-sticky">
                <a class="navbar-brand" href="#"><img
                        src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif"
                        alt="Image"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="#hero">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#appointment">Appointment</a></li>
                        <li class="nav-item"><a class="nav-link" href="#working">Working Hours</a></li>
                        <li class="nav-item"><a class="nav-link" href="#testimonial">Testimonials</a></li>

                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="search-area">
        <div class="container">
            <button type="button" class="close-searchbox">
                <i class="ri-close-line"></i>
            </button>
            <form action="#">
                <div class="form-group">
                    <input type="search" placeholder="Search Here" autofocus>
                </div>
            </form>
        </div>
    </div>
</header>