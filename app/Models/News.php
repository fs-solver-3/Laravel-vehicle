<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
                  'title',
                  'date',
                  'image',
                  'h1_header',
                  'url',
                  'keywords',
                  'seo_text',
                  'publish',
                  'h1',
                  'page_url',
                  'author',
                  'author_image',
                  'short_des',
                  'page_included',
                  'publish_author',
                  'description'
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
    

    public function comments()
    {
        return $this->hasMany('App\Models\CommentNews', 'new_id')->orderBy('id', 'desc');
    }

}
