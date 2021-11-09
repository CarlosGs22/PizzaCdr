<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_Localidad_modelo;
use App\Models\Admin\Sucursal_modelo;
use CodeIgniter\Controller;

class SucursalController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $sucursales_modelo;
  protected $localidades_modelo;
  protected $municipios_modelo;
  protected $estados_modelo;
  protected $sucursales_localidades_modelo;
  protected $status_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    
    $this->sucursales_modelo = new Sucursal_modelo();
    $this->status_modelo = new Status_modelo();
    $this->localidades_modelo = new Localidades_modelo();

    $this->estados_modelo = new Estados_modelo();
    $this->municipios_modelo = new Municipios_modelo();
    $this->localidades_modelo = new Localidades_modelo();
    $this->sucursales_localidades_modelo = new Sucursal_Localidad_modelo();
    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


  public function sucursales()
  {


    $lista['lista_sucursales'] = $this->sucursales_modelo->findAll();
    $lista['lista_status'] = $this->status_modelo->findAll();

    $lista['lista_estados'] = $this->estados_modelo->findAll();

    $lista['lista_edit_sucursales'] = $this->sucursales_modelo->select('sucursal.*, municipio.id as muni_id, localidad.id as loca_id, municipio.estado_id as esta_id')
      ->join('localidad', 'localidad.id = sucursal.id_localidad')
      ->join('municipio', 'municipio.id = localidad.municipio_id')->where("sucursal.id", $this->request->getVar('id'))->findAll();

    $lista['lista_municipios'] = $this->municipios_modelo->where("estado_id",  $lista['lista_edit_sucursales'][0]['esta_id'])->findAll();

    $lista['lista_localidades'] = $this->localidades_modelo->where("municipio_id",  $lista['lista_edit_sucursales'][0]['muni_id'])->findAll();

    if ($this->request->getVar('idSucursal')) {
      $lista['idSucursal_localidad'] = array('idSucursal' => $this->request->getVar('idSucursal'));
      $lista['lista_localidades_registradas'] = $this->localidades_modelo->_obtenerLocalidadesRegistradas($this->request->getVar('idSucursal'));
    }

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'sucursales', $lista);
    echo view($this->rutaFooter);
  }

  public function obtenerEntidades()
  {

    if ($this->request->getVar('id_estado')) {
      $lista['lista_municipios'] = $this->municipios_modelo->where("estado_id", $this->request->getVar('id_estado'))->findAll();
    }

    if ($this->request->getVar('id_municipio')) {
      $lista['lista_localidades'] = $this->localidades_modelo->_obtenerLocalidadesNot($this->request->getVar('id_municipio'), $this->request->getVar('id_sucursal'));
    }

    header('Content-Type: application/json');
    echo json_encode($lista);
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
      'src_frame' =>  $this->request->getVar('txtFrame'),
      'facebook_link' =>  $this->request->getVar('txtLink'),
      'correo' =>  $this->request->getVar('txtCorreo'),
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

  public function accion_sucursales_localidades()
  {
    $opcion = $this->request->getVar('opcion');

    $datos_sucursal_localidad = [
      'id_sucursal' =>  $this->request->getVar('idSucursal'),
      'id_localidad' =>  $this->request->getVar('idLocalidad'),
    ];

    $respuesta = null;
    try {
      if ($opcion == '0') {
        $respuesta = $this->sucursales_localidades_modelo->save($datos_sucursal_localidad);
      } else {
        $respuesta = $this->sucursales_localidades_modelo->where('id_sucursal', $this->request->getVar('idSucursal'))->where('id_localidad', $this->request->getVar('idLocalidad')->delete());
      }
    } catch (\Throwable $th) {
      $respuesta = $this->sucursales_localidades_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->sucursales_localidades_modelo->errors());

    echo json_encode($respuesta);
  }

  public function accion_registrar_localidades()
  {

    $datos_registro = [
      'precio' => $this->request->getVar("precio"),
      'id' =>  $this->request->getVar('idSucursal_localidad')
    ];

    $respuesta = null;
    try {
      $respuesta = $this->sucursales_localidades_modelo->update($this->request->getVar('idSucursal_localidad'), $datos_registro);
    } catch (\Throwable $th) {
      $respuesta = $this->sucursales_localidades_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->sucursales_localidades_modelo->errors());

    echo json_encode($respuesta);
  }
}
