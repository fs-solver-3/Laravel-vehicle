<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class DemandCategory extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demand_categories';

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
                  'grade'
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

    public function manager()
    {
        return $this->belongsToMany(User::class, 'demand_category_managers');
    }

    public function supports()
    {
        return $this->hasMany('App\Models\DemandCategoryManager', 'demand_category_id');
    }


}
