<!-- banner-section -->
<section class="bg-gradient overflow-hidden home-section" id="home">

    <div class="waves-bg home-bg">

        <div class="container">

            <div class="owl-carousel owl-theme home-slider">

                <div class="item">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <div class="content-fadeInUp">
                                @if(isset($data) && $data->doctor_name != '')
                                <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                                    Dr.
                                    <?php echo $data->doctor_name ?>
                                </h4>
                                @else
                                <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                                @endif

                                <h1 class="text-white sub-title">@if($data) {{$data->sub_heading != '' ?
                                    $data->sub_heading : 'Best Care & Better Doctor' }} @endif</h1>

                                <p class="para-sec">
                                    @if($data) {{$data->short_desc != '' ? $data->short_desc : 'Better health care with
                                    efficient cost is the main focuse of our hospital.' }} @endif


                                </p>

                                <div class="learn-more">

                                    <a href="#appointment" class="btn btn-white btn-rounded text-white">Book Appointment</a>

                                </div>


                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="img-fadeInRight">

                                <img src="<?php echo $data->doctor_banner_path ? asset($data->doctor_banner_path) : asset('Ent/assets/images/slider-img/banner-img-01.png'); ?>"
                                    class="img-fluid" alt="">

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

        <div class="hero-waves">

            <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave">

                <defs></defs>

                <path id="wave1" d="" />

            </svg>

            <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave">

                <defs></defs>

                <path id="wave2" d="" />

            </svg>

        </div>

    </div>

</section>

<!-- banner-section end -->