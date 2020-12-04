<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'body', 'slug', 'cover_image', 'status', 'seo_description', 'seo_title','seo_keywords', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
