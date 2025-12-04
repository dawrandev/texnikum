<?php

use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/showLoginForm', [\App\Http\Controllers\AuthController::class, 'showLoginForm']);

    Route::get('/categories', [CategoryController::class, 'index']);
});
