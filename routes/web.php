<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('showLoginForm')->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('show');
        Route::get('/{id}/show-modal', [App\Http\Controllers\Admin\CategoryController::class, 'showModal'])->name('show-modal');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\CategoryController::class, 'editModal'])->name('edit-modal');
    });

    Route::prefix('posts')->as('posts.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::post('/upload-image', [App\Http\Controllers\Admin\PostController::class, 'uploadImage'])->name('upload-image');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('show');
        Route::get('/{id}/show-modal', [App\Http\Controllers\Admin\PostController::class, 'showModal'])->name('show-modal');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\PostController::class, 'editModal'])->name('edit-modal');
    });

    Route::prefix('videos')->as('videos.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\VideoController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\VideoController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\VideoController::class, 'store'])->name('store');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\VideoController::class, 'editModal'])->name('edit-modal');
        Route::put('/{id}', [App\Http\Controllers\Admin\VideoController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\VideoController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('interactive-services')->as('interactive-services.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'editModal'])->name('edit-modal');
        Route::put('/{id}', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\InteractiveServiceController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('stats')->as('stats.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\StatsController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\StatsController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\StatsController::class, 'store'])->name('store');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\StatsController::class, 'editModal'])->name('edit-modal');
        Route::put('/{id}', [App\Http\Controllers\Admin\StatsController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\StatsController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('partners')->as('partners.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\PartnerController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\PartnerController::class, 'store'])->name('store');
        Route::get('/{id}/edit-modal', [App\Http\Controllers\Admin\PartnerController::class, 'editModal'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\PartnerController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/show-modal', [App\Http\Controllers\Admin\PartnerController::class, 'showModal'])->name('show');
    });
});
