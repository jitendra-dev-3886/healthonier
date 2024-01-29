<section id="working" class="section features">

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="section-title text-center mb-4">

                <h1>Working Hours</h1>

                <p class="section-subtitle mx-auto">There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in some form.</p>

            </div>

        </div>

    </div>

    <div class="row">


        <div class="col-md-6">

            <div class="ftr-icon-box wow fadeInUp" data-wow-delay="0.3s">

                <div class="icon"><i class="icofont-doctor"></i></div>

                <h4 class="title">
                    DR. MORIS JANES TIME SCHEDULE</h4>

                <p class="description">@if($data) {{$data->working_hour_content != '' ? $data->working_hour_content	  : 'The working hours structure may vary depending on the medical specialty, healthcare facility policies, and local regulations. Its important for doctors to comply with any specific requirements in their practice area. ' }} @endif
                                    
                                </p>
                <button class="btn book-now-btn  mt-5">Call Now
                </button>
            </div>

        </div>

        <div class="col-md-6">

            <div class="ftr-icon-box wow fadeInUp" data-wow-delay="0.6s">

                <div class="icon"><i class="icofont-wall-clock"></i></div>

                <h4 class="title">24/7 Hours Service</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th> Location</th>
                                <th>Day</th>
                                <th>Time</th>
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
            <td>{{$item->name}}</td>
            <?php
            // $timeslot = Timeslot::where('id', $item->timeslot_id)->first();
            // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
            // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
            // $label = $startTime . ' - ' . $endTime;

            // $weeklyDays = unserialize($item->weekday_id);
            // $days = [];
            // foreach ($weeklyDays as $dayId) {
            //     $day = Weekday::where('id', $dayId)->value('days');
            //     if ($day) {
            //         $days[] = $day;
            //     }
            // }

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
            {{-- <td>{{$label}}</td> --}}
        </tr>
        @endforeach
    
    </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

</section>