<!-- Start About
    ============================================= -->
<div class="about-area default-padding pb-5" id="about">
    <div class="container">
        <div class="row">
            <div class="about-items">
                <div class="col-md-6 inc-video">
                    <div class="thumb">
                        <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Physiotherapis/assets/img/gallery/66.jpg') }} @endif" alt="Thumb">
                    </div>
                </div>
                <div class="col-md-6 info">
                    <h4>About Us</h4>
                    <h2>Dr.@if($data){{$data->doctor_name != '' ? $data->doctor_name: 'Ken Moris ' }}@endif</h2>
                    @if($data) {{$data->about != '' ? $data->about	  : '  Dr. Ken Moris completed his post graduation in masters of dental surgery MDS in the
                            field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental
                            College, Davangere, a Karnataka, India. He is now serving as professor and HOD in
                            the department of eye care.' }} @endif
                    <div class="bottom">
                        <div class="video">
                            <a href="https://clinic.xonierconnect.com/physiotherapist/assets/img/demo.mp4" class="popup-youtube relative theme video-play-button item-center">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <div class="content">
                            <h4>Let’s see our intro video</h4>
                            <p>
                                If your smile is not becoming to you, then you should be coming to me!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="services-area inc-icon less-info default-padding bottom-less pt-0">
    <div class="container">
        <div class="row">
            <div class="services-items text-center">
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <a href="#">
                            <i class="flaticon-doctor-1"></i>
                            <h4>Doctor Specialist</h4>
                            <p>@if($data) {{$data->name != '' ? $data->name	  : 'Physiotherapist ' }} @endif </p>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <a href="#">
                            <i class="flaticon-department"></i>
                            <h4>Doctor Degrees</h4>
                            <p>@if($data) {{$data->degree != '' ? $data->degree	  : 'MBBS ' }} @endif</p>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <a href="#">
                            <i class="flaticon-recovered"></i>
                            <h4>Experiences</h4>
                            <p>@if($data) {{$data->experience != '' ? $data->experience	  : '4yr Experiences ' }} @endif</p>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->


            </div>
        </div>
    </div>
</div>
<!-- End About -->
