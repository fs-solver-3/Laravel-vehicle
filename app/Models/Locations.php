<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

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
        'building',
        'district',
        'street',
        'city',
        'zip',
        'state',
        'country',
        'lat',
        'lng',
        'full',
        'price'
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
