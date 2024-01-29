<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Weekday;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TokenLimitNotification;
use App\Providers\NotificationService;

class CheckBookingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:booking-status';
    protected $description = 'Check booking status and take actions';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->format('Y-m-d');


        // Get all doctors with their clinics and associated data
        $doctors = Doctor::with('clinics.availabilities.timeslots', 'user')->get();

        foreach ($doctors as $doctor) {
            foreach ($doctor->clinics as $clinic) {



                $Weekdays = Weekday::where('id', now()->dayOfWeek)->first();

                // Check if there is availability for today
                $availability = $clinic->availabilities->where('weekday_id', $Weekdays->id)->first();
                // \Log::info('Weekday: ' . json_encode($availability));

                if ($availability) {
                    $maxTokenLimit = $availability->timeslots->slots;
                    \Log::info('Weekday: ' . $maxTokenLimit);
                    $bookedTokensCount = Booking::where('token', '!=', '')
                        ->where('booking_date', $today)
                        ->where('clinic_id', $clinic->id)
                        ->count();

                    if ($bookedTokensCount >= $maxTokenLimit) {
                        // Send notification to the doctor
                        $doctorId = $doctor->id;

                        Notification::route('mail', $doctor->user->email)
                            ->notify(new TokenLimitNotification($doctorId, $clinic->name));
                        NotificationService::createNotification($doctor->user->id, 'Token Limit Notification', 'Your clinic booked with all the tokens Date:' . $today);


                    }
                }
            }
        }

        $this->info('Booking status checked.');
    }

}
