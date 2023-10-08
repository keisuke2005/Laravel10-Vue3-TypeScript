<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ログインなし
Route::get("/login", fn() => view('index'))->name('login');
Route::get("/account/create", fn() => view('index'))->name('account_create');
Route::get("/account/confirm", fn() => view('index'))->name('account_confirm');
Route::get("/account/verify/{token}", 'AuthController@verify')->name('account_confirm');

//Route::get('/account/register',[App\Http\Controllers\AuthController::class, 'register']);

// ログインあり
Route::middleware('auth:sanctum')->get('{any}', function () {
    return view('index');
})->where('any', '.*');
