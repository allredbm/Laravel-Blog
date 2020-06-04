<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    /**
     * Fields associated with this model
     * 
     * @var array
     */
    protected $fillable = ['post_id', 'post_image_path', 'post_image_caption'];
    
    /**
     * Get the post associated with the post image
     */
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
