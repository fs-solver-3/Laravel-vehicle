<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoAll extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seo_all';

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
                  'indexing',
                  'area1',
                  'area2',
                  'fias_code',
                  'settlement',
                  'page_title',
                  'des',
                  'h1_header',
                  'url',
                  'keywords',
                  'seo_text'
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
