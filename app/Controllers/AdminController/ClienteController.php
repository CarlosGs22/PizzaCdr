<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Clientes_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use CodeIgniter\Controller;

class ClienteController extends Controller
{

  protected $helpers = [];
  protected $session;

  protected $clientes_modelo;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session($config);

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    $this->session = session();
    $this->clientes_modelo = new Clientes_modelo();


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

    public function clientes()
  {

    $lista['lista_clientes'] = $this->clientes_modelo->findAll();
    
    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'clientes', $lista);
    echo view($this->rutaFooter);
  }

  

}
