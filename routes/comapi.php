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

Route::post('company/login', "Api\CompanyController@login");


Route::group(['middleware' => 'auth:comapi', 'prefix' => 'company'], function () {
    Route::get('profile', "Api\CompanyController@profile");
    Route::get('archive', "Api\CompanyController@archive");
    //posts//
    Route::get('posts', "Api\CompanyController@posts");
    Route::post('createPost', "Api\CompanyController@createPost");
    Route::post('editPost/{id}', "Api\CompanyController@editPost");
    Route::post('deletePost/{id}', "Api\CompanyController@deletePost");

    Route::post('applicantStatus', "Api\CompanyController@applicantStatus");
    Route::get('applicant/show/{applicant_id}', 'Api\CompanyController@showApplicant');

});
