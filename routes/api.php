<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\UserTest;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\GetVideoController;
use App\Http\Controllers\UserSubController;
use App\Http\Controllers\VideoLikeController;
use App\Http\Controllers\VideoDislikeController;
use App\Http\Controllers\VideoCommentsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authentificated', function () {
    return true;
});


Route::post('register', [RegisterController::class, 'index']);
Route::post('login', [LoginController::class, 'index']);
Route::post('logout', [LoginController::class, 'logout']);


Route::get('users', [UserTest::class, 'index']);
Route::get('user/{id}', [UserTest::class, 'getId']);
Route::get('token/{id}', [TokenController::class, 'index']);


Route::apiResource('videos', VideoController::class);
Route::get('video/{id}', [GetVideoController::class, 'index']);


Route::post('subscribe', [UserSubController::class, 'subscribe']);
Route::get('check-sub/{id}&{sub_id}', [UserSubController::class, 'checkSub']);


Route::get('liked-videos/{id}', [VideoLikeController::class, 'index']);
Route::post('like', [VideoLikeController::class, 'like']);
Route::get('check-like/{id}&{sub_id}', [VideoLikeController::class, 'checkLike']);

Route::post('dislike', [VideoDislikeController::class, 'dislike']);
Route::get('check-dislike/{id}&{sub_id}', [VideoDislikeController::class, 'checkDislike']);


Route::post('comment', [VideoCommentsController::class, 'store']);
Route::get('comments/{id}', [VideoCommentsController::class, 'videoComments']);
Route::get('comment/{id}', [VideoCommentsController::class, 'comment']);




