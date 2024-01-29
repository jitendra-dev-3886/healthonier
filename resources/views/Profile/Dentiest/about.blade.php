 <!-- about section -->
 <section class="about__section" id="about">
     <div class="auto-container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="content__block">
                     <div class="sec-title mb-40">
                         <div class="sub-title">About Us <span class="text-decor"></span></div>
                         <h2>Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : ' Your Name' }} @endif</h2>
                         <div class="text">@if($data) {{$data->about != '' ? $data->about	  : '  Dr. David Ambrose completed his post graduation in masters of dental surgery MDS in the field of Pedodontics and preventive dentistry, from the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now serving as professor and HOD in the department of pediatric dentistry.' }} @endif</div>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                             <ul class="list">
                                 <li>
                                     <div class="work-process-block d-flex ">
                                         <div class="icon">
                                             <div class="shape"><img src="{{asset('Dentiest/assets/images/shape/shape-14.png')}}" alt=""></div>
                                             <i class="docpoint-icon-16"></i>
                                         </div>
                                         <div class="st-avatar-info pl-5">
                                             <h5>Doctor Specialist</h5>
                                             <p>@if($data) {{$data->name != '' ? $data->name	  : ' Dentist' }} @endif</p>
                                         </div>
                                 </li>

                             </ul>
                         </div>
                         <div class="col-md-6">
                             <ul class="list">
                                 <li>
                                     <div class="work-process-block d-flex ">
                                         <div class="icon">
                                             <div class="shape"><img src="{{asset('Dentiest/assets/images/shape/shape-16.png')}}" alt=""></div>
                                             <i class="docpoint-icon-25"></i>
                                         </div>
                                         <div class="st-avatar-info pl-5">
                                             <h5>Doctor Experiences</h5>
                                             <p>@if($data) {{$data->experience != '' ? $data->experience	  : '4yr Experiences ' }} @endif</p>
                                         </div>
                                 </li>
                             </ul>
                         </div>
                     </div>

                 </div>
             </div>


             <div class="col-lg-6">
                 <div class="image__block">
                     <div class="shape-1" data-parallax='{"y": 50}'><img src="{{asset('Dentiest/assets/images/shape/shape-4.png')}}" alt=""></div>
                     <div class="shape-2" data-parallax='{"y": 50}'><img src="{{asset('Dentiest/assets/images/shape/shape-5.png')}}" alt=""></div>
                     <div class="image-1" data-parallax='{"x": 30}'><img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Dentiest/assets/images/resource/image-3.png') }} @endif" alt=""></div>
                 </div>
             </div>
         </div>
     </div>
 </section>
