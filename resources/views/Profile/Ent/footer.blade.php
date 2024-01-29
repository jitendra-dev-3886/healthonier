 <!--Main Footer-->
 <footer class="footer bg-gradient overflow-hidden pb-4" id="footer">


<div class="container footer-bottom">

    <div class="row">

        <div class="col-md-4">

            <div class="foot-logo">

                <img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Dentiest/assets/images/logo-light.png')}} @endif" class="mt-2" alt="">

            </div>

            <p class="mt-4 text-left ftr-about">@if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif</p>

            <div class="mt-4">

                <ul class="footer-social list-inline mt-4">

                    <li class="list-inline-item"><a href="#" class="social-icon"><i
                                class="icofont-facebook"></i></a></li>

                    <li class="list-inline-item"><a href="#" class="social-icon"><i
                                class="icofont-twitter"></i></a></li>

                    <li class="list-inline-item"><a href="#" class="social-icon"><i
                                class="icofont-instagram"></i></a></li>

                    <li class="list-inline-item"><a href="#" class="social-icon"><i
                                class="icofont-linkedin"></i></a></li>

                </ul>

            </div>

        </div>

        <div class="col-md-4 col-sm-4">

            <h5 class="footer-title">Quick Links</h5>

            <ul class="footer-menu list-unstyled mb-0 mt-4">

                <li><a href="#">About Us</a></li>

                <li><a href="#">Appointment</a></li>

                <li><a href="#">Working Hours</a></li>

                <li><a href="#">Testimonials</a></li>

                <li><a href="#">Contact Us</a></li>

            </ul>

        </div>

    

        <div class="col-md-4 col-sm-4">

            <h5 class="footer-title">Quick Contact</h5>

            <ul class="footer-menu list-unstyled mb-0 mt-4 contact-menu-list">

                <li>

                    <i class="icofont-location-pin"></i>

                    <a href="" target="_blank">

                        Noida , India

                    </a>

                </li>

                <li><i class="icofont-envelope"></i><a href="mailto:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif"> @if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</a>
                </li>

                <li><i class="icofont-phone"></i><a href="tel:+@if($data) {{$data->mobile !='' ? $data->mobile :'1111111111'}} @endif"> +91 @if($data) {{$data->mobile !='' ? $data->mobile :'1111111111'}} @endif</a></li>

            </ul>

        </div>

        <div class="col-md-12">

            <div class="footer-desc mt-4 pt-4">

                <p class="mb-0 text-center">2023 &copy;   Design by xoniertechnologies.</p>
 
            </div>

        </div>

    </div>

</div>

</footer>


