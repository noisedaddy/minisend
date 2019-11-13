<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Login;

class SyncLoginTimes
{
    public function handle(Login $event)
    {
        $dateTime = date('Y-m-d H:i:s');

        $update = [
            'last_login' => $dateTime
        ];

        if (!$event->user->first_login) {
            $event->user->first_login = $dateTime;
        }

        $event->user->update($update);
    }
}
