<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fields associated with this model
     * 
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * Get the posts associated with the category
     *
     * @var array
     */
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
