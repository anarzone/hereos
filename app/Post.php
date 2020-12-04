<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'is_deleted', 'body', 'slug', 'cover_image', 'thumbnail_image', 'upvote', 'downvote', 'status', 'seo_description', 'seo_title','seo_keywords', 'cat_id', 'user_id'];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
