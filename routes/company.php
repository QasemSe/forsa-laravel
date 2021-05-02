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

        Route::post('logoutCompany', 'Auth\LoginController@logoutCompany')->name('logoutCompany');
        Route::get('showCompanyLogin', 'Auth\LoginController@showCompanyLogin')->name('showCompanyLogin');
        Route::post('loginCompany', 'Auth\LoginController@loginCompany')->name('loginCompany');


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
            }
        );
    }
);
