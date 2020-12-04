<?php

namespace App\Models\V2\Posts;

use Illuminate\Database\Eloquent\Model;

class EditorPost extends Model
{
    protected $table = 'editor_posts';

    protected $fillable = [
        'type',
        'post_id',
        'limit',
        'position',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
