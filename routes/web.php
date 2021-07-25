<?php

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

Route::get('/', 'HomeController@index');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/desain', 'HomeController@desain')->name('home');

Route::group(['middleware' => ['web', 'auth', 'role']], function () {
    Route::group(['role' => 'admin', 'prefix' => 'admin'], function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('/awards', 'AwardsController');
            Route::resource('/education', 'EducationController');
            Route::resource('/experience', 'ExperienceController');
            Route::resource('/interest', 'InterestController');
            Route::resource('/profile', 'ProfileController');
        });
    });
});
