<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
    [
        'slug',
    ];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class)
            ->where('language_id', currentLanguageId());
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
