<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasTranslations;
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

    protected function title(): Attribute
    {
        return $this->getTranslatedAttribute('title');
    }

    protected function content(): Attribute
    {
        return $this->getTranslatedAttribute('content');
    }
}
