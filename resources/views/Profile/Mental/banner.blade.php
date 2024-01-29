<!-- banner-section -->
<div class="banner-area top-pad-50p bg-gradient border-shape responsive-auto-height text-small">
        <div class="item">
            <div class="box-table">
                <div class="box-cell">
                    <div class="container">
                        <div class="row">
                            <div class="content double-items">

                                <div class="col-md-7 col-sm-6 animated slideInLeft">
                                    @if(isset($data) && $data->doctor_name != '')
                                    <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                                        Dr.
                                        <?php echo $data->doctor_name ?>
                                    </h4>
                                    @else
                                    <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                                    @endif
                                <h1>@if($data) {{$data->sub_heading != '' ?
                                    $data->sub_heading : 'Best Care & Better Doctor' }} @endif</h1>
                                    <p >
                                    @if($data) {{$data->short_desc != '' ? $data->short_desc : 'Better health care with
                                    efficient cost is the main focuse of our hospital.' }} @endif
                                    </p>
                                    <a  class="btn btn-light effect btn-md"
                                        href="#appointment">Book Appointment</a>
                                </div>

                                <div class="col-md-5 col-sm-6 thumb animated slideInRight">
                                    <img src="<?php echo $data->doctor_banner_path ? asset($data->doctor_banner_path) : asset('Mental/assets/img/banner/banner.png'); ?> " alt="Thumb">
                                </div>

                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>


<!-- banner-section end -->