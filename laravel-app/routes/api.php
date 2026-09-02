<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;



Route::Post('/signup', [AuthController::class, 'signup']);
Route::Post('/signin', [AuthController::class, 'signin']);
// Route::Post('/signout', [AuthController::class, 'signout'])->middleware('auth:sanctum');
// Route::Post('/verify', [AuthController::class, 'verify'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::Post('/signout', [AuthController::class, 'signout']);
    Route::get('/verify', [AuthController::class, 'verify']);
    });
