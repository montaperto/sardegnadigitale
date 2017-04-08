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
Route::resource('places', 'Find');


/*
Route::get('places', function(){
        $results = \App\Models\Place::all();
        return $results;
});*/