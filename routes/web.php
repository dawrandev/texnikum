<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->group(function () {
    Route::get('lang/{locale}', function ($locale) {
        if (array_key_exists($locale, config('app.locales'))) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    })->name('setLocale');

    Route::get('/admin', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

    Route::prefix('admin')->group(function () {
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
    });
});
