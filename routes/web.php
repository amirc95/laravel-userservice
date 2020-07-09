<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


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

Route::get('/', function () {
    return Redirect::to('/home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editor', 'HomeController@getEditor')->name('editor');

Route::put('/update', 'HomeController@update')->name('update');

Route::delete('/delete', 'HomeController@delete')->name('delete');
