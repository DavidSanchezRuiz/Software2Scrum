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

Route::resource('activar-user','ControllerLogin@activarUsuario');

Route::resource('desactivar-user','ControllerLogin@desactivarUsuario');

Route::get('home','ControllerLogin@index');
Route::get('settings','ControllerLogin@configurar');

Route::get('logout','ControllerLogin@salir');
Route::get('admin','ControllerLogin@admin');








Route::resource('preferencias','ControllerPreferences');

Route::resource('permissions','ControllerRegister@permisoPublicador');
Route::resource('cancelar-permissions','ControllerRegister@permisoPublicadorCancelar');



Route::resource('add-publication','ControllerActivity');




Route::get('publication','ControllerActivity@configurarPublicaciones');





Route::resource('search','ControllerSearch');

Route::resource('search-avanced','ControllerSearchEspecific');



Route::get('resultados-convocatorias','ControllerSearch@mostrarConvocatorias');
Route::get('resultados-revistas','ControllerSearch@mostrarRevistas');
Route::get('resultados-eventos','ControllerSearch@mostrarEvento');

Route::get('/{id_un}','ControllerSearch@mostrarUniversidad');
