<!-- Testimonials section two -->
<section class="testimonial-wrap testimonial-bg-2 style2 bg-f ptb-100" id="testimonial">
    <div class="container">
        <div class="row mb-40">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title text-center style2">
                    <span>Testimonials</span>
                    <h2>What Our Client's Say?</h2>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-one style4 owl-carousel">
            @if($test->isNotEmpty())
            @foreach($test as $item)

            <div class="testimonial-card style8">
                <ul class="ratings list-style">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-half-line"></i></li>
                </ul>
                <p class="client-quote">{{$item->review}}</p>
                <div class="client-info-area">
                    <div class="client-info-wrap">
                        <div class="client-img">
                            <img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif"
                                alt="Image">
                        </div>
                        <div class="client-info">
                            <h3>{{$item->name}}</h3>
                            <span>{{$item->designation}}</span>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @else
            <div class="testimonial-card style8">
                <ul class="ratings list-style">
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-fill"></i></li>
                    <li><i class="ri-star-half-line"></i></li>
                </ul>
                <p class="client-quote">“It is a long established fact that reader will be distract by readable
                    content of a page wher looking at its layout. The point of using Lorm Ipsum is that it has.”
                </p>
                <div class="client-info-area">
                    <div class="client-info-wrap">
                        <div class="client-img">
                            <img src="assets/img/testimonials/client-1.jpg" alt="Image">
                        </div>
                        <div class="client-info">
                            <h3>Jim Morison</h3>
                            <span>Director, BAT</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>