<div class="contact-area bg-gray  default-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('Cardio/assets/img/banner/contact.jpg')}}">
                </div>
                <div class="contact-items">
                   
                    <div class="col-md-6  contact-form">
                        <h2>Get in touch with us</h2>
                         <div id="success-message"></div>
                       <form class="form-wrap" id="contact-form">

                    @csrf
                    <h5 class="mb-3">Fell Free To Contact Us For Any Query</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="Full Name*" id="name" required
                                    data-error="Please enter your full name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" required placeholder="Email*"
                                    data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                             <div class="col-lg-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Phone*" id="phone_number" required
                                    data-error="Please enter your phone number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                            
                            </div>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="subject" placeholder="Subject*" id="msg_subject" required
                                    data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group v1">
                                <textarea class="form-control" name="message" id="msg" placeholder="Your Messages.." cols="30" rows="2"
                                    required data-error="Please enter your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <button type="submit" class="btn style2">Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 