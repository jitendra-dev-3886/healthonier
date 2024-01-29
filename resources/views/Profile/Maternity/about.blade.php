 <!-- about section -->
 <section class="about-section bg2" id="about">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-md-6">
                        <img src="{{asset('Maternity/assets/images/banner/about.png')}}" class="img-fluid" alt="">

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box mr-50">
                                <div class="sec-title">
                                    <p class="text-white"> ABOUT ME </p>
                                    <h2 class="text-white">Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : ' Your Name' }} @endif</h2>
                                  
                                </div>
                                <div class="text">
                                    <p class="text-white">@if($data) {{$data->about != '' ? $data->about	  : '  Dr. David Ambrose completed his post graduation in masters of dental surgery MDS in the field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now serving as professor and HOD in the department of pediatric dentistry.' }} @endif</p>
                                </div>
                                <ul class="list-style-one clearfix ml-3">
                                    <div class="row">
                                        <li class="col-md-6">
                                            <div class="text-white">
                                                <h5 class="fw-bold text-white"> Speciality </h5>
                                                <span class="designation"> @if($data) {{$data->name != '' ? $data->name	  : ' Dentist' }} @endif </span>
                                            </div>

                                        </li>
                                        <li class="col-md-6">
                                            <div class="text-white">
                                                <h5 class="fw-bold text-white"> Degrees </h5>
                                                <span class="designation">@if($data) {{$data->degree != '' ? $data->degree	  : 'MBBS ' }} @endif</span>
                                            </div>

                                        </li>
                                    </div>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>


 