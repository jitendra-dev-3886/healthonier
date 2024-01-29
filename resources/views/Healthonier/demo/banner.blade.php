<section class="page-title-two">
    <div class="lower-content" style="padding-bottom:0;background: url({{asset('Healthonier/assets/images/banner/banner.png')}});
    background-size: cover;">
        <div class="auto-container">
            <div class="title-box">
                <div class="centred">
                    <div class="title mt-4">
                        <h1 class="text-dark fw-bold">We take your Clinic online. </h1>
                        <p class="mb-3">In this page, you would find all the demo information of our platform.</p>
                        <a href="{{route('price')}}" class="theme-btn">Launch Your Online Clinic - Free <i class="icon-Arrow-Right"></i></a>
                        <a href="{{route('contact')}}" class="theme-btn-red mb-5">Contact Us <i class="icon-Arrow-Right"></i></a>
                        <img src="{{asset('Healthonier/assets/images/banner/screen.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--page-title-two end-->


<!-- pricing-section -->
<section class="feature-section">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-17.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-18.png')}});"></div>
        <div class="pattern-3" style="background-image: url({{asset('Healthonier/assets/images/shape/shape-19.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_2">
                    <div class="content-box">
                        <div class="sec-title  ">
                            <h2>Check out Demo Clinic Website & App - Multi Doctor</h2>
                        </div>
                        <div class="mb-5">
                            <p>Click on the below icons to view or download the Demo Clinic Website, Demo Android App and Demo iOS App. This demo environment is setup for Multi-Doctor Clinics. If you are a single-Doctor Clinic, download from the above section.

                            </p>
                        </div>
                        <div class="btn-box clearfix">
                            <a href="index.html" class="mr-2 download-btn app-store">
                                <i class="fab fa-apple"></i>
                                <div class="btn_text_get">
                                    <span>Download on</span>
                                    <h3>App Store</h3>
                                </div>
                            </a>
                            <a href="index.html" class="download-btn play-store">
                                <i class="fab fa-google-play"></i>
                                <div class="btn_text_get">
                                    <span>Download on</span>
                                    <h3>Google Play</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image-box wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <figure class="image"><img src="{{asset('Healthonier/assets/images/banner/rightbanner.png')}}" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pricing-section end -->

<section class="contact-section about-section bg-color-3 " id="about">
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                <div class="form-inner">
                    <div class="sec-title">
                        <h2>Get the Credentials </h2>
                    </div>
                    <form method="post" action="sendemail.php" id="contact-form" class="default-form" novalidate="novalidate">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="username" placeholder="Your name" required="" aria-required="true">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Your email" required="" aria-required="true">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="text" name="phone" required="" placeholder="Phone number" aria-required="true">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="text" name="clinic" required="" placeholder="Clinic Name" aria-required="true">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Single Clinic
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Multi Clinic
                                    </label>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="comments" placeholder="Your Comment ..."></textarea>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                <button class="theme-btn-one" type="submit" name="submit-form">Submit <i class="icon-Arrow-Right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <div class="sec-title">
                            <h2> Please fill out the form and we will email you the credentials to access to following:
                            </h2>
                        </div>
                        <ul class="list-style-one clearfix">
                            <li> Demo Clinic Admin - Single Doctor Clinic </li>
                            <li>Demo Clinic Admin - Multi Doctor Clinic </li>
                            <li>Pharmacist Android App </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
