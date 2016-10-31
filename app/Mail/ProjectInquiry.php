<?php

namespace App\Mail;

use App\Inquiry;
use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry, Project $project)
    {
        $this->inquiry = $inquiry;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = sprintf('Off Plan Property Inquiry: %s by %s', 
                        $this->project->name, 
                        $this->project->developer->name
                    );
        
        return $this->view('emails.inquiry')
                    ->subject($subject);
    }
}
