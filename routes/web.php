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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'AnnonceController@show')->name('home');

Auth::routes();

Route::get('/home', 'AnnonceController@show')->name('home');

Route::get('/annonce/create', 'AnnonceController@create', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/annonce/show', 'AnnonceController@show');

Route::get('/annonce/showone/{id}', 'AnnonceController@showone');

Route::post('/annonce/create', 'AnnonceController@store', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::get('/categorie/create', 'CategorieController@create');
Route::post('/categorie/create', 'CategorieController@store', function () {
    // Only authenticated users may enter...
})->middleware('auth');

Route::post('/addcomment', 'AnnonceController@addcomment', function () {
    // Only authenticated users may enter...
})->middleware('auth');
