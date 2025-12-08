<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTranslations
{
    public function getTranslatedAttribute(string $attribute): Attribute 
    {
        return Attribute::make(
            get: function () use ($attribute) {
                $locale = App::getLocale();

                $translation = $this->translations->firstWhere('lang_code', $locale);

                return $translation ? $translation->{$attribute} : null;
            }
        );
    }
}
