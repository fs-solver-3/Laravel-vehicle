<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Passport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'passport';

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
                  'series',
                  'room',
                  'department_code',
                  'issued_by',
                  'place_residence',
                  'pdf1',
                  'pdf2',
                  'pdf1_extension',
                  'pdf2_extension',
                  'pdf1_verify',
                  'pdf2_verify'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'avatar', 'rating', 'address']);
    }
}
