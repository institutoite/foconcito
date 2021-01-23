<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

Route::post('contacto', 'ContactoController@store')->name('contacto_guardar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('empresa/mostrar/{id}', 'EmpresaController@show')->name('empresa_mostrar');
Route::get('producto/mostrar/{id}', 'ImageController@show')->name('imagen_mostrar');
Route::group(['middleware' => ['auth']], function () {
    
    // RUTAS CIUDAD
    Route::get('ciudad/index', function () { return view('ciudad.index'); })->name('ciudad_datatable');
    Route::get('ciudad/crear', 'CiudadController@crear')->name('ciudad_crear');
    Route::get('ciudad/mostrar/{id}', 'CiudadController@mostrar')->name('ciudad_mostrar');
    Route::post('ciudad/guardar', 'CiudadController@guardar')->name('ciudad_guardar');
    Route::get('ciudad/{id}/editar', 'CiudadController@editar')->name('ciudad_editar');
    Route::any('ciudad/{id}/actualizar', 'CiudadController@actualizar')->name('ciudad_actualizar');
    Route::any('ciudad/eliminar/{id}', 'CiudadController@eliminar')->name('ciudad_eliminar');
    
    //RUTAS ZONA
    Route::get('zona/index', function () { return view('zona.index'); })->name('zona_datatable');
    Route::get('zonas', 'ZonaController@index')->name('zona_listar');
    Route::get('zona/crear', 'ZonaController@crear')->name('zona_crear');
    Route::get('zona/mostrar/{id}', 'ZonaController@mostrar')->name('zona_mostrar');
    Route::post('zona/guardar', 'ZonaController@guardar')->name('zona_guardar');
    Route::get('zona/{id}/editar', 'ZonaController@editar')->name('zona_editar');
    Route::any('zona/{id}/actualizar', 'ZonaController@actualizar')->name('zona_actualizar');
    Route::any('zona/eliminar/{id}', 'ZonaController@eliminar')->name('zona_eliminar');
    Route::get('radicatoria/config', 'ZonaController@radicatoria_config')->name('radicatoria');
    Route::post('zonas/fetch','ZonaController@fetch_the_zones')->name('autocompletar_zonas');
    Route::post('zona/config', 'ZonaController@guardar_si_no_existe')->name('zona_config');
  
    //RUTAS PERSONAS
    Route::get('personas', 'PersonaController@index')->name('persona_listar');
    Route::get('informar/{id}', 'PersonaController@informar')->name('persona_informar');
    Route::get('persona/crear', 'PersonaController@create')->name('persona_crear');
    Route::get('persona/mostrar/{id}', 'PersonaController@show')->name('persona_mostrar');
    Route::post('persona/guardar', 'PersonaController@store')->name('persona_guardar');
    Route::get('persona/{id}/editar', 'PersonaController@edit')->name('persona_editar');
    Route::any('persona/{id}/actualizar', 'PersonaController@update')->name('persona_actualizar');
    Route::any('persona/eliminar/{id}', 'PersonaController@destroy')->name('persona_eliminar');
    Route::get('telefonos', 'PersonaController@telefonos')->name('telefonos_persona'); 
    Route::get('enviosms/{telefono_id}/{persona_id}/{mensaje_id}', 'PersonaController@enviosms')->name('enviar_sms_persona'); // permiso que falta
    Route::get('miperfil', 'PersonaController@perfil')->name('empresario_perfil'); // permiso que falta

    //RUTAS MENSAJES
    Route::get('mensajes', 'MensajeController@index')->name('mensaje_listar');
    Route::get('mensaje/crear', 'MensajeController@create')->name('mensaje_crear');
    Route::get('mensaje/mostrar/{id}', 'MensajeController@show')->name('mensaje_mostrar');
    Route::get('mensaje/enviar/{id}', 'MensajeController@enviar')->name('bombardear');
    Route::post('mensaje/guardar', 'MensajeController@store')->name('mensaje_guardar');
    Route::get('mensaje/{id}/editar', 'MensajeController@edit')->name('mensaje_editar');
    Route::any('mensaje/{id}/actualizar', 'MensajeController@update')->name('mensaje_actualizar');
    Route::any('mensaje/eliminar/{id}', 'MensajeController@destroy')->name('mensaje_eliminar');
    Route::get('mensaje/{prefijo}/{numero}/{id}/share', 'MensajeController@share')->name('mensaje_share');
    //RUTAS DE SEGMENTACION 

    Route::get('segmentacion/{id}', 'SegmentacionController@segmentacion')->name('segmentacion');
    Route::post('segmentacion/segmentar', 'SegmentacionController@segmentar')->name('segmentar');

    //RUTAS TELEFONO
    Route::get('telefonos/{idpersona}', 'TelefonoController@telefonos')->name('telefonos');
    Route::get('telefonos/informar/{id}', 'TelefonoController@informar')->name('telefono_informar');

    Route::get('telefono/persona/{id}', 'TelefonoController@index')->name('telefono_listar');
    Route::get('telefono/crear/{id}', 'TelefonoController@create')->name('telefono_crear');
    Route::post('telefono/guardar', 'TelefonoController@store')->name('telefono_guardar');
    Route::get('telefono/{id}/editar', 'TelefonoController@edit')->name('telefono_editar');
    Route::any('telefono/{id}/actualizar', 'TelefonoController@update')->name('telefono_actualizar');
    Route::any('telefono/eliminar/{id}/{persona_id}', 'TelefonoController@destroy')->name('telefono_eliminar');

    //RUTAS CATEGORIAS
    Route::get('categorias', 'CategoriaController@index')->name('categoria_listar');
    Route::get('categoria/crear', 'CategoriaController@create')->name('categoria_crear');
    Route::get('categoria/mostrar/{id}', 'CategoriaController@show')->name('categoria_mostrar');
    Route::post('categoria/guardar', 'CategoriaController@store')->name('categoria_guardar');
    Route::get('categoria/{id}/editar', 'CategoriaController@edit')->name('categoria_editar');
    Route::any('categoria/{id}/actualizar', 'CategoriaController@update')->name('categoria_actualizar');
    Route::any('categoria/eliminar/{id}', 'CategoriaController@destroy')->name('categoria_eliminar');

    Route::get('categoria/prioridad/{id}', 'CategoriaController@prioridad')->name('categoria_prioridad');
    Route::get('categoria/resetear/{idcategoria}/{idempresa}', 'CategoriaController@reset')->name('categoria_reset');


      //RUTAS EMPRESA
    Route::get('empresas', 'EmpresaController@index')->name('empresa_listar');
    Route::get('empresa/crear', 'EmpresaController@create')->name('empresa_crear');
    
    Route::post('empresa/guardar', 'EmpresaController@store')->name('empresa_guardar');
    Route::get('empresa/{id}/editar', 'EmpresaController@edit')->name('empresa_editar');
    Route::get('empresa/{id}/compartir', 'EmpresaController@compartir')->name('empresa_compartir');
    Route::get('empresa/{prefijo}/{numero}/{id}/share', 'EmpresaController@share')->name('empresa_share');
    Route::any('empresa/{id}/actualizar', 'EmpresaController@update')->name('empresa_actualizar');
    Route::any('empresa/{id}/votar', 'EmpresaController@votar')->name('empresa_votar');
    Route::any('empresa/eliminar/{id}', 'EmpresaController@destroy')->name('empresa_eliminar');
    Route::any('empresa/detalle/{id}', 'EmpresaController@detalle')->name('empresa_detalle');
    Route::any('empresa/buscar', 'EmpresaController@buscar')->name('empresa_buscar');
    //Route::get('empresa/buscar', 'EmpresaController@buscado')->name('empresa_buscado');

    Route::any('empresa/priorizar', 'EmpresaController@priorizar')->name('empresa_priorizar');
    Route::post('empresa/guardar/prioridad', 'EmpresaController@guardar_prioridad')->name('empresa_guardar_prioridad');

    Route::get('empresa/priorizar/{id}', 'EmpresaController@vistapriorizar')->name('empresa_vista_priorizar');
    Route::get('empresa/{id}/producto', 'EmpresaController@galeria')->name('empresa_galeria');
    Route::get('empresas/config', 'EmpresaController@empresas')->name('empresa_config');
    Route::get('search/advanced/view', 'EmpresaController@busquedaavanzada')->name('busqueda_avanzada'); // permiso que falta
    Route::any('search/advanced', 'EmpresaController@buscar_avanzado')->name('empresa_buscar_avanzado'); // permiso que falta
    Route::post('empresa/publicar', 'EmpresaController@publicar')->name('empresa_publicar'); // permiso que falta
    Route::get('empresa/register/phones/{id}', 'EmpresaController@morephone_or_product')->name('numero_producto_config'); // permiso que falta
    
    // RUTAS PAGO
    Route::get('pagos', 'PagoController@index')->name('pago_listar');
    Route::get('pago/formas', 'PagoController@formas')->name('pago_formas');
    Route::get('pago/crear', 'PagoController@create')->name('pago_crear');
    Route::get('pago/informar/{id}', 'PagoController@show')->name('pago_mostrar');
    Route::post('pago/guardar', 'PagoController@store')->name('pago_guardar');
    Route::get('pago/{id}/editar', 'PagoController@edit')->name('pago_editar');
    Route::any('pago/{id}/actualizar', 'PagoController@update')->name('pago_actualizar');
    Route::post('pago/verificar', 'PagoController@verificar')->name('pago_verificar');
    Route::any('pago/eliminar/{id}', 'PagoController@destroy')->name('pago_eliminar');

    // RUTAS ORDEN
    Route::get('ordens', 'OrdenController@index')->name('orden_listar');
    Route::get('orden/crear', 'OrdenController@create')->name('orden_crear');
    Route::get('orden/mostrar/{id}', 'OrdenController@show')->name('orden_mostrar');
    Route::post('orden/guardar', 'OrdenController@store')->name('orden_guardar');
    Route::get('orden/{id}/editar', 'OrdenController@edit')->name('orden_editar');
    Route::any('orden/{id}/actualizar', 'OrdenController@update')->name('orden_actualizar');
    Route::any('orden/eliminar/{id}', 'OrdenController@destroy')->name('orden_eliminar');
    Route::any('orden/detalle/{id}', 'OrdenController@detalle')->name('orden_detalle');
    Route::get('orden/buscar', 'OrdenController@buscar')->name('orden_buscar');
    Route::get('misordenes', 'OrdenController@ordenes_empresario')->name('ordenes_empresario_listar'); // permiso que falta

   
      //RUTAS USUARIOS
    Route::get('usuarios', 'UserController@index')->name('usuario_listar');
    Route::get('usuario/crear', 'UserController@create')->name('usuario_crear');
    Route::get('usuario/mostrar/{id}', 'UserController@show')->name('usuario_mostrar');
    Route::post('usuario/guardar', 'UserController@store')->name('usuario_guardar');
    Route::get('usuario/{id}/editar', 'UserController@edit')->name('usuario_editar');
    Route::any('usuario/{id}/actualizar', 'UserController@update')->name('usuario_actualizar');
    Route::any('usuario/eliminar/{id}', 'UserController@destroy')->name('usuario_eliminar');
    Route::any('usuario/detalle/{id}', 'UserController@detalle')->name('usuario_detalle');
    Route::get('usuario/buscar', 'UserController@buscar')->name('usuario_buscar');

     //RUTAS CATEGORIAS
    Route::get('metodopagos', 'MetodopagoController@index')->name('metodopago_listar');
    Route::get('metodopago/crear', 'MetodopagoController@create')->name('metodopago_crear');
    Route::get('metodopago/mostrar/{id}', 'MetodopagoController@show')->name('metodopago_mostrar');
    Route::post('metodopago/guardar', 'MetodopagoController@store')->name('metodopago_guardar');
    Route::get('metodopago/{id}/editar', 'MetodopagoController@edit')->name('metodopago_editar');
    Route::any('metodopago/{id}/actualizar', 'MetodopagoController@update')->name('metodopago_actualizar');
    Route::any('metodopago/eliminar/{id}', 'MetodopagoController@destroy')->name('metodopago_eliminar');


    // RUTAS PRODUCTOS
    Route::post('producto', 'ImageController@store')->name('imagen_guardar');
    Route::get('producto/crear/{id}', 'ImageController@create')->name('imagen_crear');
    Route::get('producto/{id}/editar', 'ImageController@edit')->name('imagen_editar');
    Route::get('producto/{id}/votar', 'ImageController@votar')->name('imagen_votar');
    Route::get('producto/{id}/contactar', 'ImageController@contactar')->name('imagen_contactar');
    Route::any('producto/{id}/actualizar', 'ImageController@update')->name('imagen_actualizar');
    Route::delete('producto/eliminar/{id}', 'ImageController@destroy')->name('imagen_eliminar');
    

    // RUTAS IMAGENES
    Route::delete('imagen/eliminar/{id}', 'ImagenController@destroy')->name('imagen_delete');
    

    //RUTAS CONSTANTES
    Route::get('constantes', 'ConstanteController@index')->name('constante_listar');
    Route::get('constante/crear', 'ConstanteController@create')->name('constante_crear');
    Route::get('constante/mostrar/{id}', 'ConstanteController@show')->name('constante_mostrar');
    Route::post('constante/guardar', 'ConstanteController@store')->name('constante_guardar');
    Route::get('constante/{id}/editar', 'ConstanteController@edit')->name('constante_editar');
    Route::any('constante/{id}/actualizar', 'ConstanteController@update')->name('constante_actualizar');
    Route::any('constante/eliminar/{id}', 'ConstanteController@destroy')->name('constante_eliminar');

      //RUTAS CLIKCS
    Route::get('clicks', 'ClickController@index')->name('click_listar');
    Route::get('click/crear', 'ClickController@create')->name('click_crear');
    Route::get('click/mostrar/{id}', 'ClickController@show')->name('click_mostrar');
    Route::post('click/guardar', 'ClickController@store')->name('click_guardar');
    Route::get('click/{id}/editar', 'ClickController@edit')->name('click_editar');
    Route::any('click/{id}/actualizar', 'ClickController@update')->name('click_actualizar');
    Route::any('click/eliminar/{id}', 'ClickController@destroy')->name('click_eliminar');

      //RUTAS TELOFEMPRESA
    Route::get('telofempresa', 'TelofempresaController@telofempresas')->name('telofempresas_listar');  
    Route::get('telofempresa/empresa/{id}', 'TelofempresaController@index')->name('telofempresa_listar');
    Route::get('telofempresa/mostrar/{id}', 'TelofempresaController@show')->name('telofempresa_mostrar');
    Route::get('telofempresa/crear/{id}', 'TelofempresaController@create')->name('telofempresa_crear');
    Route::post('telofempresa/guardar', 'TelofempresaController@store')->name('telofempresa_guardar');
    Route::get('telofempresa/{id}/editar', 'TelofempresaController@edit')->name('telofempresa_editar');
    Route::any('telofempresa/{id}/actualizar', 'TelofempresaController@update')->name('telofempresa_actualizar');
    Route::any('telofempresa/eliminar/{id}/{empresa_id}', 'TelofempresaController@destroy')->name('telofempresa_eliminar');
    
    

    //Route::get('telofempresa', 'EmpresaController@config')->name('numero_producto_config');  
//    Route::return redirect()->back()->withErrors($validator)->withInput();
    //Route::redirect('URI', 'URI', 301);

});


/***

  mejorar formulario de telefonos de personas y empresas 
  cambiar el titulo de los fromularios 
  poner logotipo de foconcito en el buscar


 */



