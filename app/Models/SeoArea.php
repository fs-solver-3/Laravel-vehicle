<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoArea extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seo_area';

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
                  'des',
                  'h1_header',
                  'page_title',
                  'url',
                  'keywords',
                  'seo_text',
                  'type'
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
    



}
