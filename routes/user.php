<?php

use Illuminate\Support\Facades\Auth;
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

        Auth::routes();



        // Manager
        Route::group(
            [
                'namespace' => 'User',
                'prefix' => 'me',
                'middleware' => 'auth'
            ],
            function () {
                Route::get('/dashboard', 'DashboardController@index')->name('me.dashboard');
                Route::get('profile', 'DashboardController@profile')->name('me.profile');
                Route::post('updateProfile', 'DashboardController@updateProfile')->name('me.updateProfile');


                // Applicant
                Route::get('applicants', 'ApplicantController@index')->name('me.applicant.index');
                Route::get('applicant/getApplicantData', 'ApplicantController@getApplicantData')->name('me.applicant.getApplicantData');
                Route::get('applicant/show/{id}', 'ApplicantController@show')->name('me.applicant.show');
            }
        );
    }
);
