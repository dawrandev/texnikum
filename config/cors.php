<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    /*
    |---------------------------------------------------------------------
    | Allowed origins
    |---------------------------------------------------------------------
    |
    | When `supports_credentials` is `true`, CORS cannot use a wildcard
    | origin. Provide a comma-separated list via `CORS_ALLOWED_ORIGINS`
    | (e.g. `http://localhost:8000,http://127.0.0.1:8000`).
    |
    */
    'allowed_origins' => explode(',', env('CORS_ALLOWED_ORIGINS', env('APP_URL', 'http://localhost'))),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
