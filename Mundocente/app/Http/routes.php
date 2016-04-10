<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Controlador de páginas principales

Route::get('/','PaginationController@index');
Route::get('search','PaginationController@search');

Route::resource('user','ControladorDocente');




