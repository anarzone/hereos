<?php

namespace App\Models\V2;

use App\Models\V2\Posts\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;

    protected $table = 'seo';
    protected $fillable = [
        'client_id',
        'locale_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'client_id');
    }
}
