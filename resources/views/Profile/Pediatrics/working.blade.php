<!-- working-hours-section -->
<section class="team-section" id="team">
    <div class="auto-container">
        <div class="sec-title centred">
            <p> Our Availability</p>
            <h2>Working hours</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInLeft animated animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="pattern">
                            <div class="pattern-1"
                                style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-24.png')}});">
                            </div>
                            <div class="pattern-2"
                                style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-25.png')}});">
                            </div>
                        </div>
                        <div class="content-box">
                            <h1 class="mb-4 timing_title">Dr.@if($data) {{$data->doctor_name != '' ? $data->doctor_name
                                : 'Name' }} @endif</h1>

                            <p>
                                @if($data){{$data->working_hour_content != '' ? $data->working_hour_content: ' The
                                working
                                hours structure may vary depending on the medical specialty, healthcare
                                facility policies, and local regulations. Its important for doctors to comply with
                                any specific requirements in their practice area.' }}@endif
                            </p>
                            <a href="#" class="theme-btn-one mt-5">
                                Call Now<i class="icon-Arrow-Right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="pricing-table active">
                        <div class="pattern">
                            <div class="pattern-1"
                                style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-75.png')}});">
                            </div>
                            <div class="pattern-2"
                                style="background-image: ({{asset('Pediatrics/assets/images/shape/shape-76.png')}});">
                            </div>
                            <div class="pattern-3"
                                style="background-image: url({{asset('Pediatrics/assets/images/shape/shape-77.png')}});">
                            </div>
                        </div>
                        <?php
                        use App\Models\Weekday;
                        use App\Models\Timeslot;
                        use Carbon\Carbon;

                        ?>
                        <div class="table-content m-0">
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
                                        @foreach($clinic as $item)
                                        <tr>
                                            <td>{{$item->name}} </td>
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
</section>