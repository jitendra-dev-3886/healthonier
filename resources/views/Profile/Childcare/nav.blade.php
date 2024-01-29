<header class="header_part">

    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="bg-color"></div>
                        <a class="navbar-brand" href="#home"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('/doctordata/logo/1694002120.png')}} @endif" srcset="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif" alt="doctor consulting"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link dropdown-toggle active" href="#home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#appointment">Appointment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#working">Working Hours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#testimonial">Testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">contact</a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
