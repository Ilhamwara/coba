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

Route::get('/', 'UserController@login');
Route::post('login', 'UserController@post_login');
Route::get('register', 'UserController@register');
Route::post('register', 'UserController@post_register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('memberarea', 'UserController@memberarea');
    Route::get('profile', 'UserController@profile');
    Route::get('edit', 'UserController@edit');
    Route::post('profile', 'UserController@editprofile');
    Route::get('wallet', 'UserController@wallet');
    Route::get('downline', 'UserController@downline');
    Route::get('withdraw', 'UserController@withdraw');
    Route::get('history', 'UserController@history');
    Route::get('setting', 'UserController@setting');
    Route::get('member', 'UserController@member');
    Route::get('logout', 'UserController@logout');
});



// Auth::routes();
Route::get('/home', 'HomeController@index');
