<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Listings;
use App\User;
class BookingSeat extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking_seat';

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
        'booking_id',
        'seat_number'
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

}
