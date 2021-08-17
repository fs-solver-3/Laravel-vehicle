<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportMessageUnread extends Model
{
    //
    protected $fillable = ['last_message',
    'user_id',
    'receiver_id', 
    'support_id', 
    'unread', 
    'channel_name', 
    'complete'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}