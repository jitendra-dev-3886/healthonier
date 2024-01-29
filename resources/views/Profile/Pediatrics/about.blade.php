<section class="process-style-two bg-color-3 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-39.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-40.png);"></div>
                <div class="pattern-3" style="background-image: url(assets/images/shape/shape-41.png);"></div>
                <div class="pattern-4" style="background-image: url(assets/images/shape/shape-42.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <p>Process</p>
                    <h2>Appointment Process</h2>
                </div>
                <div class="inner-content">
                    <div class="arrow" style="background-image: url({{asset('Pediatrics/assets/images/icons/arrow-1.png)')}};"></div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 processing-block">
                            <div class="processing-block-two">
                                <div class="inner-box">
                                    <figure class="icon-box"><img src="{{asset('Pediatrics/assets/images/icons/icon-9.png')}}" alt=""></figure>
                                    <h3>Choose Doctor's clinic Appointment location.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 processing-block">
                            <div class="processing-block-two">
                                <div class="inner-box">
                                    <figure class="icon-box"><img src="{{asset('Pediatrics/assets/images/icons/icon-10.png')}}" alt=""></figure>
                                    <h3>Patient Information
                                        Fill-ups</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 processing-block">
                            <div class="processing-block-two">
                                <div class="inner-box">
                                    <figure class="icon-box"><img src="{{asset('Pediatrics/assets/images/icons/icon-11.png')}}" alt=""></figure>
                                    <h3>Pay Fees and Consult your Doctor .</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

   <section class="about-section" id="about">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                 
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box mr-50">
                                <div class="sec-title">
                                    <p>  ABOUT ME </p>
                                 <h2 class="">Dr. @if($data){{$data->doctor_name != '' ? $data->doctor_name: 'Ken Moris ' }}@endif</h2>
                                </div>
                                <div class="text">
                               
                        <p>@if($data) {{$data->about != '' ? $data->about	  : '  Dr. Ken Moris completed his post graduation in masters of dental surgery MDS in the
                            field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental
                            College, Davangere, a Karnataka, India. He is now serving as professor and HOD in
                            the department of   care.' }} @endif
                        </p>
                                </div>
                                <ul class="list-style-one clearfix">
                                    <div class="row"> 
                                    <li class="col-md-6">  
                                        <div class="">                                        
                                            <h5 class="fw-bold">  Speciality </h5>
                                            <span class="designation">@if($data) {{$data->name != '' ? $data->name	  : 'Cardio ' }} @endif  </span>
                                        </div>

                                    </li>
                                    <li class="col-md-6">  
                                        <div class="">                                        
                                            <h5 class="fw-bold"> Degrees </h5>
                                            <span class="designation"> @if($data) {{$data->degree != '' ? $data->degree	  : 'MBBS ' }} @endif </span>
                                        </div>

                                    </li>
                                    <li class="col-md-12 mt-4">  
                                        <div class="">                  
                                        <h5 class="fw-bold"> Experience </h5>
                                            <span class="designation">@if($data) {{$data->experience != '' ? $data->degree	  : '4 years  ' }} @endif 
                                            </span>
                                        </div>

                                    </li>
                                </div>
                                </ul>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column d-none d-lg-block">
                        <div class="image_block_3">
                            <div class="image-box">
                                <div class="pattern">
                                    <div class="pattern-1" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-49.png')}};"></div>
                                    <div class="pattern-2" style="background-image: url(assets/images/shape/shape-50.png);"></div>
                                    <div class="pattern-3"></div>
                                </div> 
                                
                                <figure class="image image-1 paroller"><img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('../Pediatrics/assets/images/resource/about-3.jpg') }} @endif" alt=""></figure>
                                
                                <figure class="image image-2 paroller-2"><img src="{{asset('Pediatrics/assets/images/resource/about-3.jpg')}}" alt=""></figure>
                                <div class="image-content">
                                    <figure class="icon-box"><img src="{{asset('Pediatrics/assets/images/icons/icon-8.png')}}" alt=""></figure>
                                    <span>Appointment With</span>
                                    <h4>Specialist</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="oceanview">
                <div class="ocean">
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>
            </div>
        </section>




 
