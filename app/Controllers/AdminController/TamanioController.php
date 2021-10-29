<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Ingredientes_modelo;
use App\Models\Admin\Marcas_modelo;
use App\Models\Admin\Motivos_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Tamanios_Ingredientes_modelo;
use App\Models\Admin\Tamanios_modelo;
use App\Models\Admin\Tipo_Tamanio_modelo;
use App\Models\Admin\Tipos_modelo;
use CodeIgniter\Controller;

class TamanioController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $motivos_modelo;
  protected $status_modelo;
  protected $tipos_modelo;
  protected $tipos_tamanio_modelo;
  protected $tamanios_ingredientes_modelo;
  protected $ingredientes_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    
    $this->tamanios_modelo = new Tamanios_modelo();
    $this->status_modelo = new Status_modelo();
    $this->tipos_modelo = new Tipos_modelo();
    $this->tipos_tamanio_modelo = new Tipo_Tamanio_modelo();
    $this->tamanios_ingredientes_modelo = new Tamanios_Ingredientes_modelo();
    //$this->ingredientes_modelo = new Ingredientes_modelo();


    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';

  
    public function tamanios()
  {

    $lista['lista_status'] = $this->status_modelo->findAll();
    $lista['lista_tamanios'] = $this->tamanios_modelo->findAll();

    if ($this->request->getVar('id')) {
      $lista['lista_edit_tamanio'] = $this->tamanios_modelo->where("id", $this->request->getVar('id'))->findAll();
    }

    if ($this->request->getVar('id_tamanio')) {
      $lista['lista_validar'] = array('id_tamanio' => $this->request->getVar('id_tamanio'));
      $lista['lista_edit_tipos'] = $this->tamanios_modelo->_obtener_tipos($this->request->getVar('id_tamanio'));
      $lista['lista_tipos'] = $this->tipos_modelo->findAll();
    }

    if ($this->request->getVar('id_tamanio_ingrediente')) {
      $lista['lista_validar_tamanio_ingrediente'] = array('id_tamanio_ingrediente' => $this->request->getVar('id_tamanio_ingrediente'));
      $lista['lista_edit_ingredientes'] = $this->tamanios_ingredientes_modelo->_obtener_ingredientes($this->request->getVar('id_tamanio_ingrediente'));
      $lista['lista_tipos'] = $this->tipos_modelo->findAll();
      $lista['lista_ingredientes'] = $this->ingredientes_modelo->findAll();
    }

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'tamanios', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_tamanios()
  {

    $idTamanio = $this->request->getVar("txtId");

    $datos_tamanio = [
      'tamanio' =>  $this->request->getVar('txtNombre'),
      'status' =>  $this->request->getVar('txtStatus'),
      'cve_usuario' =>  "1"
    ];

    if ($idTamanio != null) {
      array_merge($datos_tamanio, array("id" => $idTamanio));
    }

    $datos_tamanio = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgTamanio'),
      './public/Admin/img/tamanios',
      $datos_tamanio,
      "imagen"
    );

    $respuesta = null;
    try {
      if ($idTamanio != null) {
        $respuesta = $this->tamanios_modelo->update($idTamanio, $datos_tamanio);
      } else {
        $respuesta = $this->tamanios_modelo->save($datos_tamanio);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->tamanios_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->tamanios_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/tamanios"));
  }

  public function accion_tipo_tamanio()
  {
    $idTipo_Tamanio = $this->request->getVar("txtId");
    $idTamanio = $this->request->getVar("txtTamanio");
   

    $datos_tipo_tamanio = [
      'id_tipo' =>  $this->request->getVar('txtTipo'),
      'id_tamanio' =>  $this->request->getVar('txtTamanio'),
      'precio' =>  $this->request->getVar('txtPrecio'),
      'cve_usuario' => "1"
    ];

    if ($idTipo_Tamanio != null) {
      array_merge($datos_tipo_tamanio, array("id" => $idTipo_Tamanio));
    }

    $respuesta = null;
    try {
      if ($idTipo_Tamanio != null) {
        $respuesta = $this->tipos_tamanio_modelo->update($idTipo_Tamanio, $datos_tipo_tamanio);
      } else {
        $respuesta = $this->tipos_tamanio_modelo->save($datos_tipo_tamanio);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->tipos_tamanio_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->tipos_tamanio_modelo->errors());

    
    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/tamanios?id_tamanio=".$idTamanio));
    
  }

  public function accion_tipo_tamanio_ingrediente()
  {
    $id_Tamanio_ingrediente = $this->request->getVar("txtId");
    $txtIdTamanioIngrediente2 =  $this->request->getVar('txtIdTamanioIngrediente');
  
    $datos_ingrediente_tamanio = [
      'id_ingrediente' =>  $this->request->getVar('txtIngrediente'),
      'id_tipo_tamanio' =>  $this->request->getVar('txtIdTamanioIngrediente'),
      'porcion' =>  $this->request->getVar('txtPorcion'),
      'cve_usuario' => "1"
    ];

    if ($id_Tamanio_ingrediente != null) {
      array_merge($datos_ingrediente_tamanio, array("id" => $id_Tamanio_ingrediente));
    }

    $respuesta = null;
    try {
      if ($id_Tamanio_ingrediente != null) {
        $respuesta = $this->tamanios_ingredientes_modelo->update($id_Tamanio_ingrediente, $datos_ingrediente_tamanio);
      } else {
        $respuesta = $this->tamanios_ingredientes_modelo->save($datos_ingrediente_tamanio);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->tamanios_ingredientes_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->tamanios_ingredientes_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/tamanios?id_tamanio_ingrediente=".$txtIdTamanioIngrediente2));
    
  }




}
