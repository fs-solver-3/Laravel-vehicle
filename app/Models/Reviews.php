<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
                  'writer_id',
                  'title',
                  'type',
                  'comment',
                  'score',
                  'receiver_id',
                  'booking_id'
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
     * Get the writer for this model.
     *
     * @return App\Models\Writer
     */
    public function writer()
    {
        return $this->belongsTo('App\User','writer_id');
    }

    /**
     * Get the receiver for this model.
     *
     * @return App\Models\Receiver
     */
    public function receiver()
    {
        return $this->belongsTo('App\User','receiver_id');
    }

    /**
     * Get the booking for this model.
     *
     * @return App\Models\Booking
     */
    public function booking()
    {
        return $this->belongsTo('App\Models\Bookings','booking_id');
    }



}
