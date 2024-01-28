<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactNotification implements ShouldQueue
{
    public function handle(ContactCreated $event)
    {
        Mail::to('ioff205@gmail.com')->send(new \App\Mail\ContactNotification($event->contact));
    }
}
