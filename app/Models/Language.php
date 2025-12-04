<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['code', 'name'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function postTranslations()
    {
        return $this->hasMany(PostTranslation::class);
    }
}
