<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/animal/list',[App\Http\Controllers\AnimalController::class, 'list']);
});

Route::post('/login',[App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout',[App\Http\Controllers\LoginController::class, 'logout']);
Route::get('/account/register',[App\Http\Controllers\LoginController::class, 'register']);
