<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasTranslations;
    protected $fillable = [
        'url',
        'published_at',
    ];

    public function translations()
    {
        return $this->hasMany(VideoTranslation::class);
    }

    protected function title(): Attribute
    {
        return $this->getTranslatedAttribute('title');
    }
}
