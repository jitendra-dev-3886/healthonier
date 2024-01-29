<!-- banner-section -->
<section id="hero" class="hero-wrap style3 bg-f">
    <div class="container-fluid">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-5">
                <div class="hero-content">
                    @if(isset($data) && $data->doctor_name != '')
                    <h4>
                        Dr
                        <?php echo $data->doctor_name ?>
                    </h4>
                    @else
                    <h4>Dr. Puneet Verma</h4>
                    @endif
                    <h1>@if($data) {{$data->sub_heading != '' ?
                        $data->sub_heading : 'Best Care & Better Doctor' }} @endif</h1>
                    <!-- <h1>Welcome to <span> Message</span> Cinic</h1> -->
                    <p> @if($data) {{$data->short_desc != '' ? $data->short_desc : 'Better health care with
                        efficient cost is the main focuse of our hospital.' }} @endif</p>
                    <div class="hero-btn">
                        <a href="#appointment" class="btn style2"><i class="ri-calendar-check-fill"></i> Book An
                            Appointment</a>
                        <a href="" class="btn style4"><i class="ri-cellphone-line"></i>Call Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">


                <div style="background-image: url(@if($data){{$data->doctor_banner_path != ''? asset($data->doctor_banner_path):asset('Massage/assets/img/hero/hero-img-7.png')}} @endif);" class="hero-img-wrap hero-bg-7 bg-f" data-aos="fade-left" data-aos-duration="1200"
                    data-aos-delay="200">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- banner-section end -->