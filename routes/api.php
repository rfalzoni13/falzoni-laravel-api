<?php

use App\Http\Controllers\Api\Configuration\UserController;
use App\Http\Controllers\Api\Register\CustomerController;
use App\Http\Controllers\Api\Stock\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function() {
    Route::post('/user/login', 'login');
    Route::get('/user/getAll', 'getAll');
    Route::get('/user/get/{id}', 'get');
    Route::post('/user/create', 'create');
    Route::put('/user/update', 'update');
    Route::delete('/user/delete/{id}', 'delete');
});

// Customer routes
Route::controller(CustomerController::class)->group(function() {
    Route::get('/customer/getAll', 'getAll');
    Route::get('/customer/get/{id}', 'get');
    Route::post('/customer/create', 'create');
    Route::put('/customer/update', 'update');
    Route::delete('/customer/delete/{id}', 'delete');
});

// Product routes
Route::controller(ProductController::class)->group(function() {
    Route::get('/product/getAll', 'getAll');
    Route::get('/product/get/{id}', 'get');
    Route::post('/product/create', 'create');
    Route::put('/product/update', 'update');
    Route::delete('/product/delete/{id}', 'delete');
});
