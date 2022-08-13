<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'HomeController@home');

Auth::routes();



//USUARIOS CLIENTES
Route::group(['prefix' => 'clientes'], function () {
    Route::get('/', 'ClientesController@index')->name('ver_clientes');
    Route::get('/nuevo', 'ClientesController@nuevo')->name('agregar_cliente');
    Route::post('/guardar', 'ClientesController@guardar')->name('guardar_cliente');
    Route::get('/editar/{id}', 'ClientesController@editar')->name('editar_cliente');
    Route::delete('/eliminar/{id}', 'ClientesController@eliminar')->name('eliminar_cliente');
    Route::put('/editar', 'ClientesController@update')->name('editar.guardar_cliente');
});

//USUARIOS PROVEEDORES
Route::group(['prefix' => 'proveedores'], function () {
    Route::get('/', 'ProveedoresController@index')->name('ver_proveedores');
    Route::get('/nuevo', 'ProveedoresController@nuevo')->name('agregar_proveedor');
    Route::post('/guardar', 'ProveedoresController@guardar')->name('guardar_proveedor');
    Route::get('/editar/{id}', 'ProveedoresController@editar')->name('editar_proveedor');
    Route::delete('/eliminar/{id}', 'ProveedoresController@eliminar')->name('eliminar_proveedor');
    Route::put('/editar', 'ProveedoresController@update')->name('editar.guardar_proveedor');
});




//USUARIOS FACTURAS APS
Route::group(['prefix' => 'facturas'], function () {
    Route::get('/', 'FacturasController@index')->name('ver_facturas');
    Route::get('/nuevo', 'FacturasController@nuevo')->name('agregar_factura');
    Route::post('/guardar', 'FacturasController@guardar')->name('guardar_factura');
    Route::get('/editar/{id}', 'FacturasController@editar')->name('editar_factura');
    Route::delete('/eliminar/{id}', 'FacturasController@eliminar')->name('eliminar_factura');
    Route::put('/editar', 'FacturasController@update')->name('editar.guardar_factura');
    Route::get('/pagar/{id}', 'FacturasController@pagar')->name('pagar_factura');
});


//USUARIOS FACTURAS PROVEEDORES
Route::group(['prefix' => 'proveedores/facturas'], function () {
    Route::get('/', 'FacturasProveedorController@index')->name('ver_facturasProv');
    Route::get('/nuevo', 'FacturasProveedorController@nuevo')->name('agregar_facturaProv');
    Route::post('/guardar', 'FacturasProveedorController@guardar')->name('guardar_facturaProv');
    Route::get('/editar/{id}', 'FacturasProveedorController@editar')->name('editar_facturaProv');
    Route::delete('/eliminar/{id}', 'FacturasProveedorController@eliminar')->name('eliminar_facturaProv');
    Route::put('/editar', 'FacturasProveedorController@update')->name('editar.guardar_facturaProv');
    Route::get('/pagar/{id}', 'FacturasProveedorController@pagar')->name('pagar_facturaProv');
});





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





//PRODUCTOS POR SUBCATEGORIA
Route::post('/api/subcategory/productos', 'Api\ProductosController@lista');

//SECCION DE INICIO
Route::post('/api/inicio', 'Api\InicioController@lista');





















//USUARIOS RUTAS
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', 'UsersController@index')->name('ver_usuarios');
    Route::get('/nuevo', 'UsersController@nuevo')->name('agregar_usuario');
    Route::post('/guardar', 'UsersController@guardar')->name('guardar_usuario');
    Route::get('/editar/{id}', 'UsersController@editar')->name('editar_usuario');
    Route::delete('/eliminar/{id}', 'UsersController@eliminar')->name('eliminar_usuario');
    Route::put('/editar', 'UsersController@update')->name('editar.guardar_usuario');
});
//PROYECTOS RUTAS
Route::group(['prefix' => 'proyectos'], function () {
    Route::get('/', 'ProyectosController@index')->name('ver_proyectos');
    Route::get('/nuevo', 'ProyectosController@nuevo')->name('agregar_proyecto');
    Route::post('/guardar', 'ProyectosController@guardar')->name('guardar_proyecto');
    Route::get('/nuevo', 'ProyectosController@nuevo')->name('agregar_proyecto');
    Route::get('/editar/{id}', 'ProyectosController@editar')->name('editar_proyecto');
    Route::delete('/eliminar/{id}', 'ProyectosController@eliminar')->name('eliminar_proyecto');
    Route::put('/editar', 'ProyectosController@update')->name('editar.guardar_proyecto');
    Route::get('/generar/{id}', 'ProyectosController@generar')->name('generar_proyecto');
    Route::put('/generar', 'ProyectosController@update')->name('editar.generar_proyecto');

    //AJAX
    Route::post('/ajax/detalle/agregar', 'DetalleProyectoController@guardar')->name('guardar_detalle_proyecto');
    Route::post('/ajax/detalle/obtener', 'DetalleProyectoController@obtener')->name('obtener_detalle_proyecto');
    Route::post('/ajax/detalle/eliminar', 'DetalleProyectoController@eliminar')->name('eliminar_detalle_proyecto');
    Route::post('/ajax/generar', 'ProyectosController@generar_finish')->name('finish.generar_proyecto');
});

