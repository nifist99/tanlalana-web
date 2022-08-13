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


Route::get('/','web\BlogController@index');
Route::get('contact','web\BlogController@contact');
Route::get('blog/{id}','web\BlogController@detail');
Route::post('komentar','web\BlogController@komentar');
Route::post('subkomentar','web\BlogController@subKomentar');

Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('logout','AuthController@logout');

        //kategori artikel
        Route::get('kategori-artikel','KategoriArtikelController@index');
        Route::get('create/kategori-artikel','KategoriArtikelController@create');
        Route::get('detail/kategori-artikel/{id}','KategoriArtikelController@detail');
        Route::get('edit/kategori-artikel/{id}','KategoriArtikelController@edit');
        Route::get('delete/kategori-artikel/{id}','KategoriArtikelController@destroy');
        Route::post('store/kategori-artikel','KategoriArtikelController@store');
        Route::post('update/kategori-artikel','KategoriArtikelController@update');

        //artikel
        Route::get('artikel','ArtikelController@index');
        Route::get('create/artikel','ArtikelController@create');
        Route::get('detail/artikel/{id}','ArtikelController@detail');
        Route::get('edit/artikel/{id}','ArtikelController@edit');
        Route::get('delete/artikel/{id}','ArtikelController@destroy');
        Route::post('store/artikel','ArtikelController@store');
        Route::post('update/artikel','ArtikelController@update');

        //performance
        Route::get('management/{id}','ManagementController@index');

        //komentar
        Route::get('komentar/{id}','KomentarController@index');
        Route::get('create/komentar/{id}','KomentarController@create');
        Route::get('detail/komentar/{id}/{id_komentar}','KomentarController@detail');
        Route::get('edit/komentar/{id}/{id_komentar}','KomentarController@edit');
        Route::get('delete/komentar/{id}','KomentarController@destroy');
        Route::post('store/komentar','KomentarController@store');
        Route::post('update/komentar','KomentarController@update');

        //subkomentar
        Route::get('subkomentar/{id}','SubKomentarController@index');
        Route::get('create/subkomentar/{id}','SubKomentarController@create');
        Route::get('detail/subkomentar/{id}/{id_komentar}','SubKomentarController@detail');
        Route::get('edit/subkomentar/{id}/{id_komentar}','SubKomentarController@edit');
        Route::get('delete/subkomentar/{id}','SubKomentarController@destroy');
        Route::post('store/subkomentar','SubKomentarController@store');
        Route::post('update/subkomentar','SubKomentarController@update');

        //download
        Route::get('download/{id}','DownloadController@index');
        Route::get('create/download/{id}','DownloadController@create');
        Route::get('detail/download/{id}/{id_download}','DownloadController@detail');
        Route::get('edit/download/{id}/{id_download}','DownloadController@edit');
        Route::get('delete/download/{id}','DownloadController@destroy');
        Route::post('store/download','DownloadController@store');
        Route::post('update/download','DownloadController@update');
});

Route::group(['middleware' => ['guest']], function () {

    Route::get('login-v','AuthController@loginView')->name('login-v');

    Route::post('login','AuthController@login');

});
