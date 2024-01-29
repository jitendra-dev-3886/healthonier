   <!-- banner-section -->
   <section class="banner-section centred style-three"
         style="background-image: url(<?php echo $data->doctor_background_banner_path ? asset($data->doctor_background_banner_path) :  asset('Chiropractor/assets/assets/images/banner/banner-bg-1.jpg'); ?>);">

            <div class="auto-container">
                <div class="col-md-6">
                    <div class="content-box text-left">
                        @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif
                        @if(isset($data) && $data->sub_heading != '')
                        <h1> <?php echo $data->sub_heading ?></h1>
                         @else
     
                         <h2>Welcome to <span>Clinic</span></h2>
                         @endif
                    <p> @if($data) {{$data->short_desc != '' ? $data->short_desc : 'We Provide All Health Care Solution "Protect Your Health And Take Care To Of Your Health' }} @endif
                    </p>
                        <div class="form-inner">
                            <a href="callto:+919999999999" class="theme-btn-three mb-2">Call now<i
                                    class="icon-Arrow-Right"></i></a>
                            <a href="#appointment" class="theme-btn-three">Book appointment <i
                                    class="icon-Arrow-Right"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->