//CATALOGO GRAL RUTAS
Route::group(['prefix' => 'catalogo-general'], function () {
    Route::get('/', 'CatalogoGralController@index')->name('ver_catalogogral');
    Route::get('/nuevo', 'CatalogoGralController@nuevo')->name('agregar_catalogogral');
    Route::post('/guardar', 'CatalogoGralController@guardar')->name('guardar_catalogogral');
    Route::get('/editar/{id}', 'CatalogoGralController@editar')->name('editar_catalogogral');
    Route::delete('/eliminar/{id}', 'CatalogoGralController@eliminar')->name('eliminar_catalogogral');
    Route::put('/editar', 'CatalogoGralController@update')->name('editar.guardar_catalogogral');
});
//CATALOGO UNIDADES
Route::group(['prefix' => 'unidades'], function () {
    Route::get('/', 'UnidadController@index')->name('ver_unidades');
    Route::get('/nuevo', 'UnidadController@nuevo')->name('agregar_unidad');
    Route::post('/guardar', 'UnidadController@guardar')->name('guardar_unidad');
    Route::get('/editar/{id}', 'UnidadController@editar')->name('editar_unidad');
    Route::delete('/eliminar/{id}', 'UnidadController@eliminar')->name('eliminar_unidad');
    Route::put('/editar', 'UnidadController@update')->name('editar.guardar_unidad');
});

//COTIZACIONES RUTAS
Route::group(['prefix' => 'cotizaciones'], function () {
    Route::get('/concursos', 'CotizacionesController@concursos')->name('ver_concursos');
    Route::get('/generar/{id}', 'CotizacionesController@generar')->name('generar_cotizacion');
    Route::post('/ajax/detalle/agregar', 'DetalleCotizacionController@agregar')->name('agregar_detalle_cotizacion');
    Route::get('/enviar/{id}', 'CotizacionesController@enviar')->name('enviar_cotizacion');


    Route::get('/', 'CotizacionesController@index')->name('ver_cotizaciones');
    Route::get('/nuevo', 'CotizacionesController@nuevo')->name('agregar_cotizacion');
    Route::get('/historial', 'CotizacionesController@nuevo')->name('historial_cotizaciones');
    Route::post('/guardar', 'CotizacionesController@guardar')->name('guardar_usuario');
    Route::get('/editar/{id}', 'CotizacionesController@editar')->name('editar_usuario');
    Route::delete('/eliminar/{id}', 'CotizacionesController@eliminar')->name('eliminar_usuario');
    Route::put('/editar', 'CotizacionesController@update')->name('editar.guardar_usuario');

    //AJAX
    Route::post('/ajax/detalle/agregar', 'DetalleCotizacionController@agregar')->name('agregar_detalle_cotizacion');
    Route::post('/ajax/detalle/eliminar', 'DetalleCotizacionController@eliminar')->name('eliminar_detalle_cotizacion');
});










/*NEW ROUTES*/
/*PRODUCTS*/

//SINCRONIZACION
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Dashboard\HomeController@index')->name('dashboard');
    Route::resource('/new-products', 'Dashboard\NewProductsController')->only(['index']);
    Route::resource('/sync/products-existences', 'Dashboard\SyncProductsExistencesController')->only(['index']);
});




Route::resource('/sync/products', 'Dashboard\SyncProductsController')->only(['index']);


Route::resource('/new', 'HomeController')->only('index');
Route::resource('/categorias/{category}', 'SectionsController')->only('index');



Route::get('locale/{locale}', function ($locale)
{
    Session::put('locale', $locale);
    return redirect('/new');
});
// Route::get('{slug}', 'HomeController')->only('index');
