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

if (!function_exists('alert_success')) {
    function alert_success(string $message): void
    {
        \App\Helpers\AlertHelper::success($message);
    }
}

if (!function_exists('alert_error')) {
    function alert_error(string $message): void
    {
        \App\Helpers\AlertHelper::error($message);
    }
}

if (!function_exists('alert_warning')) {
    function alert_warning(string $message): void
    {
        \App\Helpers\AlertHelper::warning($message);
    }
}

if (!function_exists('alert_info')) {
    function alert_info(string $message): void
    {
        \App\Helpers\AlertHelper::info($message);
    }
}
