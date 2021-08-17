<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_models';

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
                  'car_brand_id',
                  'template'
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

    public function carBrand()
    {
        return $this->belongsTo('App\Models\CarBrand', 'car_brand_id')->select(['name']);
    }

    public function Cars()
    {
        return $this->hasMany('App\Models\Cars', 'car_model_id');
    }


}
