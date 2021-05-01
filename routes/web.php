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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('showManagerLogin', 'Auth\LoginController@showManagerLogin')->name('showManagerLogin');
        Route::post('loginManager', 'Auth\LoginController@loginManager')->name('loginManager');





        Route::group(
            [
                'namespace' => 'Manager',
                'prefix' => 'manager',
                'middleware' => 'manager'
            ],
            function () {
                Route::get('/dashboard', 'DashbaordController@index')->name('dashboard.index');
                Route::get('profile', 'DashbaordController@profile')->name('profile');
                Route::post('updateProfile', 'DashbaordController@updateProfile')->name('updateProfile');


                // managers
                Route::get('managers', 'ManagerController@index')->name('manager.index');
                Route::get('manager/add', 'ManagerController@create')->name('manager.add');
                Route::post('manager/store', 'ManagerController@store')->name('manager.store');
                Route::get('manager/getManagerData', 'ManagerController@getManagerData')->name('manager.getManagerData');
                Route::get('manager/edit/{id}', 'ManagerController@edit')->name('manager.edit');
                Route::post('manager/update/{id}', 'ManagerController@update')->name('manager.update');


                // degrees
                Route::get('degrees', 'DegreeController@index')->name('degree.index');
                Route::get('degree/add', 'DegreeController@create')->name('degree.add');
                Route::post('degree/store', 'DegreeController@store')->name('degree.store');
                Route::get('degree/getDegreeData', 'DegreeController@getDegreeData')->name('degree.getDegreeData');
                Route::get('degree/edit/{id}', 'DegreeController@edit')->name('degree.edit');
                Route::post('degree/update/{id}', 'DegreeController@update')->name('degree.update');
                Route::post('degree/delete/{id}', 'DegreeController@destroy')->name('degree.delete');

                // specialize
                Route::get('specializes', 'SpecializeController@index')->name('specialize.index');
                Route::get('specialize/add', 'SpecializeController@create')->name('specialize.add');
                Route::post('specialize/store', 'SpecializeController@store')->name('specialize.store');
                Route::get('specialize/getSpecializeData', 'SpecializeController@getSpecializeData')->name('specialize.getSpecializeData');
                Route::get('specialize/edit/{id}', 'SpecializeController@edit')->name('specialize.edit');
                Route::post('specialize/update/{id}', 'SpecializeController@update')->name('specialize.update');
                Route::post('specialize/delete/{id}', 'SpecializeController@destroy')->name('specialize.delete');

                // university
                Route::get('universities', 'UniversityController@index')->name('university.index');
                Route::get('university/add', 'UniversityController@create')->name('university.add');
                Route::post('university/store', 'UniversityController@store')->name('university.store');
                Route::get('university/getUniversityData', 'UniversityController@getUniversityData')->name('university.getUniversityData');
                Route::get('university/edit/{id}', 'UniversityController@edit')->name('university.edit');
                Route::post('university/update/{id}', 'UniversityController@update')->name('university.update');
                Route::post('university/delete/{id}', 'UniversityController@destroy')->name('university.delete');


                // Skills
                Route::get('skills', 'SkillController@index')->name('skill.index');
                Route::get('skill/add', 'SkillController@create')->name('skill.add');
                Route::post('skill/store', 'SkillController@store')->name('skill.store');
                Route::get('skill/getSkillData', 'SkillController@getSkillData')->name('skill.getSkillData');
                Route::get('skill/edit/{id}', 'SkillController@edit')->name('skill.edit');
                Route::post('skill/update/{id}', 'SkillController@update')->name('skill.update');
                Route::post('skill/delete/{id}', 'SkillController@destroy')->name('skill.delete');


                // Users
                Route::get('users', 'UserController@index')->name('user.index');
                Route::get('user/add', 'UserController@create')->name('user.add');
                Route::post('user/store', 'UserController@store')->name('user.store');
                Route::get('user/getUserData', 'UserController@getUserData')->name('user.getUserData');
                Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
                Route::post('user/update/{id}', 'UserController@update')->name('user.update');
                Route::post('user/delete/{id}', 'UserController@destroy')->name('user.delete');

                // Company
                Route::get('companies', 'CompanyController@index')->name('company.index');
                Route::get('company/add', 'CompanyController@create')->name('company.add');
                Route::post('company/store', 'CompanyController@store')->name('company.store');
                Route::get('company/getCompanyData', 'CompanyController@getCompanyData')->name('company.getCompanyData');
                Route::get('company/show/{id}', 'CompanyController@show')->name('company.show');
                Route::get('company/edit/{id}', 'CompanyController@edit')->name('company.edit');
                Route::post('company/update/{id}', 'CompanyController@update')->name('company.update');
                Route::post('company/delete/{id}', 'CompanyController@destroy')->name('company.delete');



                // Posts
                Route::get('posts', 'PostController@index')->name('post.index');
                Route::get('post/add', 'PostController@create')->name('post.add');
                Route::post('post/store', 'PostController@store')->name('post.store');
                Route::get('post/getPostData', 'PostController@getPostData')->name('post.getPostData');
                Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
                Route::post('post/update/{id}', 'PostController@update')->name('post.update');
                Route::post('post/delete/{id}', 'PostController@destroy')->name('post.delete');



                // Applicant

                Route::get('applicants', 'ApplicantController@index')->name('applicant.index');
                Route::get('applicant/show/{id}', 'ApplicantController@show')->name('applicant.show');
                Route::get('applicant/edit/{id}', 'ApplicantController@edit')->name('applicant.edit');
                Route::post('applicant/update/{id}', 'ApplicantController@update')->name('applicant.update');
                Route::get('applicant/getApplicantData', 'ApplicantController@getApplicantData')->name('applicant.getApplicantData');
            }
        );
    }
);
