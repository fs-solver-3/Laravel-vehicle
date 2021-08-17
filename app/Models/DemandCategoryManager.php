<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandCategoryManager extends Model
{
    //
    protected $table = 'demand_category_managers';

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
        'demand_category_id',
        'count_demands',
        'see_message',
        'receive_notification',
        'receive_update_notification'
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

    public function category()
    {
        return $this->belongsTo('App\Models\DemandCategory', 'demand_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
