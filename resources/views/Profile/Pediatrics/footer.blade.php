 <footer class="main-footer">
            <div class="footer-top">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-30.png')}});"></div>
                    <div class="pattern-2" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-31.png')}});"></div>
                </div>
                <div class="auto-container">
                    <div class="widget-section">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget logo-widget">
                                    <figure class="footer-logo"><a href="#home"><img
                                                src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Pediatrics/img/logo.png')}} @endif" alt=""></a></figure>
                                    <div class="text-white">
                                        @if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title">
                                        <h3>About</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links clearfix">
                                            <li><a href="#about">About Us</a></li>
                                            <li><a href="#appointment">Appointment</a></li>
                                            <li><a href="#team">Working hours</a></li>
                                            <li><a href="#testimonials">Testimonials</a></li>
                                            <li><a href="#contact">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget contact-widget">
                                    <div class="widget-title">
                                        <h3>Contacts</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="info-list clearfix">
                                            <li><i class="fas fa-map-marker-alt"></i>
                                                India
                                            </li>
                                            <li><i class="fas fa-microphone"></i>
                                                <a href="tel:+91 @if($data) {{$data->mobile !='' ? $data->mobile :'1231231231'}} @endif">+91 +91 @if($data) {{$data->mobile !='' ? $data->mobile :'1231231231'}} @endif</a>
                                            </li>
                                            <li><i class="fas fa-envelope"></i>
                                                <a
                                                    href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif">@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a>
                                            </li>
                     
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-box clearfix">
                        <div class="copyright pull-left"> 
                            <p>© <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>   |  All Right Reserved</p>
                        </div>
                         
                    </div>
                </div>
            </div>
        </footer>
 
