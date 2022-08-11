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

Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('logout','AuthController@logout');
});

Route::group(['middleware' => ['guest']], function () {

    Route::get('login-v','AuthController@loginView')->name('login-v');

    Route::post('login','AuthController@login');

});
