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

Route::resource('auth','ControllerHome');
Route::get('/','ControllerHome@inicio');
Route::get('login','ControllerHome@ingresar');


Route::resource('singup','ControllerRegister');



Route::resource('user','ControllerLogin');
Route::get('home','ControllerLogin@index');
Route::get('settings','ControllerLogin@configurar');
Route::get('publication','ControllerLogin@configurarPublicaciones');
Route::get('logout','ControllerLogin@salir');



Route::resource('preferencias','ControllerPreferences');



Route::resource('search','ControllerSearch');
Route::get('convocatorias','ControllerSearch@mostrarConvocatorias');
Route::get('revistas','ControllerSearch@mostrarRevistas');
Route::get('eventos','ControllerSearch@mostrarEvento');
