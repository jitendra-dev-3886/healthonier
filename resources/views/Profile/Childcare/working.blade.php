<section class="program_list program_list_page pt-5" id="program_list">
    <style>
        .content-box {
    text-align: left !important;
}
        </style>
    <div class="container custom_container" id="working">
        <div class="row">
            <div class="col-md-12">
                <h2 class="kid_title mb-4 "> <span class="title_overlay_effect">Working Hours</span></h2>

            </div>
            <div class="col-md-12">
                <div class="rows grid program_list_filter">
                    <div class="col-lg-6 col-sm-12 col-md-6 grid-item Kindergarten Story">
                        <div class="single_program_list wow fadeInUp" data-wow-delay=".4s">

                            <div class="single_program_list_content">
                                <h4>Time Schedule</a></h4>
                                <p>@if($data) {{$data->working_hour_content != '' ? $data->working_hour_content	  : 'The working hours structure may vary depending on the medical specialty, healthcare facility policies, and local regulations. Its important for doctors to comply with any specific requirements in their practice area. ' }} @endif
                                    
                                </p>
                                <div class="mt-3">
                                    <a href="#" class="cu_btn btn_2">Call Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6 grid-item Kindergarten Story">
                        <div class="single_program_list wow fadeInUp" data-wow-delay=".4s">
                            <div class="single_program_list_content">

                                <div class="content-box">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th> Location</th>
                                                    <th>Day</th>
                                                    {{-- <th>Time</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 use App\Models\Weekday;
                                                 use App\Models\Timeslot;
                                                 use Carbon\Carbon;
                                                ?>
                                                @foreach($clinic as $item)
                                                <tr>
                                                    <td>{{$item->name}} </td>
                                                    <?php 
                                                    // $timeslot = Timeslot::where('id', $item->timeslot_id)->first();
                                                    // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                                                    // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                                                    // $label = $startTime . ' - ' . $endTime;
                                                   
                                                    //  $weeklyDays = unserialize($item->weekday_id);
                                                    //  $days = [];
                                                    //  foreach ($weeklyDays as $dayId) {
                                                    //      $day = Weekday::where('id', $dayId)->value('days');
                                                    //      if ($day) {
                                                    //          $days[] = $day;
                                                    //      }
                                                    //  }
                                                     
                                                    ?>
                                                     <td>
                                                        <?php
                                                        $clinic_availabilities = $item->clinic_availabilities; 
                                                        
                                                        $shortenedDays = array_map(function($day) {
                                                            return substr($day, 0, 3);
                                                        }, $clinic_availabilities);
                                                        
                                                        $newJsonString = json_encode($shortenedDays);
                                                        echo $newJsonString;
                                                        ?>
                                                        
                                                    </td>
                                                    {{-- <td> {{$label}} </td> --}}
                                                </tr>
                                                @endforeach
                                                <!-- <tr>
                                                    <td>Delhi </td>
                                                    <td>Monday - Friday</td>
                                                    <td>02:00 pm To 05:00 pm </td>
                                                </tr> -->

                                                <!-- <tr>
                                                    <td>Gurgaon </td>
                                                    <td>Monday - Saturday</td>
                                                    <td> 07:00 pm To 09:00 pm </td>
                                                </tr> -->

                                                <tr>
                                                    <th align="center" colspan="3">
                                                        We will be available on call on Sunday </th>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="list_animation_1">
            <div data-parallax="{&quot;x&quot;: 2, &quot;y&quot;: 120, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/story_animation_5.png') }}" alt="#">
            </div>
        </div>
        <div class="list_animation_2">
            <div data-parallax="{&quot;x&quot;: 10, &quot;y&quot;: 100, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/event_6.png') }}" alt="#">
            </div>
        </div>
        <div class="list_animation_3">
            <div data-parallax="{&quot;x&quot;: 30, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/icon_8.png') }}" alt="#">
            </div>
        </div>
        <div class="list_animation_4">
            <div data-parallax="{&quot;x&quot;: 5, &quot;y&quot;: 105, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/contact_icon.png') }}" alt="#"></div>
        </div>
        <div class="list_animation_5">
            <div data-parallax="{&quot;x&quot;: 8, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/story_animation_5.png') }}" alt="#">
            </div>
        </div>
        <div class="list_animation_6">
            <div data-parallax="{&quot;x&quot;: 8, &quot;y&quot;: 110, &quot;rotateZ&quot;:0}"><img src="{{ asset('Childcare/assets/img/icon/icon_9.png') }}" alt="#">
            </div>
        </div>
        <div class="breadcrumb_animation_2">
            <div data-parallax="{&quot;x&quot;: 20, &quot;y&quot;: -100}">
                <img src="{{ asset('Childcare/assets/img/cta_img_2.png') }}" alt="#">
            </div>
        </div>
</section>
