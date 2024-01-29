 <!-- Contact form section -->
 <section class="contact-section" id="contact" style="background-image: url({{asset('Chiropractor/assets/images/banner/banner-bg-4.jpg')}});
            background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;">
            <div class="auto-container">
                <div class="">
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
                                            <input type="text" name="username" placeholder="Your name" required=""
                                                aria-required="true">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Your email" required=""
                                                aria-required="true">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="phone" required="" placeholder="Phone number"
                                                aria-required="true">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="subject" required="" placeholder="Subject"
                                                aria-required="true">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Your Message ..."></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <!-- <button class="theme-btn style-one"><span>Send</span></button> -->
                                            <button class="theme-btn-one">Send
                                                Message<i class="icon-Arrow-Right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     

                    </div>
                </div>
            </div>
        </section>
 
