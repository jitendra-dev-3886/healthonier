<!-- about section -->
<section id="aboutus" class="aboutus about-area section inverse-bg active default-padding" style="background-image: url({{asset('Mental/assets/img/news-letter-bg.png')}});background-position: bottom;background-repeat: no-repeat;">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="mb-30 animated slideInLeft">

                    <div class="section-title mb-4 info ">

                        <h4 class="sub-title">About us</h4>

                        <h2>Dr.@if($data) {{$data->doctor_name != '' ? $data->doctor_name : ' Your Name' }} @endif</h2>

                        <p>@if($data) {{$data->about != '' ? $data->about : ' Dr. David Ambrose completed his post
                            graduation in masters of dental surgery MDS in the field of Pedodontics and preventive
                            dentistry, from the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now
                            serving as professor and HOD in the department of pediatric dentistry.' }} @endif</p>

                    </div>

                    <div class="icon-boxes ">

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="flaticon-doctor"></i></div>

                            <div class="ml-75">

                                <h4 class="title">Doctor Specialist</h4>

                                <p class="description">@if($data) {{$data->name != '' ? $data->name : ' Mental HeaLth'
                                    }} @endif</p>

                            </div>

                        </div>

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="flaticon-doctor-1"></i></div>

                            <div class="ml-75">

                                <h4 class="title">Doctor Experiences</h4>

                                <p class="description">@if($data) {{$data->experience != '' ? $data->experience : '30+ year Experiences'
                                    }} @endif</p>

                            </div>

                        </div>

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="flaticon-department"></i></div>

                            <div class="ml-75">

                                <h4 class="title">Doctor Degree</h4>

                                <p class="description">@if($data) {{$data->degree != '' ? $data->degree : 'MBBS, Mental Health Department'
                                    }} @endif </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="thumb effect-box">
                    <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Mental/assets/img/gallery/33.jpg') }} @endif" alt="Thumb">
                </div>

            </div>

        </div>

    </div>

</section>
