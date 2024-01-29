 <footer class=" text-light">
        <div class="container">
            <div class="row">
                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item">
                            <h4>About</h4>
                            <p class="comp-desc">
                        @if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif
                        </p>
                            
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

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item contact">
                            <h4>Contact</h4>
                            <ul>
                                
                            <li>
                                <i class="flaticon-support"></i>
                                <a href="#">+91 @if($data) {{$data->mobile !='' ? $data->mobile :'1231231231'}} @endif</a>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <a href=""><span class="__cf_email__" data-cfemail="325b5c545d725647515a1c515d5f">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</span></a>
                            </li>
                            </ul>

                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom  text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                      <div class="copyright-text">© <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script> 
 | All Rights Reserved</div>
 
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    
 
