<section class="banner-section" id="home">
    <div class="shape"></div>
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-block"> 
                    @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #f5f5f5; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #f5f5f5; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif
                    @if(isset($data) && $data->sub_heading != '')
                   <h2> <?php echo $data->sub_heading ?></h2>
                    @else

                    <h2>Welcome to <span> Dental Clinic</span></h2>
                    @endif


                    {{-- <h2>Welcome to <br> @if($data) {{$data->sub_heading != '' ? $data->sub_heading : ' Dental
                        Clinic.' }} @endif</h2> --}}

                    <p> @if($data) {{$data->short_desc != '' ? $data->short_desc : 'At Dental Clinic we have
                        petient-centered attitude that results in healthy, beautiful, long lasting smiles!' }} @endif
                    </p>
                </div>
                <div class="link-btn"><a href="#appointment" class="theme-btn"> <i class="far fa-clipboard"></i>Book
                        Appointment</a></div>
            </div>
            <div class="col-lg-6">
                <div class="image-block">
                    <div class="shape-two" data-parallax='{"y": -50}'><img
                            src="{{ asset('Dentiest/assets/images/shape/shape-2.png')}}" alt=""></div>
                    <div class="shape-three" data-parallax='{"x": 100}'><img
                            src="{{asset('Dentiest/assets/images/shape/shape-10.png')}}" alt=""></div>
                    <div class="image" data-parallax='{"y": 100}'><img
                            src="@if($data) {{$data->doctor_banner_path != '' ? asset($data->doctor_banner_path) : asset('Dentiest/assets/images/resource/image-1.png')}} @endif"
                            alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>