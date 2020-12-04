<?php

namespace App\Models\V2;

use App\Models\V2\Categories\Category;
use App\Models\V2\Posts\Post;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'views';
    protected $fillable = [
        'clicks',
        'unique_clicks',
        'client_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'client_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'client_id');
    }

}
