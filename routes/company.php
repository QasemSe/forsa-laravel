<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('company/login', 'Auth\LoginController@showCompanyLogin')->name('showCompanyLogin');
        Route::post('company/login', 'Auth\LoginController@loginCompany')->name('loginCompany');
        Route::get('company/register', 'Auth\LoginController@showRegisterCompany')->name('showRegisterCompany');
        Route::post('company/register', 'Auth\LoginController@registerCompany')->name('registerCompany');

        Route::post('logoutCompany', 'Auth\LoginController@logoutCompany')->name('logoutCompany');


        // Manager
        Route::group(
            [
                'namespace' => 'Company',
                'prefix' => 'myCompany',
                'middleware' => 'company'
            ],
            function () {
                Route::get('/dashboard', 'DashboardController@index')->name('myCompany.dashboard');
                Route::get('profile', 'DashboardController@profile')->name('myCompany.profile');
                Route::post('updateProfile', 'DashboardController@updateProfile')->name('myCompany.updateProfile');


                // Posts
                Route::get('posts', 'PostController@index')->name('myCompany.post.index');
                Route::get('post/add', 'PostController@create')->name('myCompany.post.add');
                Route::post('post/store', 'PostController@store')->name('myCompany.post.store');
                Route::get('post/getPostData', 'PostController@getPostData')->name('myCompany.post.getPostData');
                Route::get('post/show/{id}', 'PostController@show')->name('myCompany.post.show');
                Route::get('post/edit/{id}', 'PostController@edit')->name('myCompany.post.edit');
                Route::post('post/update/{id}', 'PostController@update')->name('myCompany.post.update');
                Route::post('post/status/{id}', 'PostController@status')->name('myCompany.post.status');
                Route::post('post/delete/{id}', 'PostController@destroy')->name('myCompany.post.delete');
                Route::post('post/ApplicantStatus/{id}', 'PostController@ApplicantStatus')->name('myCompany.post.ApplicantStatus');




                // Applicant
                Route::get('applicants', 'ApplicantController@index')->name('myCompany.applicant.index');
                Route::get('applicant/show/{id}', 'ApplicantController@show')->name('myCompany.applicant.show');
                Route::get('applicant/edit/{id}', 'ApplicantController@edit')->name('myCompany.applicant.edit');
                Route::post('applicant/update/{id}', 'ApplicantController@update')->name('myCompany.applicant.update');
                Route::post('applicant/status/{id}/{post_id}', 'ApplicantController@status')->name('myCompany.applicant.status');
                Route::get('applicant/getApplicantData', 'ApplicantController@getApplicantData')->name('myCompany.applicant.getApplicantData');
            }
        );
    }
);
