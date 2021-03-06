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

Route::get('/', 'ArticleController@index');

Auth::routes(['verify' => true]);

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('/home', 'HomeController@index');

Route::get('/epl', 'HomeController@tableEpl');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{article}', 'ArticleController@show');



Route::get('/games', 'GameController@index');
Route::get('/players', 'PlayerController@index');

Route::post('/articles', 'ArticleController@store');


//Adding data to database

Route::get('/add-countries-data', 'CountryController@create_countries');

Route::get('/add-leagues-data', 'LeagueController@create_leagues');

Route::get('/add-positions-data', 'PositionController@add_positions');

Route::get('/add-teams-england', 'TeamController@add_england_team');


Route::get('/add-players-data', 'PlayerController@add_players_data');

Route::get('/comments', 'CommentController@get');
