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


/* ++++++++++++++++++++++++++++++++++++ AMDMIN ++++++++++++++++++++++++++++++++ */
$routes->get('/admin/inicio', 'AdminController/Home::principal', ['filter' => 'auth']);
$routes->get('/admin/index', 'AdminController/Home::index', ['filter' => 'auth']);


$routes->get('/login', 'PublicoController/LoginController::login', ['filter' => 'noauth']);
$routes->post('/accion_login', 'PublicoController/LoginController::accion_login');

//clientes
$routes->get('/admin/clientes', 'AdminController/ClienteController::clientes', ['filter' => 'auth']);

//categorias
$routes->get('/admin/categorias', 'AdminController/Home::categorias', ['filter' => 'auth']);
$routes->post('/admin/accion_categorias', 'AdminController/Home::accion_categorias');

//tamanios
$routes->get('/admin/tamanios', 'AdminController/TamanioController::tamanios', ['filter' => 'auth']);
$routes->post('/admin/accion_tamanios', 'AdminController/TamanioController::accion_tamanios');
$routes->post('/admin/accion_tipo_tamanio', 'AdminController/TamanioController::accion_tipo_tamanio');
$routes->post('/admin/accion_tipo_tamanio_ingrediente', 'AdminController/TamanioController::accion_tipo_tamanio_ingrediente');


//sucursal
$routes->get('/admin/sucursales', 'AdminController/SucursalController::sucursales', ['filter' => 'auth']);
$routes->post('/admin/accion_sucursales', 'AdminController/SucursalController::accion_sucursales');
$routes->get('/admin/entidades', 'AdminController/SucursalController::entidades', ['filter' => 'auth']);
$routes->get('/admin/obtenerEntidades', 'AdminController/SucursalController::obtenerEntidades');
$routes->get('/admin/accion_sucursales_localidades', 'AdminController/SucursalController::accion_sucursales_localidades');
$routes->post('/admin/accion_registrar_localidades', 'AdminController/SucursalController::accion_registrar_localidades');


//usuarios
$routes->get('/admin/usuarios', 'AdminController/UsuariosController::usuarios', ['filter' => 'auth']);
$routes->post('/admin/accion_usuarios', 'AdminController/UsuariosController::accion_usuarios');

//productos
$routes->get('/admin/productos', 'AdminController/ProductoController::productos', ['filter' => 'auth']);
$routes->post('/admin/accion_productos', 'AdminController/ProductoController::accion_productos');
$routes->post('/admin/accion_productos_editar', 'AdminController/ProductoController::accion_productos_editar');
$routes->post('/admin/accion_imagenes', 'AdminController/ProductoController::accion_imagenes');


//proveedores
$routes->get('/admin/proveedores', 'AdminController/ProveedorController::proveedores', ['filter' => 'auth']);
$routes->post('/admin/accion_proveedores', 'AdminController/ProveedorController::accion_proveedores');

//salir
$routes->get('/salir', 'PublicoController/LoginController::salir');

//usuarios_clientes
$routes->get('/admin/usuarios_cliente', 'AdminController/UsuariosController::usuarios_cliente', ['filter' => 'auth']);
$routes->post('/admin/accion_usuarios_clientes_public', 'AdminController/UsuariosController::accion_usuarios_clientes_public');


//promociones
$routes->get('/admin/promociones', 'AdminController/PromocionController::promociones', ['filter' => 'auth']);
$routes->post('/admin/accion_promociones', 'AdminController/PromocionController::accion_promociones');
$routes->get('/admin/promociones/consultaTamanio', 'AdminController/PromocionController::consultaTamanio');
$routes->post('/admin/accion_productos_promociones', 'AdminController/PromocionController::accion_productos_promociones');


//ingredientes
$routes->get('/admin/consulta_porciones', 'AdminController/IngredienteController::consulta_porciones/');

$routes->get('/admin/ingredientes', 'AdminController/IngredienteController::ingredientes', ['filter' => 'auth']);
$routes->post('/admin/accion_ingredientes', 'AdminController/IngredienteController::accion_ingredientes');
$routes->post('/admin/accion_menu', 'AdminController/IngredienteController::accion_menu');
$routes->post('/admin/consultaMenuIngredientes', 'AdminController/IngredienteController::consultaMenuIngredientes');
$routes->post('/admin/accion_ingredientes_menu', 'AdminController/IngredienteController::accion_ingredientes_menu');
$routes->post('/admin/accion_tamanio_ingrediente', 'AdminController/IngredienteController::accion_tamanio_ingrediente');


