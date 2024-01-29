<section class="banner_part home_two_banner" id="home">
    <div class="single_banner_part home_two_bg" style="background-image: url(@if($data){{$data->doctor_background_banner_path != ''? asset($data->doctor_background_banner_path):asset('Childcare/assets/img/home-banner.jpg')}} @endif);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 col-md-7">
                    <div class="banner_iner">
                        @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #333; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #333; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif

                        @if(isset($data) && $data->sub_heading != '')
                      <h5>  <?php echo $data->sub_heading ?></h5>
                        @else

                        <h1>WE SPECIALIZE IN PAEDIATRIC CARE<h1>
                                @endif
                                {{-- <h5>@if($data){{$data->sub_heading != '' ? $data->sub_heading:'WE SPECIALIZE IN PAEDIATRIC CARE'}} @endif</h5> --}}
                            <h6>@if($data){{$data->short_desc != '' ? $data->short_desc:'A Safe Care For Your Childrens Healt'}} @endif</h6>
                            <a href="#appointment" class="cu_btn btn_2">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="banner_animation_4">-->
        <!--    <div data-parallax="{&quot;x&quot;: 10, &quot;y&quot;: 150, &quot;rotateZ&quot;:0}">-->
        <!--        <img src="{{ asset('Childcare/assets/img/icon/banner_two_4.png') }}" alt="#">-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</section>
