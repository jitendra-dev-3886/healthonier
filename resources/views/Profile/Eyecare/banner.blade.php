<section id="hero" class="hero-wrap style3 bg-f" style="background-image: linear-gradient(to right, #fff, #002856);">
        <div class="container-fluid">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-5">
                    <div class="hero-content">
                        @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif
                        @if(isset($data) && $data->sub_heading != '')
                       <h4 class="mb-3"> <?php echo $data->sub_heading ?></h4>
                        @else
                     
                        <h4>We bring their world into <span> Focus</span></h4>
                        @endif
                        <h6 class="mb-4"> @if($data) {{$data->short_desc != '' ? $data->short_desc	  : '  we are dedicated to preserving and enhancing your vision through exceptional eye care
                            services. Your eyesight is precious, and we are committed to providing you with the
                            highest standard of care to ensure optimal eye health.' }} @endif
                        .</h6>
                        <div class="hero-btn">
                            <a href="#appointment" class="btn style2"><i class="ri-calendar-check-fill"></i> Book An
                                Appointment</a>
                            <a href="#" class="btn style4"><i class="ri-cellphone-line"></i>Call Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div style="background-image: url(@if($data){{$data->doctor_banner_path != ''? asset($data->doctor_banner_path):asset('Eyecare/assets/img/hero/hero-img-7.png')}} @endif);"  class="hero-img-wrap bg-f" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    </div>
                </div>
            </div>
        </div>
    </section>
