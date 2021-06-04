<?php

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

// Posts
Route::get('posts', "Api\PostController@posts");

// User
Route::post('user/login', "Api\UserController@login");

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
    Route::get('profile', "Api\UserController@profile");
    Route::get('archive', "Api\UserController@archive");
});
