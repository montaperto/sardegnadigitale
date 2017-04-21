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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//nome path 
//nome controller

Route::get('/', 'Find@index');
Route::get('places', 'Find@index');
Route::get('place/{id}', 'Find@place');

Route::patch('/place/{id}',[
    'as' => 'place.review',
    'uses' => 'Find@place'
]);
//Route::get('place/markasinterested{place_id}', 'Place@markasinterested');

/*
Route::get('place/create', 'Find@create');
Route::get('place/edit', 'Find@edit');
Route::get('place/destroy', 'Find@destroy');
Route::get('place/store', 'Find@store');
Route::get('place/show', 'Find@show');
Route::get('place/update', 'Find@update');
*/


//Ajax calls
Route::get('markasinterested', 'Place@markasinterested');
Route::get('markasvisited', 'Place@markasvisited');


Route::get('profile', 'Account@index');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'Find@index');
