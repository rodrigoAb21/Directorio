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

Route::get('/', function () {
    return view('index');
});


/* ******************* Rutas para las empresas ****************** */
Route::get('registrarEmpresa', 'EmpresaController@vistaCrear');
Route::post('registrarEmpresa', 'EmpresaController@registrar');
Route::get('empresa/{id}', 'EmpresaController@verEmpresa');
Route::delete('empresa/{id}', 'EmpresaController@eliminar');
Route::get('empresa/editar/{id}','EmpresaController@vistaEditar');
Route::patch('empresa/editar/{id}','EmpresaController@editar');

/* ******************* Rutas para ubicaciones ****************** */
Route::post('empresa/{id}/registrarUbicacion','UbicacionController@registrar');





/* ******************* Rutas para los rubros ****************** */









/* ******************* Rutas para las busquedas ****************** */



