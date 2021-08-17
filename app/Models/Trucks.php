<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\CargoTypes;

class Trucks extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'model',
        'name',
        'color',
        'year',
        'type',
        'number',
        'body_type_id',
        'cargo_type_id',
        'user_id',
        'capacity',
        'place',
        'carcase_type',
        'max_size',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function carUser()
    // {
    //     return $this->hasMany(CarUser::class, 'car_id');
    // }

    public function truckUser()
    {
        // return $this->hasOne(CarUser::class, 'car_id', 'car_id');
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the bodyType for this model.
     *
     * @return App\Models\BodyType
     */
    public function bodyType()
    {
        return $this->belongsTo('App\Models\BodyTypes', 'body_type_id');
    }

    /**
     * Get the cargoType for this model.
     *
     * @return App\Models\CargoType
     */
    // public function cargoType()
    // {
    //     return $this->belongsTo('App\Models\CargoTypes', 'cargo_type_id');
    // }

    public function cargoType()
    {
        return $this->belongsToMany(CargoTypes::class, 'truck_cargotype', 'truck_id', 'cargo_type_id');
    }
}
