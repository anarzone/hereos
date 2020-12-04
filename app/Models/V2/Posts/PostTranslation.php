<?php

namespace App\Models\V2\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'post_translations';
    protected $fillable = [
        'title',
        'body',
        'post_id',
        'locale_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
