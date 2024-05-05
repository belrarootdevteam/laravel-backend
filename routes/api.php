<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

*/

Route::controller(Usercontroller::class)->prefix('/users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/create', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
});

Route::controller(ProductController::class)->prefix('/products')->name('products.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/create', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::post('/update/{id}', 'update')->name('update');
});
