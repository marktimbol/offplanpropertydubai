<?php

namespace App\Listeners;

use App\Events\UserDownloadedAProjectBrochure;
use App\Mail\DownloadBrochureInquiry;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBrochureLinkToUser
{
    /**
     * Handle the event.
     *
     * @param  UserDownloadedAProjectBrochure  $event
     * @return void
     */
    public function handle(UserDownloadedAProjectBrochure $event)
    {
        Mail::to($event->user)->send(new DownloadBrochureInquiry($event->user, $event->project));
    }
}
