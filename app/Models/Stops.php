<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Stops extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'listing_stops';

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
        'listing_id',
        'location_id',
        'max_occupants',
        'active',
        'price_per_seat',
        'time',
        'distance',
        'starting_hour',
        'capacity',
        'place',
        'max_size',
    ];

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id')->select(['id', 'city', 'lat', 'lng', 'full', 'price']);
    }

}
