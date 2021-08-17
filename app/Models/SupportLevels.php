<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SupportLevels extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'support_levels';

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
                  'reaction_time',
                  'default_answer',
                  'description',
                  'default_support_id'
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
        return $this->belongsToMany(User::class, 'support_levels_managers');
    }


}
