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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('book/create', 'Admin\BookController@add');
    Route::post('book/create', 'Admin\BookController@create');
    Route::get('book', 'Admin\BookController@index');
    Route::get('book/edit', 'Admin\BookController@edit'); // 一覧
    Route::post('book/edit', 'Admin\BookController@update'); // 更新
    Route::get('book/delete', 'Admin\BookController@delete'); // 削除
    Route::get('/', 'BookController@index');
});


