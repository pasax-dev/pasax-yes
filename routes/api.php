<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

if (file_exists(__DIR__.'/pasax-service.php')) {
    require __DIR__.'/pasax-service.php';
}
