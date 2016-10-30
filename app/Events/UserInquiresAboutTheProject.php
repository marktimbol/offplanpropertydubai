<?php

namespace App\Events;

use App\Inquiry;
use App\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class UserInquiresAboutTheProject
{
    use InteractsWithSockets, SerializesModels;
    
    public $inquiry;

    public $project;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry, Project $project)
    {
        $this->inquiry = $inquiry;
        $this->project = $project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
