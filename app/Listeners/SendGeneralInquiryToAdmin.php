<?php

namespace App\Listeners;

use App\Events\UserSubmitsAGeneralInquiry;
use App\Mail\GeneralInquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendGeneralInquiryToAdmin
{

    /**
     * Handle the event.
     *
     * @param  UserSubmitsAGeneralInquiry  $event
     * @return void
     */
    public function handle(UserSubmitsAGeneralInquiry $event)
    {
        $to = config('mail.from.address');
        Mail::to($to)
            ->send(new GeneralInquiry($event->inquiry));
    }
}
