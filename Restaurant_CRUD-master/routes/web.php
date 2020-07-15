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
Route::get('/create/menu/{category_id}','MenuController@create');
Route::post('/create/menu/{category_id}','MenuController@store');
Route::get('/menus', 'MenuController@index');
Route::get('/create/category','CategoryController@create');
Route::get('/edit/menu/{id}','MenuController@edit');
Route::post('/edit/menu/{id}','MenuController@update');
Route::delete('/delete/menu/{id}','MenuController@destroy');
Route::post('/create/category','CategoryController@store');
Route::get('/categories', 'CategoryController@index');
Route::get('/edit/category/{id}','CategoryController@edit');
Route::post('/edit/category/{id}','CategoryController@update');
Route::delete('/delete/category/{id}','CategoryController@destroy');
Route::get('/clients', 'ClientController@index');
