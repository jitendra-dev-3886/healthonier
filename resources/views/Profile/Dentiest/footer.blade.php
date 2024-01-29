 <!--Main Footer-->
 <footer class="main-footer">
     <div class="shape-one"><img src="assets/images/shape/shape-8.png" alt=""></div>
     <div class="shape-two"><img src="assets/images/shape/shape-9.png" alt=""></div>
     <div class="upper-box">
         <div class="auto-container">

             <div class="top-info">
                 <div class="row">
                     <div class="col-lg-3 column">
                         <div class="logo"><a href="#"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Dentiest/assets/images/logo-light.png')}} @endif" alt=""></a></div>
                     </div>
                     <div class="col-lg-4 column">
                         <div class="info-block">
                             <div class="icon"><i class="docpoint-icon-8"></i></div>
                             <div class="text">
                                 <p>Main Email : <br> <a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a></p>

                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 offset-lg-1 column">
                         <div class="info-block">
                             <div class="icon"><i class="docpoint-icon-9"></i></div>
                             <div class="text">
                                 <p>Mobile Number : <br> <a href="tel:+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif">+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif</a></p>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--Widgets Section-->
             <div class="widgets-section">
                 <div class="row clearfix">

                     <!--Column-->
                     <div class="column col-lg-4 col-md-6">
                         <div class="widget about-widget">
                             <h3 class="widget-title">About us  </h3>
                             <div class="text">@if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif</div>
                        
                         </div>
                     </div>

                     <!--Column-->
                     <div class="column col-lg-4 col-md-6">
                         <div class="widget links-widget">
                             <h3 class="widget-title">Useful Link</h3>
                             <div class="widget-content">
                                 <ul>
                                     <li><a href="#about">About</a></li>
                                     <li><a href="#appointment">Appointment</a></li>
                                     <li><a href="#working">Working Hours</a></li>
                                     <li><a href="#testimonials">Testimonials</a></li>
                                     <li><a href="#contact">Contact Us</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>



                     <!--Column-->
                     <div class="column col-lg-4 col-md-6">
                         <div class="widget about-widget">
                             <h3 class="widget-title">Contacts</h3>
                             
                                  <div class="location">
                                 <div class="icon"><i class="fa fa-envelope"></i></div>
                                 <div class="text">
                                     <p class="mb-0">Email:</p>
                                     <a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a>
                                     </div>
                           
                             </div>
                                <div class="location">
                                 <div class="icon"><i class="fa fa-mobile"></i></div>
                                      <div class="text">
                                      <p>Mobile Number : <br> <a href="tel:+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif">+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '1234567890'}} @endif</a></p>
                                      </div>
                             </div>
                             
                         
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="auto-container">
             <div class="wrapper-box">
                 <div class="copyright-text">©   <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>
 | All Rights Reserved</div>
                 <ul class="social-links">
                     <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                   
                     <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    
                 </ul>
             </div>
         </div>
     </div>
 </footer>
 <!--End Main Footer-->
