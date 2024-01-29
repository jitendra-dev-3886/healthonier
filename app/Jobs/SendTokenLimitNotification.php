<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\TokenLimitReached;
use App\Models\Doctor;
class SendTokenLimitNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $tries = 3; 

    public $timeout = 60;
    public $doctorId;

    public function __construct($doctorId)
    {
        $this->doctorId = $doctorId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $doctor = Doctor::find($this->doctorId);
        if ($doctor) {
            $doctor->notify(new TokenLimitReached());
        }
    }
}
