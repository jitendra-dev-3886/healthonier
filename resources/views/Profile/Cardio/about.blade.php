 <div class="about-area default-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="about-items">
                    <div class="col-md-6 inc-video">
                        <div class="thumb">
                            <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('../Cardio/assets/img/gallery/66.png') }} @endif" alt="Thumb">
                        </div>
                    </div>
                    <div class="col-md-6 info">
                         <span>About Us</span>
                        <h2>Dr. @if($data){{$data->doctor_name != '' ? $data->doctor_name: 'Ken Moris ' }}@endif</h2>
                        <p>@if($data) {{$data->about != '' ? $data->about	  : '  Dr. Ken Moris completed his post graduation in masters of dental surgery MDS in the
                            field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental
                            College, Davangere, a Karnataka, India. He is now serving as professor and HOD in
                            the department of   care.' }} @endif
                        </p>
                  
                        <div class="col-md-12 services-area inc-icon">
                            <div class="row">
                                <div class="services-items text-center">
                                    <!-- Single Item -->
                                    <div class="col-md-6 col-sm-6 equal-height">
                                        <div class="item">
                                            <a href="#">
                                                <i class="flaticon-doctor-1"></i>
                                                <h4>Doctor Speciality</h4>
                                                <p>@if($data) {{$data->name != '' ? $data->name	  : 'Cardio ' }} @endif  </p>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="col-md-6 col-sm-6 equal-height">
                                        <div class="item">
                                            <a href="#">
                                                <i class="flaticon-department"></i>
                                                <h4>Doctor Degree</h4>
                                                <p> @if($data) {{$data->degree != '' ? $data->degree	  : 'MBBS ' }} @endif</p>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                   
                                </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



 
