<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    //
    protected $fillable = [
        'body',
        'user_id',
        'support_id', 
        'attach',
        'channel_name',
        'receiver_id',
        'edited',
        'deleted',
        'room_id',
        'reply_message_id',
        'attach_name',
        'attach_type',
        'type',
        'seen',
        'attach_url'
    ];

    protected $appends = ['selfMessage'];

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}