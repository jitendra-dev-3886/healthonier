<section id="working" class="why-choose-wrap style1 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <span>OUR AVAILABILITY</span>
                    <h2>Working Hours</h2>
                </div>
            </div>
        </div>
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="book-appointment style1 bg-f">
                    <div class="overlay bg-prussian op-95"></div>

                    <div class="content-box">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <?php
                                use App\Models\Weekday;
                                use App\Models\Timeslot;
                                use Carbon\Carbon;

                                ?>

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
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="wh-content">
                    <div class="service-info">
                        <div class="service-title">

                            <h3>Dr.@if($data) {{$data->doctor_name != '' ? $data->doctor_name : 'Name' }} @endif</h3>
                        </div>
                        <p>
                            @if($data){{$data->working_hour_content != '' ? $data->working_hour_content: ' The working
                            hours structure may vary depending on the medical specialty, healthcare
                            facility policies, and local regulations. Its important for doctors to comply with
                            any specific requirements in their practice area.' }}@endif
                        </p>
                        <a href="#" class="btn style1"><i class="ri-cellphone-line"></i>Call Now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>