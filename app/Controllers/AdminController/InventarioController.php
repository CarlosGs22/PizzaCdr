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
    $paginas = 10;
    
    $this->inventario_modelo->select("ingrediente.ingrediente,cantidad,fecha_actualizacion,inventario.id,sucursal.nombre as sucursal");
    $this->inventario_modelo->join("ingrediente","inventario.id_ingrediente_producto = ingrediente.id");
    $this->inventario_modelo->join("sucursal","sucursal.id = inventario.id_sucursal");
    
   
    $search = null;
		if ($this->request->getVar('txtBuscar') != null) {
			$search = $this->request->getVar('txtBuscar');
		}
    if ($search == null) {
      $lista["lista_inventario"] =  $this->inventario_modelo->paginate($paginas);
		} else {
			$lista['lista_inventario'] = $this->inventario_modelo->like("ingrediente",$this->request->getVar('txtBuscar'))->paginate($paginas);
		}

    $lista["pager"] = $this->inventario_modelo->pager->links();



  
 
    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'inventario',$lista);
    echo view($this->rutaFooter);
  }

 


}
