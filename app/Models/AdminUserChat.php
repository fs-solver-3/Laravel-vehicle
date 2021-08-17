<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserChat extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_user_chat';

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
        'archive',
        'unread',
        'last_message'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
