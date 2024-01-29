 <section class="banner-section centred style-three" style="background-image:url({{asset('Pediatrics/assets/images/banner/banner-bg-2.jpg)')}};">
            <div class="anim-icon">
                <div class="icon icon-1 float-bob-y" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-1.png)')}};"></div>
                <div class="icon icon-2" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-2.png)')}};"></div>
                <div class="icon icon-3 rotate-me" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-3.png)')}};"></div>
                <div class="icon icon-4 rotate-me" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-4.png)')}};"></div>
                <div class="icon icon-5" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-5.png)')}};"></div>
                <div class="icon icon-6" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-6.png)')}};"></div>
                <div class="icon icon-7" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-7.png)')}};"></div>
                <div class="icon icon-8 float-bob-y" style="background-image: url({{asset('Pediatrics/assets/images/icons/anim-icon-8.png)')}};"></div>
            </div>
            <div class="pattern-layer" style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-67.png)')}};"></div>
            <div class="auto-container">
                <div class="content-box">
                    
                       @if(isset($data) && $data->sub_heading != '')
                       <h2 data-animation="animated slideInDown" class="mb-5 text-white"> <?php echo $data->sub_heading ?></h2>
                        @else
                     
                        <h4>We bring their world into <span> Focus</span></h4>
                        @endif
                        <p class="mb-5"> @if($data) {{$data->short_desc != '' ? $data->short_desc	  : '  we are dedicated to preserving and enhancing your vision through exceptional eye care
                            services. Your eyesight is precious, and we are committed to providing you with the
                            highest standard of care to ensure optimal eye health.' }} @endif
                        .</p>
                   
                    <div class="form-inner">
                        <a href="callto:+919999999999" class="theme-btn-three mb-2">Call now<i class="icon-Arrow-Right"></i></a>
                        <a href="#appointment" class="theme-btn-three">Book appointment <i class="icon-Arrow-Right"></i></a>

                    </div>
                </div>
            </div>
        </section>


 

 