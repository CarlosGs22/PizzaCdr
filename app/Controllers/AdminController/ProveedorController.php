<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Proveedores_modelo;
use CodeIgniter\Controller;


class ProveedorController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $usuarios_modelo;
  protected $status_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));

    $this->proveedores_modelo = new Proveedores_modelo();
    $this->status_modelo = new Status_modelo();

    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


  public function proveedores()
  {

    $paginas = 10;

    $search = null;
    if ($this->request->getVar('txtBuscar') != null) {
      $search = $this->request->getVar('txtBuscar');
    }
    if ($search == null) {
      $lista['lista_proveedores'] = $this->proveedores_modelo->paginate($paginas);
    } else {
      $lista['lista_proveedores'] = $this->proveedores_modelo->like("nombre", $search)->paginate($paginas);
    }



    $lista['lista_status'] = $this->status_modelo->findAll();

    if ($this->request->getVar('id')) {
      $lista['lista_edit_proveedores'] = $this->proveedores_modelo->where("id", $this->request->getVar('id'))->findAll();
    }

    $lista["pager"] = $this->proveedores_modelo->pager->links();

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'proveedores', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_proveedores()
  {

    $idProveedor = $this->request->getVar("txtId");

    $datos_proveedor = [
      'nombre' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtNombre')),
      'apellido_paterno' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtApe1')),
      'apellido_materno' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtApe2')),
      'razon_social' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtRazon')),
      'telefono' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtTelefono')),
      'direccion' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtDireccion')),
      'correo' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtDireccion')),
      'status' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtStatus')),
      'cve_usuario' =>  $this->session->get("id")
    ];

    if ($idProveedor != null) {
      array_merge($datos_proveedor, array("id" => $this->funciones->cleanSanitize("INT",$idProveedor)));
    }


    $respuesta = null;
    try {
      if ($idProveedor != null) {
        $respuesta = $this->proveedores_modelo->update($idProveedor, $datos_proveedor);
      } else {
        $respuesta = $this->proveedores_modelo->save($datos_proveedor);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->proveedores_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->proveedores_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/proveedores"));
  }
}
