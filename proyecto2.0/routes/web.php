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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pets','PetController@index')->name('pets.index');

Route::post('/pets','PetController@store')->name('pets.store');

Route::get('/pets/create ','PetController@create')->name('pets.create');

Route::get('/pets/{pet}','PetController@show')->name('pets.show');

Route::patch('/pets/{pet}','PetController@update')->name('pets.update');

Route::delete('/pets/{pet}','PetController@destroy')->name('pets.destroy');

Route::get('/pets/{pet}/edit','PetController@edit')->name('pets.edit');

//Route::resource('pets','PetController');
