<?php

use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']); 

Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {
  
  Route::resource('/post', 'App\Http\Controllers\PostController')->only([
    'index', 'store', 'show', 'update', 'destroy'
  ]);
  Route::resource('/class', 'App\Http\Controllers\CardController')->only([
    'store', 'show', 'update', 'destroy'
  ]);

  Route::post('/class/getAll', [CardController::class, 'index']);

  Route::resource('/rating', 'App\Http\Controllers\RatingController')->only([
    'index', 'store', 'show', 'update', 'destroy'
  ]);
  Route::resource('/category', 'App\Http\Controllers\CategoryController')->only([
    'index', 'store', 'show', 'update', 'destroy'
  ]);
  Route::resource('/userCategory', 'App\Http\Controllers\UserCategoryController')->only([
    'index', 'store', 'show', 'update', 'destroy'
  ]);
  Route::resource('/userClass', 'App\Http\Controllers\UserCardController')->only([
    'index', 'store', 'show', 'update', 'destroy'
  ]);
});
