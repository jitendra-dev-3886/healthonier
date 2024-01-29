 
        <!-- testimonial-section -->
        <section class="testimonial-style-two bg-color-3">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-55.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-56.png);"></div>
                <div class="pattern-3" style="background-image: url(assets/images/shape/shape-57.png);"></div>
                <div class="pattern-4" style="background-image: url(assets/images/shape/shape-58.png);"></div>
                <div class="pattern-5" style="background-image: url(assets/images/shape/shape-59.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <p>Testimonials</p>
                    <h2>Testimonials</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                      @if($test->isNotEmpty())
                    @foreach($test as $item)
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="text">
                                <p>{{$item->review}}
                                </p>
                            </div>
                            <div class="author-info">
                                <figure class="author-thumb"><img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif" alt=""></figure>
                                <h4>{{$item->name}}   </h4>
                            
                            </div>
                        </div>
                    </div>
                      @endforeach
                        @else
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="text">
                                <p>"I highly recommend. The doctor on the platform are knowledgeable,
                                    professional, and genuinely care about their
                                    patients. I received excellent medical advice and prescriptions without
                                    the hassle of visiting a physical clinic."
                                </p>
                            </div>
                            <div class="author-info">
                                <figure class="author-thumb"><img src="{{asset('Pediatrics/assets/images/resource/testimonial-4.png')}}" alt=""></figure>
                                <h4>Paolo Dybala</h4>
                                <span class="designation">Martketer</span>
                            </div>
                        </div>
                    </div>
                      @endif 
                </div>
            </div>
        </section>

 