<section class="about_section section_padding" id="about">
    <div class="container custom_container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section_tittle_style_02">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s"> <span class="title_overlay_effect"> 
                        Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : ' Your Name' }} @endif </span></h2>
                    {{-- <p class="description wow fadeInDown" data-wow-delay=".3s">
                        early education and childcare services for working families to ensure every child.</p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="img_section">
                    <img src="{{ asset('Childcare/assets/img/about_img_1.png') }}" alt="#" class="about_img_1" data-parallax="{&quot;x&quot;: 0, &quot;y&quot;: 30, &quot;rotateZ&quot;:0}">
                    <img src="@if($data) {{$data->image_path != '' ? asset($data->image_path)	  : asset('Childcare/assets/img/about_img_2.png') }} @endif" alt="#" class="about_img_2">
                    <img src="{{ asset('Childcare/assets/img/about_img_3.png') }}" alt="#" class="about_img_3" data-parallax="{&quot;x&quot;: 0, &quot;y&quot;: -50, &quot;rotateZ&quot;:0}">
                </div>
            </div>
            <div class="col-lg-5 col-xl-5">
                <div class="about_section_content">
                    <p class="wow fadeInDown" data-wow-delay=".3s">Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : ' Your Name' }} @endif @if($data) {{$data->about != '' ? $data->about	  : ' wong completed his post graduation
                        in masters of dental surgery MDS in the field of Pedodontics and preventive dentistry, from
                        the esteemed Bapuji Dental College, Davangere, a Karnataka, India. He is now serving as
                        professor and HOD in the department of pediatric dentistry. ' }} @endif</p>


                    <div class="event_part mt-4">

                        <div class="single_event_list wow fadeInDown" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                            <div class="event_date">
                                <img src="{{ asset('Childcare/assets/img/doctor.png') }}">
                            </div>
                            <div class="event_content">
                                <h4> <a href="#"> Doctor Specialist</a></h4>
                                <p>@if($data) {{$data->name != '' ? $data->name	  : ' Child Care Secialist' }} @endif</p>
                            </div>
                        </div>
                        <div class="single_event_list wow fadeInDown" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
                            <div class="event_date">
                                <img src="{{ asset('Childcare/assets/img/exp.png') }}">
                            </div>
                            <div class="event_content">
                                <h4> <a href="#"> Doctor Experiences</a></h4>
                                <p>@if($data) {{$data->experience != '' ? $data->experience	  : '4yr Experiences ' }} @endif</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
