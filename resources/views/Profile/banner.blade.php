<section class="banner-section style-two bg-color-1" id="home">

    <div class="bg-layer" style="background-image: url(@if($data) {{$data->doctor_banner_path != '' ? asset($data->doctor_banner_path) : asset('assets/images/banner/banner-bg-1.jpg')}} @endif);"></div>

    <div class="pattern">

        <div class="pattern-1" style="background-image: url({{ asset('profile/assets/images/shape/shape-32.png') }});"></div>

        <div class="pattern-2" style="background-image: url({{ asset('profile/assets/images/shape/shape-33.png') }});"></div>

        <div class="pattern-3" style="background-image: url({{ asset('profile/assets/images/shape/shape-34.png') }});"></div>

        <div class="pattern-4" style="background-image: url({{ asset('profile/assets/images/shape/shape-35.png') }});"></div>

    </div>

    <div class="auto-container">

        <div class="row clearfix">

            <div class="col-lg-6 col-md-12 col-sm-12 content-column">

                <div class="content-box">

                    <h1>Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : 'Doctor Name' }} @endif</h1>

                    <p> @if($data) {{$data->short_desc != '' ? $data->short_desc	  : 'We Provide All Health Care Solution "Protect Your Health And Take Care To Of Your

                        Health".' }} @endif

                    </p>

                    <div class="form-inner">

                        <a href="callto:+919999999999" class="theme-btn-one mb-2">Call now<i class="icon-Arrow-Right"></i></a>

                        <a href="#appointment" class="theme-btn-three">Book appointment <i class="icon-Arrow-Right"></i></a>



                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
