<?php

use App\Http\Controllers\JWTController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::controller(JWTController::class)->prefix('/jwt')->name('jwt.')->group(function () {
    Route::get('/issue', 'issue')->name('issue');
    Route::get('/verify', 'verify')->name('verify');
});
