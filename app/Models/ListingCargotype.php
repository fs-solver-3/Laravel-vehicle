<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingCargotype extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'listing_cargotype';

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
        'cargo_type_id'
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


    // public function roles()
    // {
    //     return $this->hasMany('App\Models\Roles', 'courses_id');
    // }

}