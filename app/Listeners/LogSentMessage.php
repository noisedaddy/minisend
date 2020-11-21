<?php

namespace App\Listeners;

use App\Models\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;

class LogSentMessage
{

    /**
     * Handle the event.
     *
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {

        if (isset($event->data) && !empty($event->data['id'])){
            $email = Email::find($event->data['id']);
            $update = [
                'status' => $event->data['type']
            ];
            $email->update($update);
        }

    }
}
