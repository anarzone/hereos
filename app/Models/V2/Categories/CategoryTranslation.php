<?php

namespace App\Models\V2\Categories;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';
    protected $fillable = [
        'name',
        'category_id',
        'locale_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
