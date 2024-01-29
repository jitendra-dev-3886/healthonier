<section class="teacher_details_info section_padding" id="appointment">
    <div class="container bg-white p-5">
        <div class="row">
            <div class="col-lg-4 col-md-4 wow fadeInUp mt-4" data-wow-delay=".3s">
                <div class="profile_img pr-lg-3">
                    <img src="{{ asset('Childcare/assets/img/teacher_profile_img.png') }}" alt="#" class="img-fluid">
                    <img src="{{ asset('Childcare/assets/img/teacher_profile_shape.png') }}" alt="#" class="img-fluid teacher_profile_shape">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".5s">
                <div class="profile_content mt-5 mt-lg-0">
                    <input type="hidden" name="doctorid" value="{{$data->user_id}}" id="Id">
             

                    {{-- <ul class="teacher_profile_info">
                        <li>Child Specialist</li>
                        <li> <span>Experience:</span> 5 Years</li>
                        <li> <span>Email:</span> <a href="#">doctorconsulting@gmail.com</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> Noida , Uttar pradesh</li>

                    </ul> --}}

                    <div id="calendar"></div>
                   
                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".5s">
                <div class="profile_content mt-5 mt-lg-0">
                   
                    <div class="form-inner">
                        <div class="appointment-time">
                            <div class="php-email-form">
                                <h3>Location </h3>
                                <div id="radioButtonsDiv"></div>
                            <div class="card location">
                                            <div class="card-body">
                                                <p>Please Select The Date To Book Your appointment</p>
                                            </div>
                                        </div>
                                <button style="display:none" type="button" class="btn btn-danger" id="nobooking">Booking Is Not Available For Selected Date</button>
                            </div>
                        </div>
                        <div class="appointment-time">
                            <div id="timeslot"></div>
                        </div>

                    </div>
 
                </div>
            </div>
            
            
        </div>

    </div>
    <div class="teacher_details_animation_1">
        <div data-parallax="{&quot;x&quot;: 2, &quot;y&quot;: 120, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/story_animation_5.png') }}" alt="#">
        </div>
    </div>
    <div class="teacher_details_animation_2">
        <div data-parallax="{&quot;x&quot;: 10, &quot;y&quot;: 100, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/event_6.png') }}" alt="#">
        </div>
    </div>
    <div class="teacher_details_animation_3">
        <div data-parallax="{&quot;x&quot;: 30, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/icon_8.png') }}" alt="#">
        </div>
    </div>
    <div class="teacher_details_animation_4">
        <div data-parallax="{&quot;x&quot;: 5, &quot;y&quot;: 105, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/contact_icon.png') }}" alt="#"></div>
    </div>
    <div class="teacher_details_animation_5">
        <div data-parallax="{&quot;x&quot;: 8, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/story_animation_5.png') }}" alt="#">
        </div>
    </div>
    <div class="teacher_details_animation_6">
        <div data-parallax="{&quot;x&quot;: 8, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/icon_9.png') }}" alt="#">
        </div>
    </div>



    <!-- Start appointment Section -->
    <div class="Dglow " id="Dglow">
        <form id="book">

            @csrf
            <div class="st-height-b100 st-height-lg-b100"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                           <h2 class="kid_title mb-4 "> <span class="title_overlay_effect">Appointment Information</span></h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact_form form_style">
                         

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_single_item">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_single_item">
                                        <input type="number" name="number" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_single_item">
                                        <input type="email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_single_item">
                                        <input type="date" name="age" placeholder="" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form_single_item">
                                        <textarea name="note" placeholder="Write your not.."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-widget">
                            <div class="title-box">
                                <h3>Booking Summary</h3>
                            </div>
                            <div class="inner-box">
                                <div class="single-box">
                                    <ul class="">
                                        <li>Date :<input type="text" class="" value="" id="bookingdate" readonly></li>

                                        <li>Venue :<input type="text" class="" value="" id="venue"  readonly></li>

                                    </ul>
                                </div>
                                <div class="single-box">
                                    <ul class="">
                                        <li>General Consultation <input type="text" class="" value="" id="amount" name="amount" readonly></li>


                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="btn-dark btn-block mb-2">Book<i class="icon-Arrow-Right"></i></button>

                                    <button style="display:none" id="rzp-button" class="theme-btn-three btn-block mt-2">Want to Pay

                                        Online<i class="icon-Arrow-Right"></i></button>
                                        <button style="display:none" id="offlinepay" class="theme-btn-three btn-block mt-2">Want to Pay Offline<i class="icon-Arrow-Right"></i></button>
                                <!-- <button style="display:none"class="pc-button elementor-button button-link cu_btn btn-block" id="offlinepay">
                                    <div class="button-content-wrapper">
                                        <span class="elementor-button-text">Want to Pay Offline </span>
                                        <svg class="pc-dashes inner-dashed-border animated-dashes">
                                            <rect x="5px" y="5px" rx="22px" ry="22px" width="189.25" height="50"></rect>
                                        </svg>
                                    </div>
                                </button>  -->
                                    {{-- <div class="mt-3">
                                        <a href="#" class="cu_btn btn_2">Want To Pay Online</a>
                                    </div> --}}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="st-height-b100 st-height-lg-b100"></div>
            </div>
        </form>

    </div>
</section>
