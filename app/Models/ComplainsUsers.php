<?php

namespace App\Models;

use App\User;
use App\Models\Complains;
use Illuminate\Database\Eloquent\Model;

class ComplainsUsers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complains_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'comment', 'complain_id', 'listing_id', 'driver_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function complain()
    {
        return $this->belongsTo(Complains::class, 'complain_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listings::class, 'listing_id');
    }

}
