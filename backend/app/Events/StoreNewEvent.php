<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class StoreNewEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $event;

    /**
     * Create a new event instance.
     */
    public function __construct($eventId){
        
        $this->event = $eventId;
        
        $this->event = Event::JoinTables()->select('events.id as event_id',
        'events.created_at',
        'event_name',
        'events.company_id as company_id_events',
        'companies.name as company_name')
        ->where('events.id', $eventId)->first();
        
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
           new Channel('store_event'),
        ];
    }

    public function broadcastAs(): string {

        return 'store_event';
    }
    public function broadcastWith(){
        
        return [
        'id' => $this->event->event_id,
        'event_name' => $this->event->event_name,
        'created_at' => \Carbon\Carbon::parse($this->event->created_at)->diffForHumans()
    ];
    }
}
