<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasTranslations;

    protected $fillable = [
        'count'
    ];

    public function translations()
    {
        return $this->hasMany(StatsTranslation::class);
    }

    protected function title(): Attribute
    {
        return $this->getTranslatedAttribute('title');
    }
}
