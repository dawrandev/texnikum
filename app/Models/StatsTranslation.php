<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatsTranslation extends Model
{
    protected $fillable = [
        'stats_id',
        'lang_code',
        'title'
    ];

    public function stats()
    {
        return $this->belongsTo(Stats::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
