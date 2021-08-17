<?php

namespace App\Models;
use App\User;
use App\Models\Colors;
use App\Models\CarModel;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $table = 'cars';

    protected $guarded = [];

    protected $fillable = [
        'model',
        'name',
        'color',
        'year',
        'type',
        'number',
        'body_type',
        'user_id',
        'bus',
        'country',
        'car_model_id',
        'template'
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function carUser()
    // {
    //     return $this->hasMany(CarUser::class, 'car_id');
    // }

    public function carUser()
    {
        // return $this->hasOne(CarUser::class, 'car_id', 'car_id');
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    public function color()
    {
        return $this->hasOne('App\Models\Colors', 'color');
    }

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel', 'car_model_id')->select(['id', 'name', 'template']);;
    }
}
