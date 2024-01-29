<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class DoctorAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $user;


    public $userEmail;
    public $userPassword;

    public function __construct($userEmail, $userPassword)
    {
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function build()
    {
        return $this->subject('Welcome to our website')
            ->view('Emails.doctor_added')
            ->with([
                'userEmail' => $this->userEmail,
                'userPassword' => $this->userPassword,
            ]);
    }
}