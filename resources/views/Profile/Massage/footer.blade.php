<!--Main Footer-->
<footer class="footer-wrap">
    <img src="{{ asset('Massage/assets/img/hero/about-shape-3.webp')}}" alt="Image" class="about-shape-two md-none">
    <img src="{{ asset('Massage/assets/img/hero/footer-shape-2.webp')}}" alt="Image" class="about-shape-one md-none">
    <div class="footer-top">
        <div class="container">
            <div class="row pt-100 pb-75">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <a href="index.html" class="footer-logo">
                            <img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) :
                            asset('Dentiest/assets/images/logo-light.png')}} @endif" alt="Image">
                        </a>
                        <p class="comp-desc">
                            @if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a
                            healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Contact information</h3>
                        <ul class="contact-info list-style">
                            <li>
                                <i class="flaticon-map"></i>
                                <p>India</p>
                            </li>
                            <li>
                                <i class="flaticon-support"></i>
                                <a href="tel:2584568790">+91 @if($data) {{$data->mobile !='' ? $data->mobile
                                    :'8976576865'}} @endif</a>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <a href=""><span class="__cf_email__"
                                        data-cfemail="325b5c545d725647515a1c515d5f">@if($data) {{$data->email !='' ?
                                        $data->email :'info@healthonier.com'}} @endif</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ps-xl-4">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Quick Links</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="#about">
                                    <i class="ri-arrow-right-s-line"></i>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#appointment">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Appointment
                                </a>
                            </li>
                            <li>
                                <a href="#working">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Working Hours
                                </a>
                            </li>
                            <li>
                                <a href="#testimonial">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Testimonials
                                </a>
                            </li>
                            <li>
                                <a href="#contact">
                                    <i class="ri-arrow-right-s-line"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright-text"><i class="ri-copyright-line"></i><span>Xonier</span>. All
                            Rights Reserved </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="social-link">
                            <h6>Follow Us On: </h6>
                            <ul class="social-profile list-style style1">
                                <li>
                                    <a target="_blank" href="https://facebook.com/">
                                        <i class="ri-facebook-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/">
                                        <i class="ri-twitter-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://linkedin.com/">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://pinterest.com/">
                                        <i class="ri-linkedin-line"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>