<?php

use App\Http\Controllers\Api\AuthenticateController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum', 'verified')->get('/user', function (Request $request) {
    return $request->user();
});

//============================== Authentication ============================//
Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthenticateController::class, 'register'])->name('register');

//================================ Users ===================================//
Route::get('/users', [UserController::class, 'index']);

//=============================== Posts ====================================//
// Create:  POST
// Update:  PUT
// Show:    GET
// Destroy: POST
Route::apiResource('/blogs', BlogPostController::class);

//=============================== Comments ====================================//
// Create: POST
// Update: PUT
Route::apiResource('/comments', CommentController::class);
