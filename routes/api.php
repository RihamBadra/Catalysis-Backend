<?php

use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserCategoryController;

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

Route::group([
    'middleware' => 'auth',
], function ($router) {
    Route::get('/checkToken', [AuthController::class, 'checkToken']);

    Route::resource('/post', 'App\Http\Controllers\PostController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/video', 'App\Http\Controllers\SessionController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/class', 'App\Http\Controllers\CardController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('/rating', 'App\Http\Controllers\RatingController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/review', 'App\Http\Controllers\ReviewController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/category', 'App\Http\Controllers\CategoryController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/userCategory', 'App\Http\Controllers\UserCategoryController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/saved', 'App\Http\Controllers\SavedController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/hidden', 'App\Http\Controllers\HiddenController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::resource('/userClass', 'App\Http\Controllers\UserCardController')->only([
        'index', 'store', 'show', 'destroy'
    ]);
    Route::get('/OwnerClass', [CardController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/setProf', [AuthController::class, 'setProfile']);
});

Route::put('/updateCat/{id}', [UserCategoryController::class, 'update']);
