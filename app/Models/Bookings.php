<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Listings;
use App\User;
class Bookings extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'listing_id',
        'total_people',
        'status',
        'type',
        'additional_info',
        'active',
        'driver_id',
        'amount',
        'currency',
        'funded',
        'completed',
        'canceled'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function user()
    {
        // return $this->hasOne(CarUser::class, 'car_id', 'car_id');
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    public function driver()
    {
        // return $this->hasOne(CarUser::class, 'car_id', 'car_id');
        return $this->belongsTo(User::class, 'driver_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    public function listing()
    {
        // return $this->hasOne(CarUser::class, 'car_id', 'car_id');
        return $this->belongsTo('App\Models\Listings', 'listing_id');
    }

    public function review()
    {
        return $this->hasOne('App\Models\Reviews', 'booking_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasOne('App\Models\Reviews', 'booking_id');
    }

}
