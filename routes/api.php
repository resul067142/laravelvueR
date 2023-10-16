<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts', \App\Http\Controllers\Api\PostController::class);
Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class );
Route::apiResource('student',\App\Http\Controllers\Api\StudentController::class);
