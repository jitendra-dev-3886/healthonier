<section class="testimonial_part section_padding" id="testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section_tittle_style_02">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s"> <span class="title_overlay_effect">What client’s say? </span></h2>

                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial_slider owl-carousel">
                 @if($test->isNotEmpty())
                    @foreach($test as $item)
                    <div class="single_testimonial_slider">
                        <div class="client_speech bg_1">
                            <img src="{{ asset('Childcare/assets/img/quote.png') }}" alt="#">
                            <p>{{$item->review}}

                            </p>
                            <img src="{{ asset('Childcare/assets/img/shape_1.png') }}" alt="#" class="client_speech_shape">
                        </div>
                        <div class="client_info">
                            <img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif" alt="#">
                            <h4>{{$item->name}} <span></span> </h4>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="single_testimonial_slider">
                        <div class="client_speech bg_2">
                            <img src="{{ asset('Childcare/assets/img/quote.png') }}" alt="#">
                            <p>"I highly recommend. The doctor on the platform are knowledgeable,
                                professional, and genuinely care about their
                                patients. I received excellent medical advice and prescriptions without
                                the hassle of visiting a physical clinic."


                            </p>
                            <img src="{{ asset('Childcare/assets/img/shape_2.png') }}" alt="#" class="client_speech_shape">
                        </div>
                        <div class="client_info">
                            <img src="{{ asset('Childcare/assets/img/client_img_1.png') }}" alt="#">
                            <h4>Martin Ehrlich <span></span> </h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial_animation_1">
        <div data-parallax="{&quot;x&quot;: 2, &quot;y&quot;: 120, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/feature_5.png') }}" alt="#"></div>
    </div>
    <div class="testimonial_animation_2">
        <div data-parallax="{&quot;x&quot;: 10, &quot;y&quot;: 100, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/event_4.png') }}" alt="#"></div>
    </div>
    <div class="testimonial_animation_3">
        <div data-parallax="{&quot;x&quot;: 30, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/event_6.png') }}" alt="#"></div>
    </div>
    <div class="testimonial_animation_4">
        <div data-parallax="{&quot;x&quot;: 30, &quot;y&quot;: -110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/event_7.png') }}" alt="#"></div>
    </div>
</section>
