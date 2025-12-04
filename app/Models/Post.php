<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    protected $fillable =
    [
        'category_id',
        'slug',
        'image',
        'published_at',
        'views_count',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function getTitleAttribute(): ?string
    {
        $locale = App::getLocale();

        $translation = $this->translations->firstWhere('lang_code', $locale);

        return $translation ? $translation->title : null;
    }

    public function getContentAttribute(): ?string // ?string qilib o'zgartiring
    {
        $locale = App::getLocale();

        $translation = $this->translations->firstWhere('lang_code', $locale);

        return $translation ? $translation->content : null;
    }
}
