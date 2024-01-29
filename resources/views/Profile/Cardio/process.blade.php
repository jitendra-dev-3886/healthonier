
    <div id="appointment" class="appoinment-area default-padding bg-cover"
        style="background-image: url({{asset('Cardio/assets/img/banner/4.jpg')}}); position: relative;">
        <div class="container">
            <div class="row">

                <div class="doctor-items text-center">
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('Cardio/assets/img/doctors/4.jpg')}}" alt="Thumb">
                                <div class="overlay">
                                    <a href="#"><i class="fas fa-plus"></i></a>
                                </div>
                          
                            </div>
                            <div class="info">
                                <h4>  Jones</h4>
                                <h5>Cardiologist</h5>
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
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="number" name="number"
                                            placeholder="Mobile Number" type="tel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="dob" name="dob" placeholder="Date Of Birth"
                                            type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email Id"
                                            type="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="time_of_appointment" name="time of appointment"
                                            placeholder="" type="time">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="date_of_appointment" name="date of appointment"
                                            placeholder="dd/mm/yyyy" type="date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="comments" name="comments"
                                            placeholder="Note To the Doctor"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" onclick="myFunction()">
                                        Next <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Appoinment Form -->
            </div>

        </div>

        <div class="Dglow  " id="Dglow">
        <div class="container">
          
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="appointment-bg-one">
                        <img src="{{asset('Cardio/assets/img/appointment-bg-1.jpg')}}" alt="Image">
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
                                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="age" placeholder="Booking Date"
                                                onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="note" id="message" cols="30" rows="2"
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
                                <div class="booking-single mb-3">
                                    <ul class="">
                                        <li>General Consultation<span><input type="text" class="form-control" value=""
                                                    id="amount" name="amount" readonly></span></li>

                                    </ul>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-theme style1">Book</button>
                                    <button style="display:none" id="rzp-button" class="btn btn-theme style2">Want to Pay Online</button>
                                    
                                    <button type="button" class="btn btn-theme style1"> Offline Pyment</button>
                              
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        function myFunction() {
            document.getElementById("Dglow").style.display = 'block';
        }
    </script>

 

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