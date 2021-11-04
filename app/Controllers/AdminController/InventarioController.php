<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Inventario_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_Localidad_modelo;
use App\Models\Admin\Sucursal_modelo;
use CodeIgniter\Controller;

class InventarioController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $sucursales_modelo;
  protected $status_modelo;
  protected $inventario_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    
    $this->sucursales_modelo = new Sucursal_modelo();
    $this->status_modelo = new Status_modelo();
    $this->inventario_modelo = new Inventario_modelo();
  
    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


  public function inventario()
  {
    $this->inventario_modelo->select("ingrediente.ingrediente,cantidad,fecha_actualizacion,inventario.id,sucursal.nombre as sucursal");
    $this->inventario_modelo->join("ingrediente","inventario.id_ingrediente_producto = ingrediente.id");
    $this->inventario_modelo->join("sucursal","sucursal.id = inventario.id_sucursal");
    
    $lista["lista_inventario"] =  $this->inventario_modelo-> findAll();
    
 
    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'inventario',$lista);
    echo view($this->rutaFooter);
  }

 
  public function accion_sucursales()
  {

    $idSucursal = $this->request->getVar("txtId");

    $datos_sucursal = [
      'nombre' =>  $this->request->getVar('txtNombre'),
      'telefono' =>  $this->request->getVar('txtTelefono'),
      'calle' =>  $this->request->getVar('txtCalle'),
      'numero' =>  $this->request->getVar('txtNumero'),
      'colonia' =>  $this->request->getVar('txtColonia'),
      'cp' =>  $this->request->getVar('txtCp'),
      'status' =>  $this->request->getVar('txtStatus'),
      'cve_usuario' =>  "1",
      'id_localidad' =>  $this->request->getVar('txtLocalidad')
    ];

    if ($idSucursal != null) {
      array_merge($datos_sucursal, array("id" => $idSucursal));
    }

    $datos_sucursal = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgSucursal'),
      './public/Admin/img/sucursales',
      $datos_sucursal,
      "imagen"
    );

    $respuesta = null;
    try {
      if ($idSucursal != null) {
        $respuesta = $this->sucursales_modelo->update($idSucursal, $datos_sucursal);
      } else {
        $respuesta = $this->sucursales_modelo->save($datos_sucursal);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->sucursales_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->sucursales_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/sucursales"));
  }

}
