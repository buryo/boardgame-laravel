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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController')->middleware('admin');
Route::resource('games', 'GameController');
Route::resource('players', 'PlayerController');
Route::resource('battles', 'BattleController');
Route::resource('scores', 'ScoreController');

Route::post('/language-chooser', 'LanguageController@changeLanguage')->name('languageChange');

//Route::post('/language/', array(
//    'before' => 'csrf',
//    'as' => 'language-chooser',
//    'uses' => 'LanguageController@changeLanguage',
//));

