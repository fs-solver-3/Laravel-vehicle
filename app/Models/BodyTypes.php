<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyTypes extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'body_types';

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
        'name',
        'type'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
