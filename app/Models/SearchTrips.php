<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SearchTrips extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'search_trips';

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
        'from_city',
        'from_full',
        'to_city',
        'to_full',
        'type',
        'place',
        'capacity',
        'starting_date'
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
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }
}
