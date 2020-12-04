<?php

namespace App\Models\V2\Posts;

use App\Models\V2\Categories\Category;
use App\Models\V2\Locale;
use App\Models\V2\Seo;
use App\Models\V2\User;
use App\Models\V2\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    use SoftDeletes;

    const COVER_PATH = '/images/posts/covers';
    const THUMBNAIL_PATH = '/images/posts/thumbnails';
    const CAROUSEL_BANNER_PATH = '/images/posts/carousel_banners';
    const CAROUSEL_SMALL_PATH = '/images/posts/carousel_smalls';

    const STANDARD_FORMAT = 1;
    const GALLERY_FORMAT = 2;
    const AUDIO_FORMAT = 3;
    const VIDEO_FORMAT = 4;

    const DRAFT = 0;
    const PUBLISHED = 1;
    const ARCHIVED = 2;

    const BANNER_LIMIT = 4;
    const EDITOR_LIMIT = 6;

    protected $table = 'posts';
    protected $fillable = [
        'slug',
        'cover',
        'thumbnail_image',
        'carousel_banner_image',
        'carousel_small_image',
        'status',
        'format',
        'editor',
        'banner',
        'category_id',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function($post){
            $post->translation()->delete();
            $post->seo()->delete();
        });
    }

    public function translation($locale= null){
        $locale = $locale ?? App::getLocale();
        $locale_id = Locale::where('name', $locale)->first()->id;
        return $this->hasOne(PostTranslation::class, 'post_id')->where('locale_id', $locale_id);
    }

    public function translations(){
        return $this->hasMany(PostTranslation::class, 'post_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function editorPost(){
        return $this->hasOne(EditorPost::class, 'post_id');
    }

    public function seo(){
        return $this->hasOne(Seo::class, 'client_id');
    }

    public function view(){
        return $this->hasOne(View::class, 'client_id');
    }
}
