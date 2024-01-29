<section class="team-section" id="team">
    <div class="auto-container">
        <div class="sec-title centred">
            <p> Our Availability</p>
            <h2>Working hours</h2>
        </div>
        <?php
            use App\Models\Weekday;
            use App\Models\Timeslot;
            use Carbon\Carbon;
    
            ?>
        <div class="row clearfix m-0">
            <div class="col-lg-12 col-md-12 col-sm-12 team-block">
                <div class="pricing-block-one">
                    <div class="working_ours active">
                        <div class="table-content m-0">
                            <div class="table-responsive mb-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            @foreach($clinic as $item)
                                            <?php  $days = unserialize($item->weekday_id); ?>
                                            <td>{{ $item->name }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($days as $dayId)
                                        <?php $day = Weekday::where('id', $dayId)->first(); ?>
                                        <tr>
                                            <td>{{ $day->days }}</td>
                                            @foreach($clinic as $item)
                                            <?php 
                                                $timeslot = Timeslot::where('id', $item->timeslot_id)->first();
                                                if($timeslot){
                                                    $startTime = Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('h:i A');
                                                    $endTime = Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('h:i A');
                                                    $label = $startTime . ' - ' . $endTime;
                                                } else {
                                                    $label = 'N/A';
                                                }
                                            ?>
                                            <td>{{ $label }}</td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="{{ count($clinic) + 1 }}">
                                                <h3>Time's are not Flexible?</h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <a href="#appointment" class="btn-theme-one text-center">BOOK CHECKUP TIME</a>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>