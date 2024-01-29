<div id="working" class="top-entry-area   default-padding-bottom ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Working <span>Hours</span></h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item-box" style=" background: url({{asset('Mental/assets/img/pettern-01.png')}}) ;">
                    <!-- Single Item -->
                    <div class="col-md-6 single-item">
                        <div class="item text-center">
                            <i class="flaticon-doctor "></i>
                            <h4>
                                DR. David Ambrose Time Schedule</h4>
                            <p>@if($data) {{$data->working_hour_content != '' ? $data->working_hour_content	  : 'The working hours structure may vary depending on the medical specialty, healthcare facility policies, and local regulations. Its important for doctors to comply with any specific requirements in their practice area. ' }} @endif
                                    
                                </p>
                            <a class="btn btn-theme border btn-sm" href="#"><i class="fas fa-phone"></i> Call Now</a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-6 single-item">
                        <div class="item text-center">
                            <i class="flaticon-24-hours "></i>
                            <h4 >Opening Hours</h4>
                          

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
                    <!-- End Single Item -->

                </div>
            </div>
        </div>
    </div>