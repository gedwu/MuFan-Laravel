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

Route::get('/', 'GameController@index');

Auth::routes(['verify' => true]);

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('/home', 'HomeController@index');

Route::get('/epl', 'HomeController@tableEpl');


Route::get('/games', 'GameController@index');
Route::get('/players', 'PlayerController@index');
Route::get('/articles', 'ArticleController@index');