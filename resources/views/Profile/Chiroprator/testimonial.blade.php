     <!-- Testimonials section two -->
     <section class="testimonial-style-two" id="#testimonial" style="background-image: url(https://clinic.xonierconnect.com/Chiropractor/assets/images/banner/banner-bg-3.jpg);background-position: center;">
      
            <div class="auto-container">
                <div class="sec-title centred">
                    <p>Testimonials</p>
                    <h2>Patient Experience </h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
               @if($test->isNotEmpty())
                                 @foreach($test as $item)
                                 <div class="testimonial-block-two">
                                     <div class="inner-box">
                                         <div class="text">{{$item->review}}</div>
                                         <div class="author-info">
                                             <div class="author-thumb"><img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif" alt=""></div>
                                             <h4>{{$item->name}}</h4>
                                             <div class="designation">{{$item->designation}}</div>
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
                                <figure class="author-thumb"><img src="assets/images/resource/testimonial-3.png" alt="">
                                </figure>
                                <h4>Amelia Anna</h4>
                                <span class="designation">Martketer</span>
                            </div>
                        </div>
                    </div>
                    @endif
                                   
                </div>
            </div>
        </section>


     
