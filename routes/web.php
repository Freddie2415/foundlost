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


//Route::resource('adverts', 'AdvertController');

Route::middleware(['auth'])->group(function () {
    Route::get('adverts/create', 'AdvertController@create')->name('adverts.create');
    Route::post('adverts', 'AdvertController@store')->name('adverts.store');
});


Route::get('adverts', 'AdvertController@index')->name('adverts.index');
Route::get('adverts/{advert}', 'AdvertController@show')->name('adverts.show');

Route::get('/losts', 'AdvertController@losts')->name('losts');
Route::get('/finds', 'AdvertController@finds')->name('finds');
Route::get('/my-ad', 'AdvertController@myad')->name('myad');
Route::post('/hide', 'AdvertController@hidead')->name('hidead');

Route::get('/filter', 'AdvertController@filterByCategory')->name('filter');
