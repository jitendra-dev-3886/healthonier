<section class="contact-section" id="contact">

    <div class="auto-container">

        <div class="row clearfix">

            <div class="col-lg-6 col-md-12 col-sm-12 form-column">

                <div class="form-inner">

                    <div class="sec-title">

                        <h2 class="mb-3">Contact Us</h2>
                        <h5>Feel free to contact with us anytime.</h5>

                        <div id="success-message"></div>

                    </div>

                    <form id="contact-form"  class="default-form">

                        @csrf



                        <div class="row clearfix">

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                <input type="text" name="username" placeholder="Your name" required="" aria-required="true">

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                <input type="email" name="email" placeholder="Your email" required="" aria-required="true">

                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                <input type="text" name="phone" required="" placeholder="Phone number" aria-required="true">

                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">

                                <input type="text" name="subject" required="" placeholder="Subject" aria-required="true">

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                <textarea name="message" placeholder="Your Message ..."></textarea>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">

                                <button class="theme-btn-one" type="submit">Send Message<i class="icon-Arrow-Right"></i></button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 map-column bg-color-3 p-4">

               <img src="{{ asset('Pediatrics/assets/images/india.png') }}" class="img-fluid">

            </div>

        </div>

    </div>

</section>



