<?php

namespace App\Models\V2\Pages;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'page_translations';
    protected $fillable = [
        'title',
        'body',
        'page_id',
    ];

    public function page(){
        return $this->belongsTo(Page::class, 'page_id');
    }
}
