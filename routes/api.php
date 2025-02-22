<?php

use App\Http\Controllers\Api\JWTController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/code-jwt', [JWTController::class, 'codeJWT']);
Route::post('/decode-jwt', [JWTController::class, 'decodeJWT']);
Route::post('/login', [UsersController::class, 'logIn']);
Route::get('/profile', [UsersController::class, 'profile'])->middleware('auth');
Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth');
Route::post('/create', [UsersController::class, 'createUser']);

