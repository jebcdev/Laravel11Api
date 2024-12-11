<?php

use App\Http\Controllers\Api\_ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::get('/', _ApiController::class)->name('index');

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
