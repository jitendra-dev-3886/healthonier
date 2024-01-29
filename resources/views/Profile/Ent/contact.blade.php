<!-- Contact form section -->

<section id="contact" class="section">

    <div class="container">




        <div class="row align-items-center ">

            <div class="col-md-7 appointment">

                <div class="appointment-form">

                    <h2 class="title">Contact Us</h2>
                     <div id="success-message"></div>

                    <form id="contact-form" class="default-form">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input name="username" type="text" class="form-control" id="id_name"
                                        placeholder="Full Name">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input name="email" type="email" class="form-control" id="id_email"
                                        placeholder="Email">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input name="phone" type="text" class="form-control" id="id_phone_number"
                                        placeholder="Phone Number">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <input name="subject" class="form-control" id="notes" type="text"
                                        placeholder="Subject">

                                </div>

                            </div>



                        </div>

                        <div class="form-group">

                            <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>

                        </div>

                        <button type="submit" class="btn book-now-btn">Send Messsage</button>

                    </form>

                </div>

            </div>

            <div class="col-md-5">

                <div class="wow fadeIn" data-wow-duration="1500ms">

                    <img src="{{ asset('Ent/assets/images/faqs.png')}}" class="w-100" alt="">

                </div>

            </div>

        </div>

    </div>

</section>