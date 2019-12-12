<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Data Petugas 
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('petugas', 'UserController@index');
Route::get('login/check', 'UserController@getAuthenticatedUser');
Route::post('petugas/{id}', 'UserController@update');
Route::delete('petugas/{id}', 'UserController@destroy');

//Data Siswa
Route::get('siswa', 'SiswaController@index');
Route::get('siswa/{id}', 'SiswaController@show');
Route::post('siswa', 'SiswaController@store');
Route::post('siswa/{id}', 'SiswaController@update');
Route::delete('siswa/{id}', 'SiswaController@destroy');

//Data Pelaggaran
Route::get('pelanggaran', 'PelanggaranController@index');
Route::get('pelanggaran/{id}', 'PelanggaranController@show');
Route::post('pelanggaran', 'PelanggaranController@store');
Route::post('pelanggaran/{id}', 'PelanggaranController@update');
Route::delete('pelanggaran/{id}', 'PelanggaranController@destroy');

//Data Poin Siswa
Route::get('poin_siswa', 'PoinSiswaController@index');
Route::get('poin_siswa/{id}', 'PoinSiswaController@show');
Route::post('poin_siswa/find', 'PoinSiswaController@find');
Route::post('poin_siswa', 'PoinSiswaController@store');
Route::post('poin_siswa/{id}', 'PoinSiswaController@update');
Route::delete('poin_siswa/{id}', 'PoinSiswaController@destroy');

Route::get('dashboard/statistic', 'DashboardController@dashboard');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});