<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Funciones;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Ingredientes_Menu_modelo;
use App\Models\Admin\Ingredientes_modelo;
use App\Models\Admin\Menu_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Tamanios_Ingredientes_modelo;
use App\Models\Admin\Tipo_Tamanio_modelo;
use App\Models\Admin\Unidades_modelo;
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
    protected $tipo_tamanio_modelo;
    protected $ingredientes_tamanios_modelo;
    protected $tamanios_ingredientes_modelo;
    protected $unidad_modelo;
    protected $funciones;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();

        $submenu_web = new Permiso_menu_modelo();
        $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));

        $this->ingredientes_modelo = new Ingredientes_modelo();
        $this->status_modelo = new Status_modelo();
        $this->menu_modelo = new Menu_modelo();
        $this->ingredientes_menu_modelo = new Ingredientes_Menu_modelo();
        $this->tamanios_ingredientes_modelo = new Tamanios_Ingredientes_modelo();
        $this->unidad_modelo = new Unidades_modelo();


        $this->ingredientes_tamanios_modelo = new Tamanios_Ingredientes_modelo();

        $this->tipo_tamanio_modelo = new Tipo_Tamanio_modelo();
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

        $paginas = 200;

        $search = null;
        if ($this->request->getVar('txtBuscar') != null) {
            $search = $this->request->getVar('txtBuscar');
        }
        if ($search == null) {
            $lista['lista_ingredientes'] = $this->ingredientes_modelo->select("ingrediente.id as id, ingrediente, ingrediente.status as statusIngrediente, unidad.id as idUnidad, unidad.nombre, unidad.status as statusUnidad")
            ->join("unidad","unidad.id = ingrediente.id_unidad")
            ->orderBy('ingrediente', 'ASC')->paginate($paginas);
        } else {
            $lista['lista_ingredientes'] = $this->ingredientes_modelo->select("ingrediente.id as id, ingrediente, ingrediente.status as statusIngrediente, unidad.id as idUnidad, unidad.nombre, unidad.status as statusUnidad")
            ->join("unidad","unidad.id = ingrediente.id_unidad")
            ->paginate($paginas)
            ->like("ingrediente", $search)->orderBy('ingrediente', 'ASC')->paginate($paginas);
        }

        $lista['lista_tipo_tamanio'] = $this->tipo_tamanio_modelo->_obtenerTipoTamamanio();

        $lista['lista_unidad'] = $this->unidad_modelo->where("status","1")->findAll();

        $searchM = null;
        if ($this->request->getVar('txtBuscarMenu') != null) {
            $searchM = $this->request->getVar('txtBuscarMenu');
        }
        if ($searchM == null) {
            $lista['lista_menu'] = $this->menu_modelo->orderBy('nombre', 'ASC')->paginate($paginas);
        } else {
            $lista['lista_menu'] = $this->menu_modelo->like("nombre", $searchM)->orderBy('nombre', 'ASC')->paginate($paginas);
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
            'ingrediente' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtIngrediente')),
            'id_unidad' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtUnidad')),
            'status' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtStatus')),
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
            'nombre' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNombre')),
            'status' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtStatus')),
            'cve_usuario' =>  $this->session->get("id")
        ];

        if ($idMenu != null) {
            array_merge($datos_menu, array("id" => $this->funciones->cleanSanitize("INT", $idMenu)));
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
            'id_ingrediente' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('id_ingrediente')),
            'id_menu' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('id_menu')),
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

    public function consulta_porciones()
    {

        $this->ingredientes_tamanios_modelo->join('ingrediente', 'ingrediente.id = tamanio_ingrediente.id_ingrediente');
        //$this->ingredientes_tamanios_modelo->join('tipo_tamanio', 'tipo_tamanio.id = tamanio_ingrediente.id_tipo_tamanio');
        $this->ingredientes_tamanios_modelo->join('tipo', 'tipo.id = tipo_tamanio.id_tipo');

        $this->ingredientes_tamanios_modelo->select(
            'tamanio_ingrediente.id as ingre_tama_id,
        tamanio_ingrediente.porcion as porcion,
        ingrediente.id as id_ingrediente,ingrediente.ingrediente as ingrediente,tipo.tipo as tipo'
        );

        //$this->ingredientes_tamanios_modelo->where("tipo_tamanio.id", $this->request->getVar("txtTipoTamanio"));
        $datos_ingrediendes_gen = $this->ingredientes_modelo->select("ingrediente.id , ingrediente, unidad.nombre")->join("unidad", "unidad.id = ingrediente.id_unidad")
            ->findAll();

        $datos_tamanio_ingrediende = $this->tamanios_ingredientes_modelo->_obtener_ingredientes($this->request->getVar('txtTipoTamanio'));

        $datos = array(
            'ingredientes_gen' => $datos_ingrediendes_gen,
            'ingredientes_tamanio' => $datos_tamanio_ingrediende
        );

        header('Content-Type: application/json');
        echo json_encode($datos);
    }


    public function accion_tamanio_ingrediente()
    {
        $porcion = $this->funciones->cleanSanitize("STRING", $this->request->getVar('porcion'));
        $id_ingrediente = $this->funciones->cleanSanitize("INT", $this->request->getVar('id_ingrediente'));
        $id_tipo_tamanio = $this->funciones->cleanSanitize("INT", $this->request->getVar('id_tipo_tamanio'));


        $lista_validar = $this->tamanios_ingredientes_modelo
        ->where("id_ingrediente",$id_ingrediente)
        ->where("id_tipo_tamanio",$id_tipo_tamanio)
        ->findAll();

          
        $datos_ingrediente_tamanio = [
            'id_ingrediente' => $id_ingrediente,
            'id_tipo_tamanio' => $id_tipo_tamanio,
            'porcion' =>  $porcion,
            'cve_usuario' =>  $this->session->get("id")
        ];

        if(empty($lista_validar)){
            $respuesta = $this->tamanios_ingredientes_modelo->save($datos_ingrediente_tamanio);
        }else{
            $respuesta = $this->tamanios_ingredientes_modelo->update($lista_validar[0]["id"],$datos_ingrediente_tamanio);
        }

        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->tamanios_ingredientes_modelo->errors());

        header('Content-Type: application/json');
        echo json_encode($respuesta);
    }
}
