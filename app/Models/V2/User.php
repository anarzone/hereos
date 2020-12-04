<?php

namespace App\Models\V2;

use App\Models\V2\Admin\Pages\Page;
use App\Models\V2\Admin\Posts\Post;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
    ];

    protected $hidden = ['password'];

    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }

    public function pages(){
        return $this->hasMany(Page::class, 'user_id');
    }
}
