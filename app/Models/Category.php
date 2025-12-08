<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasTranslations;

    protected $fillable =
    [
        'slug',
    ];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected function name(): Attribute
    {
        return $this->getTranslatedAttribute('name');
    }
}
