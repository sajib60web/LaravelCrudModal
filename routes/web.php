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
	$categories = App\Category::all();
    return view('master', compact('categories'));
});

Route::get('/category', 'CategoryController@index');
Route::post('/insert', 'CategoryController@insert');
Route::post('/update', 'CategoryController@update');
Route::post('/delete', 'CategoryController@delete');

Route::get('posts', 'PostController@index');
Route::post('/insert', 'PostController@insert');
Route::post('/update', 'PostController@update');
Route::post('/delete', 'PostController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
