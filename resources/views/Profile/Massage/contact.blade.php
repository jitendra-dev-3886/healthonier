<!-- Contact form section -->
<section id="contact" class="contact-wrap style4 ptb-100" style="position: relative;">
    <img src="{{asset('Massage/assets/img/hero/about-shape-3.webp')}}" alt="Image" class="about-shape-two md-none">
    <img src="{{asset('Massage/assets/img/hero/help-shape.webp')}}" alt="Image" class="about-shape-three md-none">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <span>Keep In Touch With Us</span>
                    <h2>Contact Information</h2>
                </div>
            </div>
        </div>
        <div class="row gx-5 align-items-center">
 <div id="success-message"></div>
            <div class="col-lg-10 mx-auto" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <form class="form-wrap contactForm" id="contact-form">
                    @csrf
                    <h5>Fell Free To Contact Us For Any Query</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="username" placeholder="Full Name*" id="name" required
                                    data-error="Please enter your full name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" required placeholder="Email*"
                                    data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone*" id="phone_number" required
                                    data-error="Please enter your phone number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Subject*" id="msg_subject" required
                                    data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group v1">
                                <textarea name="message" id="Messages" placeholder="Your Messages.." cols="30" rows="10"
                                    required data-error="Please enter your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn style2">Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>