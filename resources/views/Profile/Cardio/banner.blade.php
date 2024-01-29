   <div class="banner-area text-dark" >
        <div id="bootcarousel" class="carousel slide animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner heading-uppercase text-dark">
                <div class="item active bg-cover" style="background-image: url(@if($data){{$data->doctor_background_banner_path != ''? asset($data->doctor_background_banner_path):asset('Cardio/assets/img/banner/3.jpg')}} @endif);">
                    <div class="box-table">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row align-items-center h90vh">
                                    <div class="col-md-6">
                                        <div class="mt20 banner_text"> 
                                            @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif
                                             @if(isset($data) && $data->sub_heading != '')
                       <h1 data-animation="animated slideInDown" class="mb-3"> <?php echo $data->sub_heading ?></h1>
                        @else
                     
                        <h4>We bring their world into <span> Focus</span></h4>
                        @endif
                        <h6 class="mb-4"> @if($data) {{$data->short_desc != '' ? $data->short_desc	  : '  we are dedicated to preserving and enhancing your vision through exceptional eye care
                            services. Your eyesight is precious, and we are committed to providing you with the
                            highest standard of care to ensure optimal eye health.' }} @endif
                        .</h6>
                        
                                            <a data-animation="animated slideInUp" class="btn btn-theme border btn-md" href="#appointment">Book Appointment</a>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="item bg-cover" style="background-image: url({{asset('Cardio/assets/img/banner/5.jpg')}});">-->
                <!--        <div class="box-table">-->
                <!--        <div class="box-cell">-->
                <!--             <div class="container">-->
                <!--                <div class="row align-items-center h90vh">-->
                <!--                    <div class="col-md-6">-->
                <!--                        <div class="mt30"> -->
                <!--                             @if(isset($data) && $data->sub_heading != '')-->
                <!--       <h2 data-animation="animated slideInDown" class="mb-3"> <?php echo $data->sub_heading ?></h2>-->
                <!--        @else-->
                     
                <!--        <h4>We bring their world into <span> Focus</span></h4>-->
                <!--        @endif-->
                <!--        <h6 class="mb-4"> @if($data) {{$data->short_desc != '' ? $data->short_desc	  : '  we are dedicated to preserving and enhancing your vision through exceptional eye care-->
                <!--            services. Your eyesight is precious, and we are committed to providing you with the-->
                <!--            highest standard of care to ensure optimal eye health.' }} @endif-->
                <!--        .</h6>-->
                        
                <!--                            <a data-animation="animated slideInUp" class="btn btn-theme border btn-md" href="#appointment">Book Appointment</a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                                   
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
              
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <!--<a class="left carousel-control" href="#bootcarousel" data-slide="prev">-->
            <!--    <i class="fa fa-angle-left"></i>-->
            <!--    <span class="sr-only">Previous</span>-->
            <!--</a>-->
            <!--<a class="right carousel-control" href="#bootcarousel" data-slide="next">-->
            <!--    <i class="fa fa-angle-right"></i>-->
            <!--    <span class="sr-only">Next</span>-->
            <!--</a>-->
        </div>
    </div>

 