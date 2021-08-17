<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\SupportMessage;
use Illuminate\Support\Facades\Auth;

class Demands extends Model
{
    //
    protected $table = 'demands';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'user_id',
        'support_id',
        'state',
        'message',
        'attach',
        'deadline',
        'category_id',
        'archive',
        'last_author',
        'demand_status_id',
        'demand_criticality_id',
        'demand_complexity_id',
        'demand_score_id',
        'demand_level_id'

    ];
    protected $dates = [
        'updated_at',
        'created_at'
    ];
    protected $appends = ['diffInDays','indicator'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function support()
    {
        return $this->belongsTo('App\User', 'support_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    public function status()
    {
        return $this->belongsTo('App\Models\DemandStatus', 'demand_status_id');
    }

    public function indicatorUser()
    {
        try {
            if ($this->archive == true) {
                $result = 5;
            } else {
                if (SupportMessage::where('room_id', $this->id)->where('support_id', $this->support_id)->orderBy('id', 'DESC')->count() > 0) {
                    $lastMessage = SupportMessage::where('room_id', $this->id)->orderBy('id', 'DESC')->first();
                    // return $lastMessage->id;
                    if ($lastMessage->user_id == Auth::user()->id) {
                        $result = 1;
                    } else {
                        $result = 2;
                    }
                } else {
                    return 0;
                }
            }
            return $result;
        } catch (\Throwable $th) {
            return 0;
            //throw $th;
        }
    }

    public function indicator()
    {
        try {
            if ($this->archive == true) {
                $result = 5;
            } else {
                if (SupportMessage::where('room_id', $this->id)->where('support_id', $this->support_id)->orderBy('id', 'DESC')->count() > 0) {
                    $lastMessage = SupportMessage::where('room_id', $this->id)->where('support_id', $this->support_id)->orderBy('id', 'DESC')->first();

                    if ($lastMessage->user_id == $lastMessage->receiver_id) {

                        if ($lastMessage->support_id == Auth::user()->id) {
                            $result = 1;
                        } else {
                            $result = 2;
                        }
                    } else {
                        if ($lastMessage->support_id == Auth::user()->id) {
                            $result = 3;
                        } else {
                            $result = 4;
                        }
                    }
                } else {
                    if ($this->support_id == Auth::user()->id) {
                        $result = 1;
                    } else {
                        $result = 2;
                    }
                }
            }
            return $result;
        } catch (\Throwable $th) {
            return null;
            //throw $th;
        }
    }

    public function countByRed($support_id)
    {
    }


    public function getDiffInDaysAttribute()
    {
        if (!empty($this->created_at) && !empty($this->updated_at)) {
            return $this->updated_at->diffInDays($this->created_at);
        }
    }
    public function getIndicatorAttribute()
    {
        try {
            if ($this->archive == true) {
                $result = 5;
            } else {
                if (SupportMessage::where('room_id', $this->id)->where('support_id', $this->support_id)->orderBy('id', 'DESC')->count() > 0) {
                    $lastMessage = SupportMessage::where('room_id', $this->id)->where('support_id', $this->support_id)->orderBy('id', 'DESC')->first();

                    if ($lastMessage->user_id == $lastMessage->receiver_id) {

                        if ($lastMessage->support_id == Auth::user()->id) {
                            $result = 1;
                        } else {
                            $result = 2;
                        }
                    } else {
                        if ($lastMessage->support_id == Auth::user()->id) {
                            $result = 3;
                        } else {
                            $result = 4;
                        }
                    }
                } else {
                    if ($this->support_id == Auth::user()->id) {
                        $result = 1;
                    } else {
                        $result = 2;
                    }
                }
            }
            return $result;
        } catch (\Throwable $th) {
            return null;
            //throw $th;
        }

    }
}
