<?php

namespace App\Models;
use App\User;

use App\Events\RideRequestApproved;
use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rides_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ride_id', 'enroute_city_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ride()
    {
        return $this->belongsTo(Listings::class, 'ride_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enrouteCity()
    {
        return $this->belongsTo(EnrouteCity::class)->orderBy('order_from_source');
    }

    /**
     * Approve ride request.
     *
     * @return $this
     */
    public function approve()
    {
        $this->status = 'approved';
        $this->save();

        event(new RideRequestApproved($this));

        return $this;
    }

    /**
     * Reject ride request.
     *
     * @return $this
     */
    public function reject()
    {
        $this->status = 'rejected';
        $this->save();

        return $this;
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
