<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/','FrontController@index');
	Route::get('/inicio','FrontController@inicio');
	Route::get('logout','LoginController@logout');
	Route::get('pdf', 'PdfController@invoice');
	Route::get('estadistica', 'EstadisticaController@index');
	Route::get('estadisticaRecargar', 'EstadisticaController@productos');
	Route::get('estadisticaSalidas', 'EstadisticaController@salidas');
	Route::get('clientes/pdf','PdfClienteController@invoice');
	Route::get('productos/pdf','PdfProductoController@invoice');
	Route::get('inventarios/pdf','PdfInventarioController@invoice');
	Route::get('ventas/{id}','VentaController@leerProducto');
	Route::get('ventasDisponible/{id}','VentaController@disponible');
	Route::get('password/email','Auth\PasswordController@getEmail');
	Route::get('password/reset/{token}','Auth\PasswordController@getReset');
	Route::post('password/email','Auth\PasswordController@postEmail');
	Route::post('password/reset','Auth\PasswordController@postReset');
	Route::resource('cliente','ClienteController');
	Route::resource('usuario','UsuarioController');
	Route::resource('producto','ProductoController');
	Route::resource('credito','CreditoController');
	Route::resource('inventario','InventarioController');
	Route::resource('venta','VentaController');
	Route::resource('/login','LoginController');
	Route::resource('/mail','MailController');
	Route::resource('/recuperacion','MailController@index');
});
