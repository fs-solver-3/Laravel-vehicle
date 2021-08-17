<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

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
        'date',
        'description',
        'courses_id',
        'user_id',
        'rate',
        'publish',
        'directions_id'
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

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses', 'courses_id');
    }

    public function pass_course()
    {
        $pass_course = Passes::where('user_id', $this->user_id)->where('courses_id', $this->courses_id)->get();
        return $pass_course;
    }
}