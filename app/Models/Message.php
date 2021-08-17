<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'user_id', 
        'body', 
        'receiver_id',  
        'edited', 
        'deleted', 
        'room_id', 
        'reply_message_id',
        'attach_url', 
        'attach_name', 
        'attach_type', 
        'type', 
        'seen'
    ];

    protected $appends = ['selfMessage'];

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'avatar', 'name']);;
    }

    public function replyMessage()
    {
        $replyMessage = Message::where('id', $this->reply_message_id)->get();
        return $replyMessage;
    }
}
