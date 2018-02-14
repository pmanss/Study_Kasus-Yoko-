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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'web'], function(){



});

Route::group(['middleware' => ['web', 'cekuser:1' ]], function(){
   Route::get('divisi/data', 'DivisiController@listData')->name('divisi.data');
   Route::resource('divisi', 'DivisiController');

   Route::get('santri/data', 'SantriController@listData')->name('santri.data');
   Route::post('santri/hapus', 'SantriController@deleteSelected');
   Route::post('santri/cetak', 'SantriController@printBarcode');
   Route::get('santri/{id}/lihat', 'SantriController@show');   
   Route::resource('santri', 'SantriController');

});

