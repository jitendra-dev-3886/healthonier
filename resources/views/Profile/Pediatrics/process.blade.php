  <section class="appointment-section process-style-two bg-color-3" id="appointment">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-39.png')}});"></div>
                <div class="pattern-2" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-40.png')}});"></div>
                <div class="pattern-3" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-41.png')}});"></div>
                <div class="pattern-4" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-42.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="clearfix">
                    <div class="content-side">
                        <div class="clinic-details-content doctor-details-content">
                       
                            <div id="button-container">
                                <div class="cto">  

                                    <div class="row"> 
                                        <div class="col-lg-8 col-md-12 col-sm-12 sidebar-side">
                                            <div class="doctors-sidebar">
                                                <div class="form-widget">
                                                    <div class="title-box">
                                                        <h3> Select Date</h3>
                                                    </div>
                                                    <div class="form-inner">
                                                        <div class="appointment-time  p-0">
                                                            <div id="calendarContainer"></div>
                                                            <div id="organizerContainer" style="display: none;"></div>
                                                        </div>

                                                    </div>


                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                                            <div class="doctors-sidebar">
                                                <div class="form-widget">
                                                    <div class="title-box">
                                                        <h3>Select Time</h3>
                                                    </div>
                                                    <div class="form-inner">

                                                        <div class="appointment-time">
                                                            <div class="php-email-form">
                                                                <h3>Location </h3>
                                                                <label>
                                                                    <input type="radio" name="radio" checked="">
                                                                    <span>Noida</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="radio">
                                                                    <span>Delhi</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="radio">
                                                                    <span>Gurgaon</span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="appointment-time">
                                                            <div>
                                                                <button id="original-button"
                                                                    class="btn btn-outline-theme mb-3"
                                                                    onclick="splitButton()">09:00 am - 09:30 am</button>
                                                                <div id="additional-buttons" class="hidden mb-2">
                                                                    <button id="button1"
                                                                        onclick="showContent('myDIV')">09:00 am
                                                                    </button>
                                                                    <button id="button2"
                                                                        onclick="showContent('content2')">Next</button>
                                                                </div>

                                                            </div>
                                                            <div>
                                                                <button id="original-button"
                                                                    class="btn btn-outline-theme mb-3"
                                                                    onclick="splitButton()">10:00 am - 10:30 am</button>
                                                                <div id="additional-buttons" class="hidden mb-2">
                                                                    <button id="button1"
                                                                        onclick="showContent('myDIV')">10:00 am
                                                                    </button>
                                                                    <button id="button2"
                                                                        onclick="showContent('content2')">Next</button>
                                                                </div>

                                                            </div>
                                                            <div>
                                                                <button id="original-button"
                                                                    class="btn btn-outline-theme mb-3"
                                                                    onclick="splitButton()">10:30 am - 11:00 am</button>
                                                                <div id="additional-buttons" class="hidden mb-2">
                                                                    <button id="button1"
                                                                        onclick="showContent('myDIV')">11:00 am
                                                                    </button>
                                                                    <button id="button2"
                                                                        onclick="showContent('content2')">Next</button>
                                                                </div>

                                                            </div>




                                                        </div>
                                                    </div>


                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div id="content2" class="hidden-content">
                                    <div class="row mt-4">
                                        <div class="col-lg-8 col-md-12 col-sm-12 left-column">
                                            <div class="appointment-information">
                                                <div class="title-box">
                                                    <h3> Appointment Information</h3>
                                                </div>
                                                <div class="inner-box">
                                                    <div class="information-form">
                                                        <form action="#" method="post">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <label>Your name</label>
                                                                    <input type="text" name="name"
                                                                        placeholder="Enter your name" required="">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <label>Your email</label>
                                                                    <input type="email" name="email"
                                                                        placeholder="Enter your email" required="">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <label>Your number</label>
                                                                    <input type="number" name="name"
                                                                        placeholder="Enter your number" required="">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                                    <label>Your age</label>
                                                                    <input type="date" name="name" placeholder=""
                                                                        required="">
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                    <label>Note to the doctor (optional)</label>
                                                                    <textarea name="message"
                                                                        placeholder="Write your not..."></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
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
                                                            <li>Date<span>07/10/2023</span></li>
                                                            <li>Time<span>12:00 PM</span></li>
                                                            <li>Venue<span>Noida</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="single-box">
                                                        <ul class="clearfix">
                                                            <li>General Consultation<span>₹500</span></li>

                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="btn-box">
                                                    <a data-toggle="modal" data-target="#exampleModal"
                                                        class="theme-btn-one">Offline Payment <i
                                                            class="icon-Arrow-Right"></i></a>
                                                    <a href="#" class="theme-btn-three btn-block mt-2">Want to Pay
                                                        Online<i class="icon-Arrow-Right"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
 

