<!-- start contact -->

<div class="banner-area responsive-auto-height text-small" id="contact">
    <div class="item shadow dark text-light bg-fixed" style="background-image: url(https://clinic.xonierconnect.com/physiotherapist/assets/img/banner/4.jpg);">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="content double-items">
                            <!-- Start contact Form -->
                            <div class="col-md-8  col-md-offset-2 appoinment">
                                <div class="appoinment-box">
                                    <div class="heading">
                                        <h2>Contact Us</h2>
                                        <div id="success-message"></div>
                                    </div>
                                    
                                    <form class="form-wrap" id="contact-form" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="name" name="username" placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="Subject" name="subject" placeholder="Subject" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <textarea class="form-control" id="comments" name="message" placeholder="Your Message*"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <button type="submit">
                                                    Submit Query <i class="fa fa-paper-plane"></i>
                                                </button> --}}
                                                <button class="theme-btn-one" type="submit">Send Message<i class="icon-Arrow-Right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End contact Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End contact -->
