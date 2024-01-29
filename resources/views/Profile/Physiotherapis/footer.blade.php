   <!-- Start Footer 
    ============================================= -->
   <footer class="bg-dark text-light">
       <div class="container">
           <div class="row">
               <div class="f-items default-padding">

                   <!-- Single Item -->
                   <div class="col-md-4 col-sm-6 equal-height item">
                       <div class="f-item">
                           <h4>About</h4>
                           <p>
                           @if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif
                           </p>
                          
                       </div>
                   </div>
                   <!-- End Single Item -->

                   <!-- Single Item -->
                   <div class="col-md-4 col-sm-6 equal-height item">
                       <div class="f-item contact">
                           <h4>Contact</h4>
                           <ul>
                               <li>
                                   <i class="fas fa-phone"></i>
                                   <p>Phone <span>+91 @if($data) {{$data->mobile !='' ? $data->mobile :'1231231231'}} @endif</span></p>
                               </li>
                               <li>
                                   <i class="fas fa-envelope"></i>
                                   <p>Email <span><a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a></span></p>
                               </li>
                              
                           </ul>

                       </div>
                   </div>
                   <!-- End Single Item -->
                   
                   <!-- Single Item -->
                   <div class="col-md-4 col-sm-6 equal-height item">
                       <div class="f-item link">
                           <h4>Quick Links</h4>
                           <ul> 
                               <li>
                                   <a href="#about"><i class="fas fa-arrow-right"></i> About</a>
                               </li>
                               <li>
                                   <a href="#appointment"><i class="fas fa-arrow-right"></i> Appointment</a>
                               </li>
                               <li>
                                   <a href="#working"><i class="fas fa-arrow-right"></i> Working Hours</a>
                               </li>
                               <li>
                                   <a href="#testimonials"><i class="fas fa-arrow-right"></i> Testimonials</a>
                               </li>
                               <li>
                                   <a href="#contact"><i class="fas fa-arrow-right"></i> Contact</a>
                               </li>


                           </ul>
                       </div>
                   </div>
                   <!-- End Single Item -->
               </div>
           </div>
       </div>
       <!-- Start Footer Bottom -->
       <div class="footer-bottom bg-dark text-light">
           <div class="container">
               <div class="row">
                   <div class="col-md-6">
                       <div class="copyright-text">© <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>  
 | All Rights Reserved</div>
                       
                   </div>
                  
               </div>
           </div>
       </div>
       <!-- End Footer Bottom -->
   </footer>
   <!-- End Footer -->


   <!-- The Modal -->
   <div class="modal" id="myModal">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header ">

                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body ">
                   <div class="content-box">
                       <div class="icon-box">
                           <i class="fa fa-check"></i>
                       </div>
                       <h4 class="modal-title">Thanks for your booking!</h4>
                       <p style="padding:20px 25px">Your Appointment Booked Successfully With The  Healthonier  App!</p>
                       <h5 class="mt-3">Expected visit: 12:40 PM</h5>


                       <div class=" mt-3">
                           <a href="#" class="btn btn-theme  btn-sm">Your Token No:12</a>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>
