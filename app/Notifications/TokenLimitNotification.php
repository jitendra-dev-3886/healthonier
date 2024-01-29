<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TokenLimitNotification extends Notification
{
    use Queueable;

    public $doctorId;
    public $clinicId;

    public function __construct($doctorId, $clinicId)
    {
        $this->doctorId = $doctorId;
        $this->clinicId = $clinicId;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Token Limit Notification')
            ->line('Your clinic has reached the maximum token limit.')
            ->line("Doctor ID: {$this->doctorId}")
            ->line("Clinic ID: {$this->clinicId}")
            ->action('Increase Token Limit', url('/dashboard'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    // Implement the via method to specify the notification channels
    public function via($notifiable)
    {
        return ['mail'];
    }
}
