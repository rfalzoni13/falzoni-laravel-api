<?php

use App\Http\Controllers\Api\Configuration\UserController;
use App\Http\Controllers\Api\Register\CustomerController;
use App\Http\Controllers\Api\Stock\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('user')->controller(UserController::class)->group(function() {
    Route::post('/login', 'login');
    Route::get('/getAll', 'getAll');
    Route::get('/get/{id}', 'get');
    Route::post('/create', 'create');
    Route::put('/update', 'update');
    Route::delete('/delete/{id}', 'delete');
});

// Customer routes
Route::prefix('customer')->controller(CustomerController::class)->group(function() {
    Route::get('/getAll', 'getAll');
    Route::get('/get/{id}', 'get');
    Route::post('/create', 'create');
    Route::put('/update', 'update');
    Route::delete('/delete/{id}', 'delete');
});

// Product routes
Route::prefix('product')->controller(ProductController::class)->group(function() {
    Route::get('/getAll', 'getAll');
    Route::get('/get/{id}', 'get');
    Route::post('/create', 'create');
    Route::put('/update', 'update');
    Route::delete('/delete/{id}', 'delete');
});