//compras
$routes->get('/admin/compras', 'AdminController/ComprasController::compras', ['filter' => 'auth']);
$routes->post('/admin/accion_compras', 'AdminController/ComprasController::accion_compras');
$routes->post('/admin/accion_compras_borrar', 'AdminController/ComprasController::accion_compras_borrar');


//permisos
$routes->get('/admin/permisos', 'AdminController/PermisosController::permisos', ['filter' => 'auth']);
$routes->post('/admin/accion_permiso', 'AdminController/PermisosController::accion_permiso');
$routes->get('/admin/obtenerSubmenuUsuario', 'AdminController/PermisosController::obtenerSubmenuUsuario');

//micuenta
$routes->get('/admin/micuenta', 'AdminController/UsuariosController::micuenta', ['filter' => 'auth']);
$routes->post('/admin/accion_micuenta', 'AdminController/UsuariosController::accion_micuenta');


//inventario
$routes->get('/admin/inventario', 'AdminController/InventarioController::inventario', ['filter' => 'auth']);
$routes->post('/admin/accion_inventario', 'AdminController/InventarioController::accion_inventario');


//horarios
$routes->post('/admin/accion_horarios', 'AdminController/SucursalController::accion_horarios');

//ventas
$routes->get('/admin/ventas', 'AdminController/VentasController::ventas', ['filter' => 'auth']);

//pedidos
$routes->get('/admin/pedidos', 'AdminController/PedidosController::pedidos', ['filter' => 'auth']);







/* ++++++++++++++++++++++++++++++++++ PUBLICO ++++++++++++++++++++++++++++++++++++++++++++++ */


$routes->get('/', 'PublicoController/Home::principal');
$routes->post('/buscar_cobertura', 'PublicoController/Home::buscar_cobertura');
$routes->post('/contacto', 'PublicoController/Home::contacto');

$routes->get('/detalle/(:any)', 'PublicoController\Home::detalle/$1', ['filter' => 'sessionsucursal']);
$routes->get('/menu/(:any)', 'PublicoController\Home::menu/$1', ['filter' => 'sessionsucursal']);


//carritooo

$routes->get('/carrito', 'PublicoController/Carrito::carrito', ['filter' => 'sessionsucursal']);
$routes->post('/accion_carrito', 'PublicoController/Carrito::accion_carrito');
$routes->get('/limpiar_carrito', 'PublicoController/Carrito::limpiar_carrito');
$routes->get('/accion_cantidad', 'PublicoController/Carrito::accion_cantidad');
$routes->get('/eliminarItem/(:any)', 'PublicoController\Carrito::eliminarItem/$1', ['filter' => 'sessionsucursal']);


//nosotros
$routes->get('/nosotros', 'PublicoController/Home::nosotros');

//Sin servicio
$routes->get('/servicio', 'PublicoController/Home::servicio');

//mi cuenta
$routes->get('/micuenta', 'PublicoController/ClienteController::micuenta', ['filter' => 'noauthcliente']);
$routes->post('/accion_usuarios_clientes', 'PublicoController/ClienteController::accion_usuarios_clientes', ['filter' => 'noauthcliente']);
$routes->post('/accion_direccion', 'PublicoController/ClienteController::accion_direccion', ['filter' => 'noauthcliente']);
$routes->get('/accion_direcciones/(:any)', 'PublicoController\ClienteController::accion_direcciones/$1', ['filter' => 'noauthcliente']);

$routes->get('/pasarela', 'PublicoController/PasarelaController::pasarela', ['filter' => 'sessionsucursal']);
$routes->post('/accion_pasarela', 'PublicoController/PasarelaController::accion_pasarela', ['filter' => 'sessionsucursal'], ['filter' => 'noauthcliente']);

//miscompras
$routes->get('/miscompras/(:any)', 'PublicoController\ClienteController::miscompras/$1');



if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
