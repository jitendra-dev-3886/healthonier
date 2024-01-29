  <!-- Start Banner 
    ============================================= -->
  <div class="banner-area top-pad-50p bg-gradient border-shape responsive-auto-height text-small">
      <div class="item">
          <div class="box-table">
              <div class="box-cell">
                  <div class="container">
                      <div class="row">
                          <div class="content double-items">
                              <div class="col-md-7 col-sm-6">
                                @if(isset($data) && $data->doctor_name != '')
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">
                            Dr.
                            <?php echo $data->doctor_name ?>
                        </h4>
                        @else
                        <h4 style="color: #070707; font-size: 1.5em; font-weight: bold;">Dr. Puneet Verma</h4>
                        @endif
                              @if(isset($data) && $data->sub_heading != '')
                      <h4>  <?php echo $data->sub_heading ?></h4>
                        @else
                     
                        <h1 data-animation="animated slideInRight">Best care for your Good health</h1>
                        @endif
                                  <!-- <h1 data-animation="animated slideInRight">Best care for your Good health</h1> -->
                                  <p data-animation="animated slideInUp">
                                  @if($data){{$data->short_desc != '' ? $data->short_desc:'The ourselves suffering the sincerity. Inhabit her manners adapted age certain.
                                      Debating offended at branched striking be subjects.'}} @endif
                                      
                                  </p>
                                  <a data-animation="animated slideInUp" class="btn btn-light effect btn-md" href="#appointment">Book Appointment</a>
                              </div>

                              <div class="col-md-5 col-sm-6 thumb">
                                  <img src="@if($data) {{$data->doctor_banner_path != '' ? asset($data->doctor_banner_path) : asset('Physiotherapis/assets/img/banner/banner.png')}} @endif"" alt="Thumb">
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Banner -->
