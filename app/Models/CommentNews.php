<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentNews extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comment_news';

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
        'des',
        'new_id'
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
        return $this->belongsTo('App\User', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\CommentReply', 'comment_news_id')->orderBy('id','desc');
    }
}
