<section class="appointment-section bg-color-3" id="appointment">

    <div class="auto-container">

        <div class="clearfix">

            <div class="content-side">

                <div class="clinic-details-content doctor-details-content">

                    <div class="row">

                        <div class="col-md-12"> 
                        </div>

                    </div>

                    <div id="button-container">

                        <div class="cto">



                            <div class="row">

                                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                                    <div class="appointment-time">

                                        <div class="team-block">

                                            <div class="team-block-three">

                                                <div class="inner-box">

                                                    <figure class="image-box">

                                                        <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path) : asset('profile/assets/images/team/team-6.jpg')}} @endif" alt="">

                                                    </figure>

                                                    <div class="lower-content">

                                                        <ul class="name-box clearfix">

                                                            <li class="name">

                                                                <h3><a href="#">Dr. @if($data) {{$data->doctor_name !=

                                                                        '' ? $data->doctor_name : 'None' }} @endif</a>

                                                                </h3>

                                                            </li>

                                                            <li><i class="icon-Trust-1"></i></li>

                                                            <li><i class="icon-Trust-2"></i></li>

                                                        </ul>

                                                        <span class="designation">BDS, MDS - Oral &amp;

                                                            Maxillofacial Surgery</span>



                                                        <div class="location-box">

                                                            <p><i class="fas fa-map-marker-alt"></i>Noida, Uttar

                                                                Pradesh</p>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <input type="hidden" name="doctorid" value="{{$data->user_id}}" id="doctorid">

                                <div class="row">

                                    <div class="col-lg-6 col-md-12 col-sm-12 sidebar-side">
                                     <div class="doctors-sidebar">

                                            <div class="form-widget">

                                                <div class="title-box">

                                                    <h3>Select Date </h3>

                                                </div>

                                                <div class="form-inner">

 
                                        <div id="calendar"></div>


                                                </div> 
                                            </div>





                                        </div>




                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 sidebar-side">

                                        <div class="doctors-sidebar">

                                            <div class="form-widget">

                                                <div class="title-box">

                                                    <h3>Select Time</h3>

                                                </div>

                                                <div class="form-inner">



                                                    <div class="appointment-time">

                                                        <div class="php-email-form">

                                                            <h3>Location </h3>

                                                            <div id="radioButtonsDiv">

                                                                

                                                            </div>

                                             <div class="card location border">
                                            <div class="card-body">
                                                <p>Please Select Your Date To Book Your appointment</p>
                                            </div>
                                        </div>

                                                                <button style="display:none" type="button" class="btn btn-danger" id="nobooking">Booking Is Not Available</button>



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









                            </div>

                        </div>





                        
                        <div id="content2" class="hidden-content">

                            <form id="book">

                                @csrf

                                <div class="row mt-4">

                                    <div class="col-lg-8 col-md-12 col-sm-12 left-column">

                                        <div class="appointment-information">

                                            <div class="title-box">

                                                <h3> Appointment Information</h3>

                                            </div>

                                            <div class="inner-box">

                                                <div class="information-form">





                                                    <div class="row clearfix">

                                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                                            <label>Your name</label>

                                                            <input type="text" name="name" placeholder="Enter your name" required="">

                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                                            <label>Your email</label>

                                                            <input type="email" name="email" placeholder="Enter your email" required="">

                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                                            <label>Your number</label>

                                                            <input type="number" name="number" placeholder="Enter your number" required="">

                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                                            <label>Your age</label>

                                                            <input type="date" name="age" placeholder="" required="">

                                                        </div>



                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                                            <label>Note to the doctor (optional)</label>

                                                            <textarea name="note" placeholder="Write your not..."></textarea>

                                                        </div>

                                                    </div>

                                                    {{-- <button type="submit" class="btn btn-primary">Submit</button>

                                                    --}}

                                                </div>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-4 col-md-12 col-sm-12 right-column">

                                        <div class="booking-information">

                                            <div class="title-box">

                                                <h3>Booking Summary</h3>

                                            </div>

                                            <div class="inner-box">

                                                <div class="single-box">

                                                    <ul class="clearfix">

                                                        <li>Date:<input type="text" class="form-control" value="" id="bookingdate" name="amount" readonly></li>

                                                        <li>Venue:<input type="text" class="form-control" value="" id="venue" name="amount" readonly></li>

                                                    </ul>

                                                </div>

                                                <div class="single-box">

                                                    <ul class="clearfix">

                                                        <li>General Consultation <input type="text" class="form-control" value="" id="amount" name="amount" readonly></li>

                                                        {{-- <input type="text" class="form-control" value=""

                                                            id="amount" name="amount"> --}}

                                                        {{-- <li>General Consultation<span>₹500</span></li> --}}



                                                    </ul>

                                                </div>



                                            </div>

                                            <div class="btn-box">

                                                {{-- <a data-toggle="modal" data-target="#exampleModal" class="theme-btn-one">Offline Payment <i class="icon-Arrow-Right"></i></a> --}}

                                                {{-- <a href="#" class="theme-btn-three btn-block mt-2">Want to Pay

                                                    Online<i class="icon-Arrow-Right"></i></a>

                                                <input type="text" class="form-control" id="amount" name="amount"> --}}

                                                <button type="submit" class="theme-btn-three btn-block mt-2">Book<i class="icon-Arrow-Right"></i></button>
                                               {{-- <a style="display:none" class="theme-btn" id="offlinepay">Offline Pay<i class="fas fa-long-arrow-alt-right"></i></a> --}}
                                                {{-- <button style="display:none" id="rzp-button" class="theme-btn-three btn-block mt-2">Want to Pay

                                                    Online<i class="icon-Arrow-Right"></i></button> --}}

                                                    <button style="display:none" id="rzp-button" class="theme-btn-three btn-block mt-2" >Online pay<i class="icon-Arrow-Right"></i></button>
                                                    <a style="display:none" class="theme-btn-three btn-block mt-2" id="offlinepay">Offline Pay<i class="fas fa-long-arrow-alt-right"></i></a>
                                                   





                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>







                    </div>

                </div>

            </div>



        </div>

    </div>

</section>

