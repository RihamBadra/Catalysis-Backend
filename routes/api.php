<?php

use App\Http\Controllers\CardController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/post', 'App\Http\Controllers\PostController')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);
Route::resource('/class', 'App\Http\Controllers\CardController')->only([
    'index', 'store', 'show', 'update', 'destroy'
]);
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
