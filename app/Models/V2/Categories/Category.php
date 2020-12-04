<?php

namespace App\Models\V2\Categories;

use App\Models\V2\Locale;
use App\Models\V2\Posts\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use SoftDeletes;

    const COVER_PATH = 'images/categories/covers';

    // Default Categories

    const CONTENT_MARKETING_ID = 1;
    const SEO_ID = 2;
    const SMM_ID = 1;
    const INTERESTING_ID = 1;

    protected $table = 'categories';
    protected $fillable = ['slug','cover','position', 'color_hex'];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function($category){
            $category->posts()->delete();
        });
    }

    public function translation($locale= null){
        $locale = $locale ?? App::getLocale();
        $locale_id = Locale::where('name', $locale)->first()->id;
        return $this->hasOne(CategoryTranslation::class, 'category_id')->where('locale_id', $locale_id);
    }

    public function translations(){
        return $this->hasMany(CategoryTranslation::class, 'category_id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'category_id');
    }
}
