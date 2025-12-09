<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$routes = \Illuminate\Support\Facades\Route::getRoutes();

echo "Category Routes:\n";
foreach ($routes as $route) {
    if (strpos($route->uri, 'categories') !== false && strpos($route->uri, 'admin') !== false) {
        echo "  {$route->methods[0]}: {$route->uri}\n";
    }
}
