<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/code-jwt', [UsersController::class, 'codeJWT']);
Route::post('/decode-jwt', [UsersController::class, 'decodeJWT']);
Route::post('/login', [UsersController::class, 'logIn']);
Route::get('/profile', [UsersController::class, 'profile']);
Route::get('/logout', [UsersController::class, 'logout']);

