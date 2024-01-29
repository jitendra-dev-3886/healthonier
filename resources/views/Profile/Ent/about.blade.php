<!-- about section -->
<section id="aboutus" class="aboutus section ">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="mb-30">

                    <div class="section-title mb-4">

                        <h4 class="sub-title">About us</h4>

                        <h1>Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name : ' Your Name' }} @endif</h1>

                        <p>@if($data) {{$data->about != '' ? $data->about : ' Dr. David Ambrose completed his post
                            graduation in masters of dental surgery MDS in the field of Pedodontics and preventive
                            dentistry, from the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now
                            serving as professor and HOD in the department of pediatric dentistry.' }} @endif</p>





                    </div>

                    <div class="icon-boxes">

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="icofont-users-alt-2"></i></div>

                            <div class="ml-4">

                                <h4 class="title">Doctor Speciality</h4>

                                <p class="description">ENT Specialist</p>

                            </div>

                        </div>

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="icofont-checked"></i></div>

                            <div class="ml-4">

                                <h4 class="title">Doctor Degrees</h4>

                                <p class="description"> @if($data) {{$data->degree != '' ? $data->degree : ' MBBS, ENT'
                                    }} @endif </p>

                            </div>

                        </div>

                        <div class="aboutus-icon-box d-flex align-items-start">

                            <div class="icon"><i class="icofont-excavator"></i></div>

                            <div class="ml-4">

                                <h4 class="title">Doctor Experience</h4>

                                <p class="description">@if($data) {{$data->experience != '' ? $data->experience : '4yr
                                    Experiences ' }} @endif</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Ent/assets/images/aboutus/about-doc-img.jpg') }} @endif" alt="" class="w-100 mb-30">

            </div>

        </div>

    </div>

</section>