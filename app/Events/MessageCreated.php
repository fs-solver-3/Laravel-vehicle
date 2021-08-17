<?php

namespace App\Events;

use App\Models\Message;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastWith()
    {
        $this->message->load(['user']);
        if ($this->message->reply_message_id != NULL) {
            $replyContent = Message::findOrfail($this->message->reply_message_id)->body;
            $replyName = User::findOrfail(Message::findOrfail($this->message->reply_message_id)->user_id)->name;
        } else {
            $replyContent = null;
            $replyName = null;
        }
        $replyContent = null;
        $replyName = null;
        return [
            'message' => array_merge($this->message->toArray(), [
                'selfMessage' => false,
                'replyContent' => $replyContent,
                'replyName' => $replyName,
            ])
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat');
    }
}
