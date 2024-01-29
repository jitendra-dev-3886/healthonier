<section id="appointment" class="appointment-wrap style2 ptb-100 bg-albastor" style="position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <span>Appointment</span>
                    <h2>Best   Treatment That Meets The Highest Quality Standard</h2>

                </div>
            </div>
        </div>
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="appointment-bg-one">
                    <img src="@if($data) {{$data->profile_path !='' ? asset($data->profile_path) : asset('Eyecare/assets/img/appointment-bg-1.jpg')}} @endif"
                        alt="Image">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="book-appointment style2">
                    <h5>Book An Online Appointment</h5>
                    <input type="hidden" name="doctorid" value="{{$data->user_id}}" id="Id">
                    <div id="calendar"></div>
                    <div class="form-inner">
                        <div class="appointment-time">
                            <div class="php-email-form">
                                <h3>Location </h3>
                                <div id="radioButtonsDiv"></div>
                            <div class="card location">
                                            <div class="card-body">
                                                <p class="m-0">Please Select Your Date To Book Your appointment</p>
                                            </div>
                                        </div>
                                <button style="display:none" type="button" class="btn btn-danger" id="nobooking">Booking
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
    <div class="Dglow  " id="Dglow">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <span>Appointment</span>
                        <h2>Best Eye Treatment That Meets The Highest Quality Standard</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="appointment-bg-one">
                        <img src="{{asset('Eyecare/assets/img/appointment-bg-1.jpg')}}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">

                    <div class="booking-card">
                        <div class="booking-title">
                            <h3>Booking Summary</h3>
                        </div>

                        <div class="booking-box book-appointment">
                            <form id="book">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="age" placeholder="Booking Date"
                                                onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="note" id="message" cols="30" rows="10"
                                                placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-single">
                                    <ul class="">
                                        <li>Date<span><input type="text" class="form-control" value="" id="bookingdate"
                                                    readonly></span></li>
                                        <li>Location<span><input type="text" class="form-control" value="" id="venue"
                                                    readonly></span></li>
                                    </ul>
                                </div>
                                <div class="booking-single">
                                    <ul class="">
                                        <li>General Consultation<span><input type="text" class="form-control" value=""
                                                    id="amount" name="amount" readonly></span></li>

                                    </ul>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn style1 mb-3">Book</button>
                                    <button style="display:none" id="rzp-button" class="btn style2 mb-3">Want to Pay Online</button>
                                    
                                    <button style="display:none"  id="offlinepay" type="button" class="btn style1"> Offline Pyment</button>
                              
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="hidden">
    <div class="red" id="open">
        <div class="content-box">
            <div class="icon-box">
                <i class="flaticon-checked"></i>
            </div>
            <h4 class="modal-title">Thanks for your booking!</h4>
            <p class="mt-3">Your Appointment Booked Successfully With The Doctor Consulting App!</p>
            <h5 class="mt-3">Expected visit: 12:40 PM</h5>
        </div>

        <div class="mt-3 mb-3 text-center">
            <a href="#" class="btn style2 mt-3">Your Token No:12</a>
        </div>
    </div>
</div>


<script>
    function myFunction() {
        document.getElementById("Dglow").style.display = 'block';
    }

</script>