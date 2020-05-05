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

Route::get('dashboard', function () {
	return view('dashboard.index');
})->name('dashboard');

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/kirimemail','MailController@index');

Route::post('/postlogin', 'AuthController@login')->name('postlogin');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout');

Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create']);
Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store']);
Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit']);
Route::put('fakultas/edit/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update']);
Route::get('fakultas/delete/{id}', ['as' => 'fakultas.delete', 'uses' => 'FakultasController@delete']);

Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
Route::get('jurusan/create', ['as' => 'jurusan.create', 'uses' => 'JurusanController@create']);
Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store']);
Route::get('jurusan/edit/{id_jurusan}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit']);
Route::put('jurusan/edit/{id_jurusan}', ['as' => 'jurusan.update', 'uses' => 'JurusanController@update']);
Route::get('jurusan/delete/{id_jurusan}', ['as' => 'jurusan.delete', 'uses' => 'JurusanController@delete']);

Route::get('ruangan', ['as' => 'ruangan.index', 'uses' => 'RuanganController@index']);
Route::get('ruangan/create', ['as' => 'ruangan.create', 'uses' => 'RuanganController@create']);
Route::post('ruangan', ['as' => 'ruangan.store', 'uses' => 'RuanganController@store']);
Route::get('ruangan/edit/{id_ruangan}', ['as' => 'ruangan.edit', 'uses' => 'RuanganController@edit']);
Route::put('ruangan/edit/{id_ruangan}', ['as' => 'ruangan.update', 'uses' => 'RuanganController@update']);
Route::get('ruangan/delete/{id_ruangan}', ['as' => 'ruangan.delete', 'uses' => 'RuanganController@delete']);

Route::get('barang', ['as' => 'barang.index', 'uses' => 'BarangController@index']);
Route::get('barang/create', ['as' => 'barang.create', 'uses' => 'BarangController@create']);
Route::post('barang', ['as' => 'barang.store', 'uses' => 'BarangController@store']);
Route::get('barang/edit/{id_barang}', ['as' => 'barang.edit', 'uses' => 'BarangController@edit']);
Route::put('barang/edit/{id_barang}', ['as' => 'barang.update', 'uses' => 'BarangController@update']);
Route::get('barang/delete/{id_barang}', ['as' => 'barang.delete', 'uses' => 'BarangController@delete']);
Route::get('export', ['as' => 'barang.export', 'uses' => 'BarangController@export']);