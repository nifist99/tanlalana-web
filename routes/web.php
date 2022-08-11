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
    return view('web.index');
});

Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('logout','AuthController@logout');

        //artikel
        Route::get('kategori-artikel','KategoriArtikelController@index');
        Route::get('create/kategori-artikel','KategoriArtikelController@create');
        Route::get('detail/kategori-artikel/{id}','KategoriArtikelController@detail');
        Route::get('edit/kategori-artikel/{id}','KategoriArtikelController@edit');
        Route::get('delete/kategori-artikel/{id}','KategoriArtikelController@destroy');
        Route::post('store/kategori-artikel','KategoriArtikelController@store');
        Route::post('update/kategori-artikel','KategoriArtikelController@update');
});

Route::group(['middleware' => ['guest']], function () {

    Route::get('login-v','AuthController@loginView')->name('login-v');

    Route::post('login','AuthController@login');

});
