
        <section class="contact-section" id="contact"> 
            <div class="auto-container">             
                <div class="contact_box">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                        <div class="form-inner p-0">
                            <div class="sec-title">
                                <p>Contact</p>
                                <h2>Contact Us</h2>
                            </div>
                             <div id="success-message"></div>
                            <form method="post" action="#" id="contact-form" class="default-form"
                                novalidate="novalidate">
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
                                        <button class="theme-btn-one" type="submit" name="submit-form">Send Message<i
                                                class="icon-Arrow-Right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="drop-item drop-img p-3">
                        <div class="payment_failed p-3">
                         <div class="element">
                          <img src="assets/images/shape11.png" alt="" class="spin">
                          <img src="{{asset('Pediatrics/assets/images/india.png')}}" alt="" class="img-fluid">
                          <img src="{{asset('Pediatrics/assets/images/shape11.png')}" alt="" class="spin spin2">
                         </div>
                        </div>
                        </div>
                      </div>
            
                       
                </div>
            </div>
            </div>
        </section>
        <section class="agent-section">
            <div class="auto-container">
                <div class="inner-container bg-color-2">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <h3>Support Team</h3>
                                    <div class="support-box">
                                        <div class="icon-box"><i class="fas fa-phone"></i></div>
                                        <span>Telephone</span>
                                        <h3><a href="tel:11165458856">+(91) 999 999 9999</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                            <div class="content_block_4">
                                <div class="content-box">
                                    <h3>Sign up for Email</h3>
                                    <form action="#" method="post" class="subscribe-form">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                            <button type="submit" class="theme-btn-one">Submit now<i class="icon-Arrow-Right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



 


 