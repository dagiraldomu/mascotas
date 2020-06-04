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

Route::get('/pets/create ','PetController@create')->name('pets.create');

Route::middleware('checkRole:admin')->post('/pets','PetController@store')->name('pets.store');

Route::middleware('checkRole:admin')->patch('/pets/{pet}','PetController@update')->name('pets.update');

Route::middleware('checkRole:admin')->delete('/pets/{pet}','PetController@destroy')->name('pets.destroy');

Route::middleware('checkRole:admin')->get('/pets/{pet}/edit','PetController@edit')->name('pets.edit');


//Route::get('/pets/{pet}','PetController@show')->name('pets.show');

//Route::resource('pets','PetController');

