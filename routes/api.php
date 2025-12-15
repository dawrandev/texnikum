<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->middleware('set-api-locale')->group(function () {

    Route::get('/showLoginForm', [\App\Http\Controllers\AuthController::class, 'showLoginForm']);

    // Categories
    Route::get('/categories', [\App\Http\Controllers\API\CategoryController::class, 'index']);
    Route::get('/categories/{id}', [\App\Http\Controllers\API\CategoryController::class, 'show']);

    // Posts
    Route::get('/posts/latest', [\App\Http\Controllers\API\PostController::class, 'latestPosts']);
    Route::get('/posts/all', [\App\Http\Controllers\API\PostController::class, 'allPosts']);
    Route::get('/posts/category/{id}', [\App\Http\Controllers\API\PostController::class, 'categoryPosts']);

    // Events
    Route::get('/posts/event/latest', [\App\Http\Controllers\API\PostController::class, 'latestEventPosts']);
    Route::get('/posts/event/all', [\App\Http\Controllers\API\PostController::class, 'allEventPosts']);

    // Single post by slug (must be last to avoid conflicts)
    Route::get('/posts/{slug}', [\App\Http\Controllers\API\PostController::class, 'show'])->middleware('count.post');

    // Interactive Services
    Route::get('/interactive-services', [\App\Http\Controllers\API\InteractiveServiceController::class, 'getServices']);

    // Videos
    Route::get('/videos', [\App\Http\Controllers\API\VideoController::class, 'getVideos']);
    Route::get('/videos/latest', [\App\Http\Controllers\API\VideoController::class, 'getLatestVideos']);
    Route::get('/videos/{id}', [\App\Http\Controllers\API\VideoController::class, 'show']);

    // Stats
    Route::get('/stats', [\App\Http\Controllers\API\StatsController::class, 'getStats']);

    // Partners
    Route::get('/partners', [\App\Http\Controllers\API\PartnerController::class, 'getPartners']);
});
