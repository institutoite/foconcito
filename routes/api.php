<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Ciudad;
use App\Zona;


Route::get('ciudades', function () {
    return datatables()
           ->eloquent(App\Ciudad::query())
           ->addColumn('btn','ciudad.acciones')
           ->rawColumns(['btn'])
           ->toJson();
           
})->name('ciudades_table');

Route::get('prioridades/{id}','EmpresaController@getprioridades')->name('prueba');

Route::get('ciudad/{id}/zonas','ZonaController@zones_of_city');

Route::get('pais/{id}/ciudades','CiudadController@city_of_country');
Route::get('telefono/{idpersona}','TelefonoController@telefonos');
Route::get('imagenes/{idempresa}','ImageController@imagenes');
