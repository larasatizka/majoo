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

Route::middleware(['authcheck'])->group(function() {
	Route::get('/login', 'LoginController@index');
	Route::post('/login/dologin', 'LoginController@doLogin');
});
Route::get('logout', 'LoginController@logout');
Route::get('/katalog', 'ProdukController@katalog');
Route::get('/produkkategori/{nama_kategori}', 'ProdukController@kategori');
Route::get('/search', 'HomeController@search');
Route::middleware(['authlogedin'])->group(function(){
	

	// KATEGORI
	Route::get('/kategori', 'KategoriController@index');
	Route::get('/tambah-kategori', 'KategoriController@create');
	Route::post('/do-add-kategori', 'KategoriController@store');
	Route::get('/edit-kategori', 'KategoriController@show');
	Route::post('/do-update-kategori', 'KategoriController@update');
	Route::get('/delete-kategori/{id_kategori}', 'KategoriController@destroy');

	// PRODUK
	Route::get('/', 'ProdukController@index');
	Route::get('/produk', 'ProdukController@index');
	Route::get('/tambah-produk', 'ProdukController@create');
	Route::post('/do-add-produk', 'ProdukController@store');
	Route::get('/edit-produk/{id_produk}', 'ProdukController@show');
	Route::post('/do-update-produk/{id_produk}', 'ProdukController@update');
	Route::get('/delete-produk/{id_produk}', 'ProdukController@destroy');


});

