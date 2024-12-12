<?php

use App\Http\Controllers\Api\_ApiController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')->group(function () {
    Route::get('/', [_ApiController::class, 'index'])->name('index');

    Route::apiResource('/clients', ClientController::class)->names('clients');
    Route::post('/clients/{client}/restore', [ClientController::class, 'restore'])->name('clients.restore');
    Route::delete('/clients/{client}/forceDestroy', [ClientController::class, 'forceDestroy'])->name('clients.forceDestroy');

    Route::apiResource('/brands', BrandController::class)->names('brands');

    Route::apiResource('/categories', CategoryController::class)->names('categories');
    
    Route::apiResource('/products', ProductController::class)->names('products');
    
    Route::apiResource('/purchases', PurchaseController::class)->names('purchases');


    //
});

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */
