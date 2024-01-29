<section id="about" class="about-wrap style3 ptb-100">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img-wrap" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <img class="about-img-one" src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Eyecare/assets/img/about/about-img-4.jpg') }} @endif" alt="Image">
                    <div class="about-img-two">
                        <img src="{{asset('Eyecare/assets/img/about/about-img-5.jpg')}}" alt="Image">
                    </div>
                    <div class="about-promo-text">
                        <h5><span>@if($data) {{$data->experience != '' ? $data->experience	  : '4yr Experiences ' }} @endif</span> Years Of Experience</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="content-title style3">
                        <span>About Us</span>
                        <h2>Dr. @if($data){{$data->doctor_name != '' ? $data->doctor_name: 'Ken Moris ' }}@endif</h2>
                        <p>@if($data) {{$data->about != '' ? $data->about	  : '  Dr. Ken Moris completed his post graduation in masters of dental surgery MDS in the
                            field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental
                            College, Davangere, a Karnataka, India. He is now serving as professor and HOD in
                            the department of   care.' }} @endif
                        </p>
                    </div>
                    <div class="feature-item-wrap">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="flaticon-professional"></i>
                            </div>
                            <div class="feature-text">
                                <h5> Doctors Speciality</h5>
                                <p>@if($data) {{$data->name != '' ? $data->name	  : 'Eye Care ' }} @endif </p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="flaticon-stethoscope"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Doctor Degree</h5>
                                <p>@if($data) {{$data->degree != '' ? $data->degree	  : 'MBBS ' }} @endif</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
