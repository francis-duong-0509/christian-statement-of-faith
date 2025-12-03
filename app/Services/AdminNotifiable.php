<?php

namespace App\Services;

use Illuminate\Notifications\Notifiable;

class AdminNotifiable
{
    use Notifiable;

    public function routeNotificationForMail(): string
    {
        return config('app.admin_email', env('ADMIN_NOTIFICATION_EMAIL', 'duonganhhao4751@gmail.com'));
    }
}