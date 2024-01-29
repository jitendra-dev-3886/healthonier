<!-- Testimonials section two -->
<div class="testimonials-area carousel-shadow bg-gray default-padding" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Patient <span>Testimonials</span></h2>
                        <p>
                            While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                            examine express promise no. Past add size game cold girl off how old
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-items testimonial-carousel owl-carousel owl-theme">
                        <!-- Single Item -->
                      @if($test->isNotEmpty())
                    @foreach($test as $item)
                    <div class="item">
                            <div class="content">
                                <p>
                                {{$item->review}}
                                </p>
                            </div>
                            <div class="provider">
                                <div class="thumb">
                                    <img src="@if($item) {{$item->profile_path != ''? asset($item->profile_path):asset('Physiotherapis/assets/img/team/6.jpg')}} @endif" alt="Thumb">
                                </div>
                                <div class="info">
                                    <h4>{{$item->name}}</h4>
                                   
                                </div>
                            </div>
                        </div>

                    @endforeach
                    @else
                        <div class="item">
                            <div class="content">
                                <p>
                                    Departure so attention pronounce satisfied daughters am. But shy tedious pressed
                                    studied opinion entered windows off. Advantage dependent suspicion convinced
                                    provision him yet. Mr immediate remaining conveying allowance do or.
                                </p>
                            </div>
                            <div class="provider">
                                <div class="thumb">
                                    <img src="{{asset('Mental/assets/img/team/6.jpg')}}" alt="Thumb">
                                </div>
                                <div class="info">
                                    <h4>Angle Natasha</h4>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

