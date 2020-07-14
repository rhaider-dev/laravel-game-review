<?php

use Illuminate\Support\Facades\Route;

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

/*----front end -----*/
Route::get('/','FrontendController@landingpage');
Route::get('/archives','FrontendController@archives');
Route::get('/category/{slug}','FrontendController@category');
Route::get('/posts/{slug}','FrontendController@post');
Route::get('/pages/{slug}','FrontendController@page');
Route::get('/games','FrontendController@games')->name('games.index');
Route::get('/game/{slug}','FrontendController@single_game');
Route::get('/games/category/{slug}','FrontendController@games_category')->name('games.category');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
