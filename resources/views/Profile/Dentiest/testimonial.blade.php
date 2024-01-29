     <!-- Testimonials section two -->
     <section class="testimonials-section-two style-two pt-0" id="testimonials">
         <div class="auto-container">
             <div class="row">
                 <div class="col-lg-5">
                     <div class="image">
                         <img src="{{asset('Dentiest/assets/images/resource/image-23.jpg')}}" alt="">
                     </div>
                 </div>
                 <div class="col-lg-7">
                     <div class="content-block">
                         <div class="sec-title">
                             <div class="sub-title">Clients Testimonials</div>
                             <h2>What our clients say </h2>
                         </div>
                         <div class="testimonials-area">
                             <div class="quote-icon"><i class="docpoint-icon-14"></i></div>
                             <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "center": false, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "1" }, "1200":{ "items" : "1" }}}'>
                               @if($test->isNotEmpty())
                                 @foreach($test as $item)
                                 <div class="testimonial-block-two">
                                     <div class="inner-box">
                                         <div class="text">{{$item->review}}</div>
                                         <div class="author-info">
                                             <div class="thumb"><img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif" alt=""></div>
                                             <h4>{{$item->name}}</h4>
                                             <div class="designation">{{$item->designation}}</div>
                                         </div>
                                     </div>
                                 </div>
                                 @endforeach
                                 @else
                                 <div class="testimonial-block-two">
                                     <div class="inner-box">
                                         <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</div>
                                         <div class="author-info">
                                             <div class="thumb"><img src="{{asset('Cardio/assets/images/resource/author-2.jpg ')}}" alt=""></div>
                                             <h4>Kelly Coleman</h4>
                                             <div class="designation">Nulla nec</div>
                                         </div>
                                     </div>
                                 </div>
                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
