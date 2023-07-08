<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', 'HomeController@home');

Auth::routes();


//CONTENIDO WEB
Route::group(['prefix' => 'pagina/categorias'], function () {
    Route::get('/', 'CategoriasController@index')->name('ver_categorias');
    Route::get('/nuevo', 'CategoriasController@nuevo')->name('agregar_categoria');
    Route::post('/guardar', 'CategoriasController@guardar')->name('guardar_categoria');
    Route::get('/editar/{id}', 'CategoriasController@editar')->name('editar_categoria');
    Route::delete('/eliminar/{id}', 'CategoriasController@eliminar')->name('eliminar_categoria');
    Route::put('/editar', 'CategoriasController@update')->name('editar.guardar_categoria');
    Route::get('/activar/{id}', 'CategoriasController@activar')->name('activar_categoria');
    Route::get('/desactivar/{id}', 'CategoriasController@desactivar')->name('desactivar_categoria');
});

Route::group(['prefix' => 'pagina/subcategorias'], function () {
    Route::get('/', 'SubcategoriasController@index')->name('ver_subcategorias');
    Route::get('/nuevo', 'SubcategoriasController@nuevo')->name('agregar_subcategoria');
    Route::post('/guardar', 'SubcategoriasController@guardar')->name('guardar_subcategoria');
    Route::get('/editar/{id}', 'SubcategoriasController@editar')->name('editar_subcategoria');
    Route::delete('/eliminar/{id}', 'SubcategoriasController@eliminar')->name('eliminar_subcategoria');
    Route::put('/editar', 'SubcategoriasController@update')->name('editar.guardar_subcategoria');
    Route::get('/activar/{id}', 'SubcategoriasController@activar')->name('activar_subcategoria');
    Route::get('/desactivar/{id}', 'SubcategoriasController@desactivar')->name('desactivar_subcategoria');
});

Route::group(['prefix' => 'pagina/productos'], function () {
    Route::get('/', 'ProductosController@index')->name('ver_productos');
    Route::get('/nuevo', 'ProductosController@nuevo')->name('agregar_producto');
    Route::post('/guardar', 'ProductosController@guardar')->name('guardar_producto');
    Route::get('/editar/{id}', 'ProductosController@editar')->name('editar_producto');
    Route::delete('/eliminar/{id}', 'ProductosController@eliminar')->name('eliminar_producto');
    Route::put('/editar', 'ProductosController@update')->name('editar.guardar_producto');
    Route::get('/activar/{id}', 'ProductosController@activar')->name('activar_producto');
    Route::get('/desactivar/{id}', 'ProductosController@desactivar')->name('desactivar_producto');
});


Route::group(['prefix' => 'pagina/inicio/carousel'], function () {
    Route::get('/', 'CarouselInicioController@index')->name('ver_carousel');
    Route::get('/nuevo', 'CarouselInicioController@nuevo')->name('agregar_carousel');
    Route::post('/guardar', 'CarouselInicioController@guardar')->name('guardar_carousel');
    Route::get('/activar/{id}', 'CarouselInicioController@activar')->name('activar_carousel');
    Route::get('/desactivar/{id}', 'CarouselInicioController@desactivar')->name('desactivar_carousel');
});


Route::group(['prefix' => 'pagina/inicio/titulo'], function () {
    Route::get('/', 'InicioController@ver_titulo')->name('inicio_titulo');
    Route::post('/nuevo', 'InicioController@editar_titulo')->name('inicio_editar_titulo');
    Route::get('/activar/{id}', 'InicioController@activar_titulo')->name('activar_inicio_titulo');
    Route::get('/desactivar/{id}', 'InicioController@desactivar_titulo')->name('desactivar_inicio_titulo');
    Route::get('/activar2/{id}', 'InicioController@activar_titulo2')->name('activar_inicio_titulo2');
    Route::get('/desactivar2/{id}', 'InicioController@desactivar_titulo2')->name('desactivar_inicio_titulo2');
    Route::get('/activar3/{id}', 'InicioController@activar_titulo3')->name('activar_inicio_titulo3');
    Route::get('/desactivar3/{id}', 'InicioController@desactivar_titulo3')->name('desactivar_inicio_titulo3');
});


Route::group(['prefix' => 'pagina/inicio/imagenes'], function () {
    Route::get('/', 'InicioImagenesController@index')->name('ver_inicio_imagenes');
    Route::get('/nuevo', 'InicioImagenesController@nuevo')->name('agregar_inicio_imagen');
    Route::post('/guardar', 'InicioImagenesController@guardar')->name('guardar_inicio_imagen');
    Route::put('/editar', 'InicioImagenesController@store')->name('editar.guardar_inicio_imagen');
    Route::get('/editar/{id}', 'InicioImagenesController@editar')->name('editar_inicio_imagen');
    Route::get('/activar/{id}', 'InicioImagenesController@activar')->name('activar_inicio_imagen');
    Route::get('/desactivar/{id}', 'InicioImagenesController@desactivar')->name('desactivar_inicio_imagen');
});
//CONTENIDO WEB





//PRODUCTOS POR SUBCATEGORIA
Route::post('/api/subcategory/productos', 'Api\ProductosController@lista');

//SECCION DE INICIO
Route::post('/api/inicio', 'Api\InicioController@lista');


/*NEW ROUTES*/
/*PRODUCTS*/

//SINCRONIZACION
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Dashboard\HomeController@index')->name('dashboard');
    
/* NEW DEVELOP*/
Route::resource('/ordenes-de-trabajo', 'Dashboard\WorkOrdersController')->only('index','create','store','show');
Route::resource('/finalizar-ordenes-de-trabajo', 'Dashboard\WorkOrdersFinishedController')->only('update');


Route::resource('/test', 'TestController')->only('index');

});





Route::resource('/new', 'HomeController')->only('index');
Route::resource('/categorias/{category}', 'SectionsController')->only('index');




//APS 2.0
Route::resource('/facturacion', 'Dashboard\BillingController')->only(['index','store']);
Route::resource('/suppliers', 'Dashboard\SupplierController')->only(['index','store','create']);
Route::resource('/clients', 'Dashboard\ClientController')->only(['index','create','store']);
Route::resource('/products', 'Dashboard\ProductController')->only(['index']);


Route::resource('/test', 'Dashboard\TestController')->only(['index','create','store']);



Route::get('locale/{locale}', function ($locale)
{
    Session::put('locale', $locale);
    return redirect('/new');
});




