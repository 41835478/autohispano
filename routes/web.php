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

Route::get('/', 'SistemController@home');

Route::get('/login','SistemController@login');

Route::get('/inventario','SistemController@inventario');

Route::post('/mandarmensaje','SistemController@mandarMensaje');
Route::get('/lista', 'SistemController@listaDealers');

Route::get('/perfil/{perfilPublico}', 'SistemController@perfilPublico');


/****Usuarios********/

Route::get('/usuario/logout','UsersController@logout');

Route::get('/usuario/perfil','UsersController@perfil');

Route::get('/usuario/perfil/configuracion','UsersController@configuracion');

Route::get('/usuario/pagar','UsersController@pagoDealer');

Route::get('/usuario/pagar/{carro}','UsersController@pagoUsuario');

Route::get('/usuario/perfil/pagos','UsersController@pagos');

Route::get('/usuario/perfil/mensajes','UsersController@mensajes');

Route::post('/cobrar','UsersController@cobrar');

Route::post('/usuario/perfil/actualizar','UsersController@actualizar');

Route::post('usuario/login','UsersController@login');

Route::post('/usuario/nuevo','UsersController@nuevo');

Route::get('/usuario/mensaje/{id}','UsersController@leerMensaje');

Route::get('/usuario/perfil/inventario','UsersController@inventario');



/*****************Carros***********/

Route::get('/carro/nuevo','SistemController@agregarCarro');

Route::post('/carro/nuevo','SistemController@postAgregarCarro');

Route::get('/carro/view/{id}','SistemController@mostrarCarro');

Route::get('/carro/vendido/{id}','SistemController@carroVendido');