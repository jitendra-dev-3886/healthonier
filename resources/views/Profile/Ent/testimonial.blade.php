<!-- Testimonials section two -->

<section class="section bg-gradient" id="testimonial">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="section-title text-center mb-4">

                    <h1 class="text-white">Patient Reviews</h1>

                    <p class="text-white section-subtitle mx-auto">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="owl-carousel owl-theme review-slider">
                    @if($test->isNotEmpty())
                    @foreach($test as $item)
                    <div class="item">

                        <div class="review-card shadow-md">

                            <p>{{$item->review}}</p>

                        </div>

                        <div class="user-txt">

                            <div class="user-pics"><img
                                    src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif"
                                    alt=""></div>

                            <div class="user-info">

                                <h6 class="heading text-white">{{$item->name}}</h6>

                                <p class="sub-heading text-white">{{$item->designation}}</p>

                            </div>

                        </div>

                    </div>

                    @endforeach
                    @else
                    <div class="item">

                        <div class="review-card shadow-md">

                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour.</p>

                        </div>

                        <div class="user-txt">

                            <div class="user-pics"><img src="images/reviews/feedback-1.jpg" alt=""></div>

                            <div class="user-info">

                                <h6 class="heading text-white">David Matin</h6>

                                <p class="sub-heading text-white">Mediyot User</p>

                            </div>

                        </div>

                    </div>
                    @endif



                </div>

            </div>

        </div>

    </div>

</section>