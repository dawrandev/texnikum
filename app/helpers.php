<?php

use App\Models\Language;

function getLanguages()
{
    // return associative array code => name so blade route() receives locale code as key
    return \App\Models\Language::pluck('name', 'code')->toArray();
}

function currentLanguageId()
{
    $locale = app()->getLocale();
    return Language::where('code', $locale)->value('id');
}
