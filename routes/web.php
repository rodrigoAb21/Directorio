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
Route::put('ubicacion/editar/{id}','UbicacionController@editar');
Route::delete('ubicacion/eliminar/{id}','UbicacionController@eliminar');




/* ******************* Rutas para los rubros ****************** */
Route::get('verRubros','RubroController@verRubros');
Route::get('rubros','RubroController@index');
Route::post('rubros/registrar','RubroController@registrar');
Route::put('rubros/editar/{id}','RubroController@editar');
Route::delete('rubros/eliminar/{id}','RubroController@eliminar');







/* ******************* Rutas para las busquedas ****************** */
Route::get('rubro/{id}','BusquedaController@listarPorRubro');
Route::post('busqueda','BusquedaController@buscar');


