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
|
|       Route::resource('/userController', 'UserController');
|       Route::get('/contato', 'ContatoController@lista');
|       Route::resource('/userController', 'UserController');
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('/user', 'UserController');

Route::resource('/computer', 'ComputerController');
Route::post('/computer/search', 'ComputerController@search');

Route::resource('/monitor', 'MonitorController');