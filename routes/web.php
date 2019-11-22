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

Route::group(['prefix' => 'admin'], function () {
    Route::get('book/create', 'Admin\BookController@add')->middleware('auth');
    Route::post('Book/create', 'Admin\BookController@create')->middleware('auth');
    Route::get('book', 'Admin\BookController@index')->middleware('auth');
    Route::get('book/edit', 'Admin\BookController@edit')->middleware('auth'); // 追記
    Route::post('book/edit', 'Admin\BookController@update')->middleware('auth'); // 追記
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
