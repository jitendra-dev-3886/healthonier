<footer class="footer_section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
                <div class="single_footer_widget">
                    <a href="#" class="footer_logo"><img src="@if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('Childcare/assets/img/footer_logo.png')}} @endif" alt="#"></a>
                    <p>@if ($data) {{$data->footer_content != '' ? $data->footer_content : 'Always consult a healthcare professional for accurate diagnosis and personalized treatment plans'}} @endif</p>
                    <div class="social_icon">
                        <a href="#"><img src="{{ asset('Childcare/assets/img/icon/fb.png') }}" alt="#"></a>
                        <a href="#"><img src="{{ asset('Childcare/assets/img/icon/inst.png') }}" alt="#"></a>
                        <a href="#"><img src="{{ asset('Childcare/assets/img/icon/feed.png') }}" alt="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 wow fadeInDown" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                <div class="single_footer_widget footer_nav">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Appointment</a></li>
                        <li><a href="#">Working Hours</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInDown;">
                <div class="single_footer_widget footer_nav">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"> </i>India</li>
                        <li> <i class="fas fa-phone "> </i> +91 :@if($data) {{$data->mobile !='' ? $data->mobile :'1231231231'}} @endif</li>
                        <li> <i class="fas fa-envelope "> </i>:@if($data) {{$data->email !='' ? $data->email :'info@healthonier.com'}} @endif</li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-12 wow fadeInDown" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
                <div class="copyright_part text-center">
                    <p>© Copyright 2023 Design by <a href="https://xoniertechnologies.com/"> xoniertechnologies</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_animation_1">
        <div data-parallax="{&quot;x&quot;: 2, &quot;y&quot;: 50, &quot;rotateZ&quot;:0}" style="transform:translate3d(0.111px, 2.07px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0.111px, 2.07px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "><img src="{{ asset('Childcare/assets/img/footer_icon_1.png') }}" alt="#"></div>
    </div>
    <div class="footer_animation_2">
        <div data-parallax="{&quot;x&quot;: 10, &quot;y&quot;: 40, &quot;rotateZ&quot;:0}" style="transform:translate3d(0.438px, 1.733px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0.438px, 1.733px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "><img src="{{ asset('Childcare/assets/img/footer_icon_2.png') }}" alt="#"></div>
    </div>
    <div class="footer_animation_3">
        <div data-parallax="{&quot;x&quot;: 30, &quot;y&quot;: 70, &quot;rotateZ&quot;:0}" style="transform:translate3d(0.029px, 0.029px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0.029px, 0.029px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "><img src="{{ asset('Childcare/assets/img/footer_icon_3.png') }}" alt="#"></div>
    </div>
</footer>



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
                    <p class="mt-3">Your Appointment Booked Successfully With The Healthonier!</p>
                    <h5 class="mt-3">Expected visit: 12:40 PM</h5>
                </div>

                <div class="mt-3 mb-5 text-center">
                    <a href="#" class="cu_btn btn_2">Your Token No:12</a>
                </div>

            </div>
        </div>
    </div>
</div>
