 <!-- Contact form section -->
 <section class="contact-form-section" id="contact">
     <div class="bg-image" style="background-image: url({{asset('Dentiest/assets/images/background/bg-2.jpg')}});"></div>
     <div class="shape" style="background-image: url({{asset('Dentiest/assets/images/shape/shape-12.png')}});"></div>
     <div class="auto-container">
         <div class="row">
             <div class="col-lg-6 offset-lg-6">
                 <div class="contact-form">
                     <div class="sec-title mb-30">
                         <h2>Get In Touch</h2>
                         <div class="text">We will be happy to answer your questions.</div>
                     </div>
                     
                     <div id="success-message"></div>

                     <form id="contact-form" class="default-form">

                         @csrf

                         <div class="row">
                             <div class="form-group col-md-12">
                                 <input name="username" type="text" placeholder="Enter Full Name">
                                 <i class="docpoint-icon-11"></i>
                             </div>
                             <div class="form-group col-md-12">
                                 <input type="email" name="email" placeholder="Enter Email Address">
                                 <i class="docpoint-icon-12"></i>
                             </div>
                             <div class="form-group col-md-12">
                                 <input type="text" name="phone" required="" placeholder="Phone number" aria-required="true">
                             </div>
                             <div class="form-group col-md-12">
                                 <input type="text" name="subject" required="" placeholder="Subject" aria-required="true">
                                 <i class="docpoint-icon-13"></i>
                             </div>
                             <div class="form-group col-md-12">
                                 <textarea name="message" placeholder="Your Message"></textarea>
                                 <i class="docpoint-icon-13"></i>
                             </div>
                             <div class="form-group col-md-12">
                                 <button class="theme-btn style-one"><span>Send</span></button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
