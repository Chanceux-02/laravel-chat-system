<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiUpdateController;
use App\Http\Controllers\Api\ApiDestroyController;
use App\Http\Controllers\Api\ApiGetController;
use App\Http\Controllers\Api\ApiPostController;
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

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/edit-profile', [ApiUpdateController::class, 'editProfile']);
Route::post('/send/message', [ApiPostController::class, 'sendMessage']);

Route::delete('/delete/message', [ApiDestroyController::class, 'destroyMessage']);
Route::delete('/delete/profile', [ApiDestroyController::class, 'destroyProfile']);

Route::get('/', [ApiGetController::class, 'index']);
Route::get('/check-login', [ApiAuthController::class, 'checkLogin']);
Route::get('/edit-profile', [ApiGetController::class, 'viewEditProfile']);
Route::get('/all-chat/fetch', [ApiGetController::class, 'allChat']);
Route::get('/user/profile', [ApiGetController::class, 'userProfile']);
Route::get('/chat-to-user/{id}', [ApiGetController::class, 'singleChat']);
Route::get('/search', [ApiGetController::class, 'search']);