<section class="about-section" id="about">
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                <div class="image_block_1 d-none d-lg-block">
                    <div class="image-box">
                        <div class="pattern">
                            <div class="pattern-1" style="background-image: url({{ asset('Pediatrics/assets/images/shape/shape-15.png') }});"></div>
                            <div class="pattern-2"></div>
                            <div class="pattern-3" style="background-image: url({{ asset('Pediatrics/assets/images/shape/shape-16.png') }});"></div>
                        </div>
                        <div class="">
                            <div class="author-info mt-4">
                                <figure class="author-thumb"><img src="{{ asset('Pediatrics/assets/images/icons/icon-3.png/') }}" alt="">
                                </figure>
                                <h3> Doctor Speciality </h3>
                                <span class="designation"> @if($data) {{$data->name != '' ? $data->name	  : 'None' }} @endif </span>
                            </div>
                            <div class="author-info mt-4">
                                <figure class="author-thumb"><img src="{{ asset('Pediatrics/assets/images/icons/icon-10.png') }}" alt="">
                                </figure>
                                <h3> Doctor Degrees </h3>
                                <span class="designation">@if($data) {{$data->degree != '' ? $data->degree	  : 'None' }} @endif </span>
                            </div>
                            <div class="author-info mt-4">
                                <figure class="author-thumb"><img src="{{ asset('Pediatrics/assets/images/icons/icon-1.png') }}" alt="">
                                </figure>
                                <h3>Doctor Experience </h3>
                                <span class="designation"> @if($data) {{$data->experience != '' ? $data->experience	  : 'None' }} @endif

                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <div class="sec-title">
                            <p>About Me</p>
                            <h2>Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : 'None' }} @endif</h2>
                        </div>
                        <div class="text">
                            <p>
                                @if($data) {{$data->about != '' ? $data->about	  : 'None' }} @endif

                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 image-column">
                <img src="{{ asset('Pediatrics/assets/images/doctor.png') }}" class="img-fluid" alt="">


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
