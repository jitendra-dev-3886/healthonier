 <!-- about section -->
 
 <section class="about-section" id="about" style="background-image: url({{asset('Chiropractor/assets/images/banner/banner-bg-2.jpg')}});background-position:30% 16%;">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-md-6"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box mr-50">
                                <div class="sec-title">
                                    <p> ABOUT ME </p>
                                    <h2>Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : ' Your Name' }} @endif</h2>
                                </div>
                                <div class="text">
                                    <p>@if($data) {{$data->about != '' ? $data->about	  : '  Dr. David Ambrose completed his post graduation in masters of dental surgery MDS in the field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now serving as professor and HOD in the department of pediatric dentistry.' }} @endif</p>
                                </div>
                                <ul class="list-style-one clearfix">
                                    <div class="row">
                                        <li class="col-md-6">
                                            <div class="">
                                                <h5 class="fw-bold"> Speciality </h5>
                                                <span class="designation"> @if($data) {{$data->name != '' ? $data->name	  : ' Dentist' }} @endif </span>
                                            </div>

                                        </li>
                                        <li class="col-md-6">
                                            <div class="">
                                                <h5 class="fw-bold"> Degrees </h5>
                                                <span class="designation">@if($data) {{$data->degree != '' ? $data->degree	  : '4yr Experiences ' }} @endif</span>
                                            </div>

                                        </li>
                                        <li class="col-md-12 mt-4">
                                            <div class="">
                                                <h5 class="fw-bold"> Experience </h5>
                                                <span class="designation">@if($data) {{$data->experience != '' ? $data->experience	  : '4yr Experiences ' }} @endif
                                                </span>
                                            </div>

                                        </li>
                                    </div>
                                </ul>
                                <div class="btn-box"><a href="#" class="theme-btn-one">About Us<i
                                            class="icon-Arrow-Right"></i></a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="oceanview">
                <div class="ocean">
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>
            </div>
        </section>

 