<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Fields associated with this model
     * 
     * @var array
     */
    protected $fillable = ['title', 'author_id', 'category_id', 'post_body'];

    /**
     * Get the author associated with the post
     */
    public function author() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category associated with the post
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
    
    /**
     * Get the images associated with the post
     */
    public function postImages() {
        return $this->hasMany('App\PostImage');
    }
}
