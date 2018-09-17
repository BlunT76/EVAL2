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

Route::get('/annonce/create', 'AnnonceController@create');

Route::get('/annonce/show', 'AnnonceController@show');

Route::post('/annonce/create', 'AnnonceController@store', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/categorie/create', 'CategorieController@create');
Route::post('/categorie/create', 'CategorieController@store', function () {
    // Only authenticated users may enter...
})->middleware('auth');
