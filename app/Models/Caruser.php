<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Caruser extends Model
{
    //
    protected $table = 'user_car';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'car_id'];

    public $timestamps = false;

    /**
     *  Get car image path.
     *
     * @param $img
     *
     * @return string
     */
    public function getImgPathAttribute($img)
    {
        return asset($img ?: 'images/cars/no_car_img.jpg');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id')->select(['name', 'model', 'color', 'year']);
    }

}
