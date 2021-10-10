<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Funciones;
use App\Models\Admin\Categorias_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use CodeIgniter\Controller;

class Home extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $Categorias_modelo;
  protected $status_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(1);

    $this->Categorias_modelo = new Categorias_modelo();
    $this->status_modelo = new Status_modelo();
    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';

  public function principal()
  {
    return redirect()->to(base_url("admin/index"));
  }

  public function index()
  {
    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'index');
    echo view($this->rutaFooter);
  }

  public function clientes()
  {
    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'clientes');
    echo view($this->rutaFooter);
  }


  //usuarios

  public function categorias()
  {
    $lista['lista_categorias'] = $this->Categorias_modelo->findAll();
    //$lista['lista_colum'] = $this->Categorias_modelo->getLastQuery();
    $lista['lista_status'] = $this->status_modelo->findAll();


    if ($this->request->getVar('id')) {
      $lista['lista_edit_categorias'] = $this->Categorias_modelo->where("id", $this->request->getVar('id'))->findAll();
    }

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'categorias', $lista);
    echo view($this->rutaFooter);
    
  }

  public function accion_categorias()
  {

    $idCategoria = $this->request->getVar("txtId");

    $datos_categoria = [
      'categoria' =>  $this->request->getVar('txtNombre'),
      'status' =>  $this->request->getVar('txtStatus'),
      'cve_usuario' =>  "1"
    ];

    if ($idCategoria != null) {
      array_merge($datos_categoria, array("id" => $idCategoria));
    }

    $datos_categoria = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgCategoria'),
      './public/Admin/img/categorias',
      $datos_categoria,
      "imagen"
    );

    $respuesta = null;
    try {
      if ($idCategoria != null) {
        $respuesta = $this->Categorias_modelo->update($idCategoria, $datos_categoria);
      } else {
        $respuesta = $this->Categorias_modelo->save($datos_categoria);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->Categorias_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->Categorias_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/categorias"));
  }

}
