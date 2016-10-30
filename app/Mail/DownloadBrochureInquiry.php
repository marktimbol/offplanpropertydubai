<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DownloadBrochureInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $project)
    {
        $this->user = $user;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = sprintf('Download %s Brochure', $this->project->name);
        return $this->view('emails.download-brochure')->subject($subject);
    }
}
