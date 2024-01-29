<section class="contact_page section_padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact_form form_style">
                    <div id="success-message"></div>
                    <h2 class="kid_title mb-4"> <span class="title_overlay_effect">We`re here to Help You</span></h2>
                    <form id="contact-form" class="default-form">

                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_single_item">
                                    <input type="text" name="username" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_single_item">
                                    <input type="text" name="phone" required="" placeholder="Phone number" aria-required="true">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_single_item">
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_single_item">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_single_item">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <a class="pc-button elementor-button button-link cu_btn" href="#">
                            <div class="button-content-wrapper">
                                <button class="theme-btn-one" type="submit">Send Message<i class="icon-Arrow-Right"></i></button>
                                {{-- <span class="elementor-button-text">Send Message</span> --}}
                                <svg class="pc-dashes inner-dashed-border animated-dashes">
                                    <rect x="5px" y="5px" rx="25px" ry="25px" width="0" height="0"></rect>
                                </svg>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 pl-lg-5">
                <div class="blog_sidebar">
                    <div class="contact_sidebar">
                        <h2 class="kid_title mb-4"> <span class="title_overlay_effect">Office Info</span></h2>
                        <div class="single_contact_sidebar">
                            <i class="icon_pin"></i>
                            <div class="contact_sidevar_content">
                                <h5>Location</h5>
                                <p>India</p>
                            </div>
                        </div>
                        <div class="single_contact_sidebar">
                            <i class="icon_phone"></i>
                            <div class="contact_sidevar_content">
                                <h5>Phone</h5>
                                <p>+91 @if ($data) {{$data->mobile != '' ? $data->mobile : '3212321232'}} @endif</p>
                            </div>
                        </div>
                        <div class="single_contact_sidebar">
                            <i class="icon_mail"></i>
                            <div class="contact_sidevar_content">
                                <h5>Email</h5>
                                <p><a href="#" class="__cf_email__" data-cfemail="">@if ($data) {{$data->email != '' ? $data->email : 'info@doctorconsultingapp.com'}} @endif </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="social_icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
