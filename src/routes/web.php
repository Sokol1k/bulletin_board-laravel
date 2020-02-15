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

Route::middleware('auth')->group(function () {

    Route::middleware('confirmed')->group(function () {
        Route::get('/', function () {
            return redirect('bulletins');
        });
        Route::resource('bulletins', 'BulletinController');
        Route::put('users/{user}/confirm/{type}', 'UserController@confirm')->name('users.confirm');
        Route::get('users/bulletins', 'UserController@bulletins')->name('users.bulletins');
        Route::get('users/count', 'UserController@count')->name('users.count');
        Route::resource('users', 'UserController');
    });

    Route::get('unconfirmed', 'UserController@unconfirmed')->name('users.unconfirmed');
    Route::get('rejected', 'UserController@rejected')->name('users.rejected');
});

Auth::routes();
