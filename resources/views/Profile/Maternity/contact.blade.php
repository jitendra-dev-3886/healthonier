<!-- Contact form section -->

<section class="contact-section" id="contact">
    <div class="container">
        <div class="row clearfix m-0">
            <div class="col-lg-6 col-md-12 col-sm-12 form-column mb-2">
                <div class="form-inner">
                    <div class="sec-title">
                        <p>Contact</p>
                        <div id="success-message"></div>
                        <h2 class="text-white">Contact Us</h2>
                    </div>
                    <form id="contact-form" class="default-form">
                        @csrf
                        <div class="row clearfix m-0">
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
                                <button class="theme-btn-one">Send
                                    Message<i class="icon-Arrow-Right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('Maternity/assets/images/banner/contact.png')}}" alt="">
            </div>

        </div>
    </div>
    </div>
</section>