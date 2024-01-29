 <!--Main Footer-->
 <footer class="bg-dark text-light" style="background: url({{asset('Mental/assets/img/banner/footer.png')}});">
        <div class="container">
            <div class="row">
                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item">
                            <a href="index.html">
                                <img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Dentiest/assets/images/logo-light.png')}} @endif" class="logo" alt="Logo">
                            </a>
                            <p>@if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif </p>
                         
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height item">
                        <div class="f-item link">
                            <h4>Quick Links</h4>
                            <ul>
                                <li>
                                    <a href="#home"><i class="fas fa-arrow-right"></i>Home</a>
                                </li>
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
                                    <i class="fas fa-phone"></i>
                                    <p>Phone <span>+91 @if($data) {{$data->mobile !='' ? $data->mobile :'9876787645'}} @endif</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p>Email <span><a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i>
                                    <p>Office <span>India</span></p>
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
                        <p>&copy; Copyright 2023. All Rights Reserved by <a href="https://xoniertechnologies.com/"
                                blank="_blank">Xonier Technologies</a></p>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
 