<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */



$routes->get('/', 'AdminController/Home::principal',['filter' => 'auth']);
$routes->get('/admin/index', 'AdminController/Home::index',['filter' => 'auth']);


$routes->get('/login', 'PublicoController/LoginController::login',['filter' => 'noauth']);
$routes->post('/accion_login', 'PublicoController/LoginController::accion_login');

//clientes
$routes->get('/admin/clientes', 'AdminController/ClienteController::clientes',['filter' => 'auth']);

//categorias
$routes->get('/admin/categorias', 'AdminController/Home::categorias',['filter' => 'auth']);
$routes->post('/admin/accion_categorias', 'AdminController/Home::accion_categorias');

//tamanios
$routes->get('/admin/tamanios', 'AdminController/TamanioController::tamanios',['filter' => 'auth']);
$routes->post('/admin/accion_tamanios', 'AdminController/TamanioController::accion_tamanios');
$routes->post('/admin/accion_tipo_tamanio', 'AdminController/TamanioController::accion_tipo_tamanio');
$routes->post('/admin/accion_tipo_tamanio_ingrediente', 'AdminController/TamanioController::accion_tipo_tamanio_ingrediente');


//sucursal
$routes->get('/admin/sucursales', 'AdminController/SucursalController::sucursales',['filter' => 'auth']);
$routes->post('/admin/accion_sucursales', 'AdminController/SucursalController::accion_sucursales');
$routes->get('/admin/entidades', 'AdminController/SucursalController::entidades',['filter' => 'auth']);
$routes->get('/admin/obtenerEntidades', 'AdminController/SucursalController::obtenerEntidades');
$routes->get('/admin/accion_sucursales_localidades', 'AdminController/SucursalController::accion_sucursales_localidades');
$routes->post('/admin/accion_registrar_localidades', 'AdminController/SucursalController::accion_registrar_localidades');



//usuarios
$routes->get('/admin/usuarios', 'AdminController/UsuariosController::usuarios',['filter' => 'auth']);
$routes->post('/admin/accion_usuarios', 'AdminController/UsuariosController::accion_usuarios');

//productos
$routes->get('/admin/productos', 'AdminController/ProductoController::productos',['filter' => 'auth']);
$routes->post('/admin/accion_productos', 'AdminController/ProductoController::accion_productos');
$routes->get('/admin/consulta_porciones', 'AdminController/ProductoController::consulta_porciones/');
$routes->post('/admin/accion_productos_editar', 'AdminController/ProductoController::accion_productos_editar');
$routes->post('/admin/accion_imagenes', 'AdminController/ProductoController::accion_imagenes');


//proveedores
$routes->get('/admin/proveedores', 'AdminController/ProveedorController::proveedores',['filter' => 'auth']);
$routes->post('/admin/accion_proveedores', 'AdminController/ProveedorController::accion_proveedores');

//salir
$routes->get('/salir', 'PublicoController/LoginController::salir');

//usuarios_clientes
$routes->get('/admin/usuarios_cliente', 'AdminController/UsuariosController::usuarios_cliente',['filter' => 'auth']);
$routes->post('/admin/accion_usuarios_clientes', 'AdminController/UsuariosController::accion_usuarios_clientes');


//promociones
$routes->get('/admin/promociones', 'AdminController/PromocionController::promociones',['filter' => 'auth']);
$routes->post('/admin/accion_promociones', 'AdminController/PromocionController::accion_promociones');
$routes->get('/admin/promociones/consultaTamanio', 'AdminController/PromocionController::consultaTamanio');
$routes->post('/admin/accion_productos_promociones', 'AdminController/PromocionController::accion_productos_promociones');


//articukos
$routes->get('/admin/articulos', 'AdminController/Articulo::index',['filter' => 'auth']);
$routes->get('/getAll', 'AdmnController/Articulo::getAll');
$routes->post('/getOne', 'AdminController/Articulo::getOne');
$routes->post('/add', 'AdminController/Articulo::add');
$routes->post('/edit', 'AdminController/Articulo::edit');


//ingredientes
$routes->get('/admin/ingredientes', 'AdminController/IngredienteController::ingredientes',['filter' => 'auth']);
$routes->post('/admin/accion_ingredientes', 'AdminController/IngredienteController::accion_ingredientes');
$routes->post('/admin/accion_menu', 'AdminController/IngredienteController::accion_menu');
$routes->post('/admin/consultaMenuIngredientes', 'AdminController/IngredienteController::consultaMenuIngredientes');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
