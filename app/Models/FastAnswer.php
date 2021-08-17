<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FastAnswer extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fast_answers';

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
                  'description',
                  'demand_category_id',
                  'link'
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
    
    /**
     * Get the demandCategory for this model.
     *
     * @return App\Models\DemandCategory
     */
    public function demandCategory()
    {
        return $this->belongsTo('App\Models\DemandCategory','demand_category_id');
    }



}
