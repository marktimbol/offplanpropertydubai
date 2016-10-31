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
<<<<<<< HEAD
        Mail::to($event->user)->send(new DownloadBrochureInquiry($event->user, $event->project));
=======
        Mail::to($event->user)
            ->send(new DownloadBrochureInquiry($event->user, $event->project));
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
    }
}
