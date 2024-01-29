        <!-- information-section -->
        <section class="information-section sec-pad centred" style="
        background: url({{asset('Healthonier/assets/images/banner/banner.png')}});
        background-size: cover;">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-88.png')}});"></div>
                <div class="pattern-2" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-89.png')}});"></div>
            </div>
            <div class="auto-container mt-5">
                <div class="sec-title centred">
                    <h2>Get In Touch</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 information-column">
                        <div class="single-information-block wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="pattern" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-87.png')}});"></div>
                                <figure class="icon-box"><img src="{{asset('Healthonier/assets/images/icons/icon-20.png')}}" alt=""></figure>
                                <h3>Email Address</h3>
                                <p>
                                    <a href="mailto:info@healthonier.com">info@healthonier.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 information-column">
                        <div class="single-information-block wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="pattern" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-87.png')}});"></div>
                                <figure class="icon-box"><img src="{{asset('Healthonier/assets/images/icons/icon-21.png')}}" alt=""></figure>
                                <h3>Phone Number</h3>
                                <p>
                                    <a href="tel:+91 9654356668">+91 9654356668</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 information-column">
                        <div class="single-information-block wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="pattern" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-87.png')}});"></div>
                                <figure class="icon-box"><img src="{{asset('Healthonier/assets/images/icons/icon-22.png')}}" alt=""></figure>
                                <h3>Office Address</h3>
                                <p>H-187, Lohia Rd, Sector 63, Noida, UP 201301
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- information-section end -->


        <!-- contact-section -->
        <section class="contact-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <div class="sec-title">
                                <p>Contact</p>
                                <h2>Contact Us</h2>
                            </div>
                            <form id="contact-form" class="default-form">

                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Your name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Your email" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="phone" required="" placeholder="Phone number">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" required="" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your Message ..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        {{-- <button class="theme-btn style-one"><span>Send</span></button> --}}
                                        <button class="theme-btn-one">Send Message<i class="icon-Arrow-Right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <div class="map-inner">
                            <div class="pattern" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-90.png')}});"></div>
                            <iframe style="border:0; width: 100%; height: 550px;" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14008.205400693694!2d77.38984900000001!3d28.62822305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sxoniertechnologies.com%20google%20map!5e0!3m2!1sen!2sin!4v1692773842687!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0"></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->
