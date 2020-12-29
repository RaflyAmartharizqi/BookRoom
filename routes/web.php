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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware();
//Kelas
Route::get('/ruang','RuangController@index');
Route::get('/create-ruang', function () {
    return view('ruang/create');
});
Route::post('ruang','ruangController@store');
Route::get('ruang/{ruang}/edit', 'RuangController@edit');
Route::post('ruang/{ruang}/update', 'RuangController@update');
Route::get('ruang/{ruang}/delete', 'RuangController@delete');

//Users
Route::get('/users','UserController@index');
Route::get('users/{users}/delete', 'UserController@delete');

//Calendar
Route::get('events','EventsController@index')->name('events.index');
Route::post('/tambah-events','EventsController@addEvent');
Route::get('/events/{event}/edit', 'EventsController@update');
Route::post('events/{event}/update', 'EventsController@editEvent');
Route::get('events/{event}/delete', 'EventsController@delete');



