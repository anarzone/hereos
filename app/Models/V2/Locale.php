<?php

namespace App\Models\V2;

use App\Models\V2\Admin\Categories\CategoryTranslation;
use App\Models\V2\Admin\Posts\PostTranslation;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $table = 'locales';
    protected $fillable = [
        'name',
    ];

    public function posts(){
        return $this->hasMany(PostTranslation::class, 'locale_id');
    }

    public function categories(){
        return $this->hasMany(CategoryTranslation::class, 'locale_id');
    }
}
