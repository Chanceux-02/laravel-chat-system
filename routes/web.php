<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
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
//for returning view without queries or functions
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});

//routes that have a queries and other functions
Route::get('/', [ShowController::class, 'index'])
    ->middleware('auth');

Route::post('/send/group/message', [PostController::class, 'sendGroupMessage'])
    ->name('send-message');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])
    ->name('register')->middleware('guest');
