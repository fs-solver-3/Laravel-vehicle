<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverLisence extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'driver_lisence';

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
                  'document_no',
                  'pdf',
                  'verified',
                  'pdf_extension'
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
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function lisence_categories()
    {
        return $this->belongsToMany(LisenceCategory::class, 'driver_lisence_categories');
    }



}
