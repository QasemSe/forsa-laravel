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

// getConstant
Route::get('getConstant', "Api\getConstantController@getConstant");



// Posts
Route::get('user/posts', "Api\UserController@posts");
Route::get('user/postDetails', "Api\UserController@postDetails");
Route::get('user/showCompany', "Api\UserController@showCompany");

// User
Route::post('userRegister', "Api\UserController@register");
Route::post('user/login', "Api\UserController@login");

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
    Route::get('profile', "Api\UserController@profile");
    Route::post('updateProfile', "Api\UserController@updateProfile");
//    applicants
    Route::get('archive', "Api\UserController@archive");
    Route::post('applicant', "Api\UserController@applicant");
    Route::get('applicant/show', 'Api\UserController@showApplicant');

});
