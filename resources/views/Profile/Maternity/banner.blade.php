<!-- banner-section -->
<section class="banner-section style-three">

    <img src="{{ asset('Maternity/assets/images/banner/topright.png')}}" alt="" class="topright">

    <img src="{{ asset('Maternity/assets/images/banner/leftbottom.png')}}" alt="" class="leftbottom">

    <img src="{{ asset('Maternity/assets/images/banner/righ_bottom.png')}}" alt="" class="righ_bottom">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-6">
                <div class="content-box text-left pt-4">
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
                    <p> @if($data) {{$data->short_desc != '' ? $data->short_desc : 'We Provide All Health Care Solution
                        "Protect Your Health And Take Care To Of Your Health' }} @endif
                    </p>
                    <div class="form-inner">

                        <a href="#appointment" class="theme-btn-one">Book appointment <i
                                class="icon-Arrow-Right"></i></a>

                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <img src="<?php echo $data->doctor_banner_path ? asset($data->doctor_banner_path) : asset('Maternity/assets/images/banner/banner-image-1.png'); ?> "
                    class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<!-- banner-section end -->