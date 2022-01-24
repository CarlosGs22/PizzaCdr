<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Funciones;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Ingredientes_Menu_modelo;
use App\Models\Admin\Ingredientes_modelo;
use App\Models\Admin\Menu_Modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use CodeIgniter\Controller;

class IngredienteController extends Controller
{

    protected $helpers = [];
    protected $session;
    protected $datamenu;
    protected $ingredientes_modelo;
    protected $menu_modelo;
    protected $status_modelo;
    protected $ingredientes_menu_modelo;
    protected $funciones;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();

        $submenu_web = new Permiso_menu_modelo();
        $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));

        $this->ingredientes_modelo = new Ingredientes_modelo();
        $this->status_modelo = new Status_modelo();
        $this->menu_modelo = new Menu_Modelo();
        $this->ingredientes_menu_modelo = new Ingredientes_Menu_modelo();
        $this->funciones = new Funciones();
        $this->session = session();

        $especiales = new Especiales_modelo();
        $this->datamenu['listas_especiales'] = $especiales->findAll();
    }

    public $rutaHeader = 'Admin/Marcos/header.php';
    public $rutaModulo = 'Admin/Modulos/';
    public $rutaFooter = 'Admin/Marcos/footer.php';


    public function ingredientes()
    {

        $paginas = 10;

        $search = null;
        if ($this->request->getVar('txtBuscar') != null) {
            $search = $this->request->getVar('txtBuscar');
        }
        if ($search == null) {
            $lista['lista_ingredientes'] = $this->ingredientes_modelo->paginate($paginas);
        } else {
            $lista['lista_ingredientes'] = $this->ingredientes_modelo->like("ingrediente", $search)->paginate($paginas);
        }



        $searchM = null;
        if ($this->request->getVar('txtBuscarMenu') != null) {
            $searchM = $this->request->getVar('txtBuscarMenu');
        }
        if ($searchM == null) {
            $lista['lista_menu'] = $this->menu_modelo->paginate($paginas);
        } else {
            $lista['lista_menu'] = $this->menu_modelo->like("nombre", $searchM)->paginate($paginas);
        }



        $lista['lista_status'] = $this->status_modelo->findAll();

        if ($this->request->getVar('id')) {
            $lista['lista_edit_ingredientes'] = $this->ingredientes_modelo->where("id", $this->request->getVar('id'))->findAll();
        }

        if ($this->request->getVar('idMenu')) {
            $lista['lista_edit_menu'] = $this->menu_modelo->where("id", $this->request->getVar('idMenu'))->findAll();
        }

        if ($this->request->getVar('idMenuIng')) {
            $lista['lista_menu_ingrediente'] = $this->menu_modelo->_obtenerIngredienteMenu($this->request->getVar('idMenuIng'));

            $lista['lista_validar_ing'] = array('idMenuIng' => $this->request->getVar('idMenuIng'));
        }

        $lista["pager"] = $this->ingredientes_modelo->pager->links();
        $lista["pagerM"] = $this->menu_modelo->pager->links();



        echo view($this->rutaHeader, $this->datamenu);
        echo view($this->rutaModulo . 'ingredientes', $lista);
        echo view($this->rutaFooter);
    }

    public function accion_ingredientes()
    {

        $idIngrediente = $this->request->getVar("txtId");

        $datos_ingrediente = [
            'ingrediente' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtIngrediente')),
            'status' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtStatus')),
            'cve_usuario' =>  $this->session->get("id")
        ];

        if ($idIngrediente != null) {
            array_merge($datos_ingrediente, array("id" => $idIngrediente));
        }


        $respuesta = null;
        try {
            if ($idIngrediente != null) {
                $respuesta = $this->ingredientes_modelo->update($idIngrediente, $datos_ingrediente);
            } else {
                $respuesta = $this->ingredientes_modelo->save($datos_ingrediente);
            }
        } catch (\Throwable $th) {
            $respuesta = $this->ingredientes_modelo->error();
        }

        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->ingredientes_modelo->errors());

        $this->session->setFlashdata('respuesta', $respuesta);
        return redirect()->to(base_url("admin/ingredientes"));
    }

    public function accion_menu()
    {

        $idMenu = $this->request->getVar("txtId");

        $datos_menu = [
            'nombre' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtNombre')),
            'status' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtStatus')),
            'cve_usuario' =>  $this->session->get("id")
        ];

        if ($idMenu != null) {
            array_merge($datos_menu, array("id" => $this->funciones->cleanSanitize("INT",$idMenu)));
        }


        $respuesta = null;
        try {
            if ($idMenu != null) {
                $respuesta = $this->menu_modelo->update($idMenu, $datos_menu);
            } else {
                $respuesta = $this->menu_modelo->save($datos_menu);
            }
        } catch (\Throwable $th) {
            $respuesta = $this->menu_modelo->error();
        }

        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->menu_modelo->errors());

        $this->session->setFlashdata('respuesta', $respuesta);
        return redirect()->to(base_url("admin/ingredientes"));
    }

    public function accion_ingredientes_menu()
    {
        $opcion = $this->request->getVar('opcion');

        $datos_ingrediente_menu = [
            'id_ingrediente' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('id_ingrediente')),
            'id_menu' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('id_menu')),
            'cve_usuario' =>  $this->session->get("id")
        ];

        $idIngrediente = $this->request->getVar('id_ingrediente');
        $idMenu = $this->request->getVar('id_menu');

        $respuesta = null;
        try {
            if ($opcion == '0') {
                $respuesta = $this->ingredientes_menu_modelo->save($datos_ingrediente_menu);
            } else if ($opcion == '1') {
                $this->ingredientes_menu_modelo->where('id_ingrediente', $idIngrediente)->where('id_menu', $idMenu);
                if ($this->ingredientes_menu_modelo->delete()) {
                    $respuesta = "1";
                }
            } else {
                $respuesta = "";
            }
        } catch (\Throwable $th) {
            $respuesta = $this->ingredientes_menu_modelo->error();
        }
        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->ingredientes_menu_modelo->errors());

        echo json_encode($respuesta);
    }
}
