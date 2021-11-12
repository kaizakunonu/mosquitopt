<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Consent;

class CreatingNewModel
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The ed instance.
     *
     * @var Consent
     */
    public $ed;

    /**
     * Create a new event instance.
     *@param Consent $ed
     * @return void
     */
    public function __construct(Consent $ed)
    {
        $this->ed = $ed;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
