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
    return view('welcome');
});

Route::any('/show', 'RequestController@show')->name('show');
Route::post('/send', 'RequestController@send')->name('send');

Route::post('/excel', 'RequestController@excel')->name('excel');
Route::any('/excelForm', 'RequestController@excelForm')->name('excelForm');

Route::any('/request', 'RequestController@request')->name('request');





