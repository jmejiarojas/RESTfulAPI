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

Route::resource('vehiculos','VehiculoController',['only' => ['show','index']]);
Route::resource('fabricantes','FabricanteController', ['except' => ['create','edit']]);
Route::resource('fabricantes.vehiculos','FabricanteVehiculoController',['except' => 'show']);


