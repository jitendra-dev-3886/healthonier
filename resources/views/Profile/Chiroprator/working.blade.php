<section class="team-section" id="team">
    <div class="auto-container">
        <div class="sec-title centred">
            <p> Our Availability</p>
            <h2>Working hours</h2>
        </div>
        <div class="row clearfix">
            <?php
            use App\Models\Weekday;
            use App\Models\Timeslot;
            use Carbon\Carbon;
    
            ?>
            @foreach($clinic as $item)
            <div class="col-lg-4 col-md-4 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="working_ours">
                        <div class="table-content m-0">
                            <div class="table-responsive mb-4">
                                <h3>{{$item->name}}</h3>
                                <?php 
                                // $timeslot = Timeslot::where('id', $item->timeslot_id)->first();
                                // $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                                // $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                                // $label = $startTime . ' - ' . $endTime;
                                // $weeklyDays = unserialize($item->weekday_id);
            ?>

                                <table class="table mb-0">
                                    <tbody>
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


                                        <tr>
                                            <th align="center" colspan="3">
                                                Time's are not Flexible?
                                            </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="#appointment" class="btn-theme-two btn-block text-center">BOOK CHECKUP TIME</a>

                    </div>
                </div>

            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-4 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="working_ours">
                        <div class="table-content m-0">
                            <div class="table-responsive mb-4">
                                <h3>Clinic 1</h3>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Mon - Wed </td>
                                            <td> 8AM - 7PM </td>
                                            <td> <a href="#appointment" class="btn-theme-two">Book</a> </td>
                                        </tr>
                                        <tr>
                                            <td>Thursday </td>
                                            <td> 8AM - 9PM</td>
                                            <td> <a href="#appointment" class="btn-theme-two">Book</a> </td>

                                        </tr>

                                        <tr>
                                            <td>Friday </td>
                                            <td>8AM - 5PM</td>
                                            <td> <a href="#appointment" class="btn-theme-two">Book</a> </td>

                                        </tr>
                                        <tr>
                                            <td>Sat - Sunday </td>
                                            <td>Closed</td>
                                            <td></td>

                                        </tr>

                                        <tr>
                                            <th align="center" colspan="3">
                                                Time's are not Flexible?
                                            </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="#appointment" class="btn-theme-two btn-block text-center">BOOK CHECKUP TIME</a>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="working_ours active bg-color-theme">
                        <div class="table-content m-0">
                            <div class="table-responsive mb-4">
                                <h3>Clinic 2</h3>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Mon - Wed </td>
                                            <td> 8AM - 7PM </td>
                                            <td> <a href="#appointment" class="btn-theme-light">Book</a> </td>
                                        </tr>
                                        <tr>
                                            <td>Thursday </td>
                                            <td> 8AM - 9PM</td>
                                            <td> <a href="#appointment" class="btn-theme-light">Book</a> </td>

                                        </tr>

                                        <tr>
                                            <td>Friday </td>
                                            <td>8AM - 5PM</td>
                                            <td> <a href="#appointment" class="btn-theme-light">Book</a> </td>

                                        </tr>
                                        <tr>
                                            <td>Sat - Sunday </td>
                                            <td>Closed</td>
                                            <td></td>

                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                Time's are not Flexible?
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <a href="#appointment" class="btn-theme-light btn-block text-center">BOOK CHECKUP TIME</a>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="working_ours active">
                        <div class="table-content m-0">
                            <div class="table-responsive mb-4">
                                <h3>Clinic 3</h3>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Mon - Wed </td>
                                            <td> 8AM - 7PM </td>
                                            <td> <a href="#appointment" class="btn-theme-one">Book</a> </td>
                                        </tr>
                                        <tr>
                                            <td>Thursday </td>
                                            <td> 8AM - 9PM</td>
                                            <td> <a href="#appointment" class="btn-theme-one">Book</a> </td>

                                        </tr>

                                        <tr>
                                            <td>Friday </td>
                                            <td>8AM - 5PM</td>
                                            <td> <a href="#appointment" class="btn-theme-one">Book</a> </td>

                                        </tr>
                                        <tr>
                                            <td>Sat - Sunday </td>
                                            <td>Closed</td>
                                            <td></td>

                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                Time's are not Flexible?
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <a href="#appointment" class="btn-theme-one btn-block text-center">BOOK CHECKUP TIME</a>

                        </div>

                    </div>
                </div>

            </div> --}}

        </div>
    </div>
</section>
