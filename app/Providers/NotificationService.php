<?php

namespace App\Providers;

use App\Models\Notification;

class NotificationService
{
    public static function createNotification($doctorId, $type, $message)
    {
        $notificationData = new Notification();
        $notificationData->user_id = $doctorId;
        $notificationData->type = $type;
        $notificationData->message = $message;
        $notificationData->read = 0;
        $notificationData->save();
    }
}
