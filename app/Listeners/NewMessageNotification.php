<?php

namespace App\Listeners;

use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Support\Str;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessageNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewMessage  $event
     * @return void
     */
    public function handle(NewMessage $event)
    {
        $message = Message::create([
            'sender_id' => $event->message->receiver_id,
            'sender_type' => $event->message->receiver_type,
            'receiver_id' => $event->message->sender_id,
            'receiver_type' => $event->message->sender_type,
            'content' => Str::random(20)
        ]);
    }
}
