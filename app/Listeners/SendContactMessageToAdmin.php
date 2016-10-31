<?php

namespace App\Listeners;

use App\Events\UserSendsMessageThroughContactForm;
use App\Listeners\SendContactMessageToAdmin;
use App\Mail\ContactMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMessageToAdmin
{
    /**
     * Handle the event.
     *
     * @param  UserSendsMessageThroughContactForm  $event
     * @return void
     */
    public function handle(UserSendsMessageThroughContactForm $event)
    {
        $to = config('mail.from.address');

        Mail::to($to)->send(new ContactMessage($event->contact) );
    }
}
