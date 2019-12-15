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

Route::get('/', function () {
    return redirect()->route('adverts.index');
});

Auth::routes();

Route::get('/home', 'AdvertController@index')->name('home');

Route::resource('adverts', 'AdvertController')->middleware('auth');
Route::get('/losts', 'AdvertController@losts')->middleware('auth');
Route::get('/finds', 'AdvertController@finds')->middleware('auth');
Route::get('/my-ad', 'AdvertController@myad')->name('myad')->middleware('auth');
Route::post('/hide','AdvertController@hidead')->name('hidead');
