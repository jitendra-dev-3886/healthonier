<!-- Start Appoinment
    ============================================= -->



    <div id="appointment" class="appoinment-area default-padding bg-cover"
    style="background-image:url(https://app.healthonier.com/physiotherapist/assets/img/banner/17.jpg); position: relative;">
    <div class="container">
        <div class="row">
            <div class="doctor-items text-center">
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <div class="thumb">
                            <img src="https://app.healthonier.com/physiotherapist/assets/img/doctors/3.jpg" alt="Thumb">
                            <div class="overlay">
                                <a href="#"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="social">
                                <ul>
                                    <li class="facebook">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="info">
                            <h4>Jessica Jones</h4>
                            <h5>Physiotherapist</h5>
                            <div class="appoinment-btn">
                                <a href="#appointment">Make appoinment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <!-- Start Appoinment Form -->
            <div class="col-md-8  appoinment">
                <div class="appoinment-box">
                    <div class="heading">
                        <h2>Make an Appointment</h2>
                    </div>
                    <input type="hidden" name="doctorid" value="{{$data->doctor_id}}" id="Id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner">
                                <div class="appointment-time">
                                    <div class="php-email-form">
                                        <h3 class="mb-3">Location </h3>
                                        <div id="radioButtonsDiv"></div>
                                        <div class="card location border">
                                            <div class="card-body">
                                                <p>Please Select Your Date To Book Your appointment</p>
                                            </div>
                                        </div>
                                        <button style="display:none" type="button" class="btn btn-danger"
                                            id="nobooking">Booking
                                            Is Not Available</button>
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
            <!-- End Appoinment Form -->
        </div>

    </div>

    <div class="Dglow  " id="Dglow">
        <form id="book">
            @csrf
            <div class="col-md-6 appoinment-box" style="min-height: 400px;">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="number" name="number" placeholder="Mobile Number"
                                type="tel">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="dob" name="age" placeholder="Date Of Birth" type="date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email Id" type="email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" id="comments" name="note" rows="4"
                                placeholder="Note To the Doctor"></textarea>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-md-6 appoinment">

                <div class="form-widget">
                    <div class="title-box">
                        <h3>Booking Summary</h3>
                    </div>
                    <div class="inner-box">
                        <div class="single-box">
                            <ul class="">
                                <li>Date<span><input type="text" class="form-control" value="" id="bookingdate"
                                            readonly></span></li>
                            </ul>
                        </div>
                        <div class="single-box">
                            <ul class="">
                                <li>Location<span><input type="text" class="form-control" value="" id="venue"
                                            readonly></span></li>
                            </ul>
                        </div>
                        <div class="single-box">
                            <ul class="">
                                <li>General Consultation<span><input type="text" class="form-control" value=""
                                            id="amount" name="amount" readonly></span></li>

                            </ul>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-theme border btn-sm">Book</button>
                            <button style="display:none" id="rzp-button" class="btn btn-theme border btn-sm mb-2">Want to Pay
                                Online</button>

                           <button style="display:none"   id="offlinepay" type="button" class="btn btn-theme effect btn-md">
                                Offline Payment <i class="fa fa-paper-plane"></i>
                            </button> 

                        </div>
                        <!-- <div class="col-md-12">
                            <a class="btn btn-theme border btn-sm" href="#">Want to Pay online</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




<!-- End Appoinment -->