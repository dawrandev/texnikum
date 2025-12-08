<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTranslation extends Model
{
    protected $fillable = [
        'video_id',
        'lang_code',
        'title',
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
