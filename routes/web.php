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



Route::get('dropzone', 'HomeController@dropzone');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'HomeController@dropzoneStore']);


Route::get('dropzone/image','ImageController@index');
Route::post('dropzones/store','ImageController@store');
Route::post('dropzones/dropzoness','ImageController@store');

Route::resource('albums','AlbumController');

Route::get('album/{id}','ImageController@singleAlbume');
Route::resource('images','ImageController');
Route::post('images/{id}/delete','ImageController@destroy');