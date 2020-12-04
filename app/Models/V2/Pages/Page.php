<?php

namespace App\Models\V2\Pages;

use App\Models\V2\Admin\Locale;
use App\Models\V2\Admin\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'slug',
        'path',
        'cover',
        'user_id',
    ];

    public function translation($locale= null){
        $locale = $locale ?? App::getLocale();
        $locale_id = Locale::where('name', $locale)->first()->id;
        return $this->hasOne(PageTranslation::class, 'category_id')->where('locale_id', $locale_id);
    }

    public function translations(){
        return $this->hasMany(PageTranslation::class, 'page_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
