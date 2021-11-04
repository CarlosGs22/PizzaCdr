<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Permisos_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sub_Menu_Model;
use App\Models\Admin\Sucursal_Localidad_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Usuarios_modelo;
use CodeIgniter\Controller;

class PermisosController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $status_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    
  
    $this->status_modelo = new Status_modelo();
    $this->funciones = new Funciones();
    $this->session = session();


    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


 
  public function permisos()
  {

    $usuarios_model = new Usuarios_modelo();

    $lista['listas_usuarios'] = $usuarios_model->_obtenerUsuarios($this->session->get("id"));

    $submenu_model = new Sub_Menu_Model();
    $datasubmenu['listas_submenu'] = $submenu_model->_obtenerSubmenu_web($this->session->get("id"));


    echo view($this->rutaHeader,$this->datamenu);
    echo view($this->rutaModulo . 'permisos', $lista);
    echo view($this->rutaFooter);
  }


  public function obtenerSubmenuUsuario()
  {
    $submenu_model = new Sub_Menu_Model();
    $permiso_model = new Permisos_modelo();

    $data1 = $submenu_model->_obtenerMenus();
    $data2 = $permiso_model->_obtenerPermisoUsuario($this->request->getVar('txtUsuario'));

    $lista_datos = array(
      'submenu' => $data1,
      'permiso' => $data2
    );

    header('Content-Type: application/json');
    echo json_encode($lista_datos);
  }

  public function accion_permiso()
  {

    $opcion = $this->request->getVar('opcion');
    $idsubmenu = $this->request->getVar('idsubmenu');
    $idusuario = $this->request->getVar('idusuario');


    $permiso_model = new Permisos_modelo();

    $data = [
      'id_submenu' =>  $idsubmenu,
      'id_usuario' => $idusuario
    ];

    if ($opcion == "1") {
      $respuesta = $permiso_model->save($data);
    } else if ($opcion == "2") {
     
      if($permiso_model->where("id_submenu",$idsubmenu)->where("id_usuario",$idusuario)->delete()){
        $respuesta = "1";
      }else{
        $respuesta = "";
      }
    } else {
      $respuesta = "";
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $permiso_model->errors());
            
    echo json_encode($respuesta);
  }
}
