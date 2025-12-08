<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->middleware('set-api-locale')->group(function () {

    Route::get('/showLoginForm', [\App\Http\Controllers\AuthController::class, 'showLoginForm']);

    Route::get('/categories', [\App\Http\Controllers\API\CategoryController::class, 'index']);
    Route::get('/categories/{id}', [\App\Http\Controllers\API\CategoryController::class, 'show']);

    Route::get('/posts/latest', [\App\Http\Controllers\API\PostController::class, 'latestPosts']);
    Route::get('/posts/all', [\App\Http\Controllers\API\PostController::class, 'allPosts']);
    Route::get('/posts/category/{id}', [\App\Http\Controllers\API\PostController::class, 'categoryPosts']);

    Route::get('/posts/event/latest', [\App\Http\Controllers\API\PostController::class, 'latestEventPosts']);
    Route::get('/posts/event/all', [\App\Http\Controllers\API\PostController::class, 'allEventPosts']);

    Route::get('/interactive-services', [\App\Http\Controllers\API\InteractiveServiceController::class, 'getServices']);

    Route::get('/videos', [\App\Http\Controllers\API\VideoController::class, 'getVideos']);
    Route::get('/videos/latest', [\App\Http\Controllers\API\VideoController::class, 'getLatestVideos']);

    Route::get('/stats', [\App\Http\Controllers\API\StatsController::class, 'getStats']);

    Route::get('/partners', [\App\Http\Controllers\API\PartnerController::class, 'getPartners']);
});
