<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Publico\Status_Venta_modelo;
use App\Models\Publico\Tipo_Orden_modelo;
use App\Models\Publico\Venta_modelo;
use CodeIgniter\Controller;

class VentasController extends Controller
{

    protected $helpers = [];
    protected $session;
    protected $datamenu;
    protected $status_modelo;
    protected $ventas_modelo;
    protected $tipo_orden_modelo;
    protected $status_venta_modelo;
    protected $funciones;
    protected $encrypter;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();

        $submenu_web = new Permiso_menu_modelo();
        $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));


        $this->status_modelo = new Status_modelo();
        $this->ventas_modelo = new Venta_modelo();
        $this->tipo_orden_modelo = new Tipo_Orden_modelo();
        $this->status_venta_modelo = new Status_Venta_modelo();
        $this->funciones = new Funciones();
        $this->session = session();

        $this->encrypter = \Config\Services::encrypter();


        $especiales = new Especiales_modelo();
        $this->datamenu['listas_especiales'] = $especiales->findAll();
    }

    public $rutaHeader = 'Admin/Marcos/header.php';
    public $rutaModulo = 'Admin/Modulos/';
    public $rutaFooter = 'Admin/Marcos/footer.php';



    public function ventas()
    {
        $paginas = 10;
        $lista['lista_ventas'] = $this->ventas_modelo->_obtenerVentas(null, null, $paginas, null, $this->request->getVar('txtStatusVenta'));

        $lista['lista_status'] = $this->status_modelo->findAll();

        $lista['lista_status_venta'] = $this->status_venta_modelo->where("status", "1")->findAll();

        $lista['lista_orden'] = $this->tipo_orden_modelo->findAll();


        if ($this->request->getVar('id')) {
            $lista['lista_edit_venta'] = $this->ventas_modelo->_obtenerMisVentas($this->request->getVar('id'));
        }

        if ($this->request->getVar('txtFechaDe') != null && $this->request->getVar('txtFechaHasta') != null) {
            $lista['lista_ventas'] = $this->ventas_modelo->_obtenerVentas($this->request->getVar('txtFechaDe'), $this->request->getVar('txtFechaHasta'), $paginas, null, $this->request->getVar('txtStatusVenta'));
        } else if ($this->request->getVar('txtFechaDe') == null && $this->request->getVar('txtFechaHasta') == null & $this->request->getVar('txtTipoOrden') != null) {
            $lista['lista_ventas'] = $this->ventas_modelo->_obtenerVentas(null, null, $paginas, $this->request->getVar('txtTipoOrden'), $this->request->getVar('txtStatusVenta'));
        } else if ($this->request->getVar('txtFechaDe') != null && $this->request->getVar('txtFechaHasta') != null && $this->request->getVar('txtTipoOrden') != null) {
            $lista['lista_ventas'] = $this->ventas_modelo->_obtenerVentas($this->request->getVar('txtFechaDe'), $this->request->getVar('txtFechaHasta'), $paginas, $this->request->getVar('txtTipoOrden'), $this->request->getVar('txtStatusVenta'));
        }

        $lista['lista_validar_txtFechaDeHasta'] = array(
            'txtFechaDe' => $this->request->getVar('txtFechaDe'),
            'txtFechaHasta' => $this->request->getVar('txtFechaHasta'),
            'txtTipoOrden' => $this->request->getVar('txtTipoOrden'),
            'txtStatusVenta' => $this->request->getVar('txtStatusVenta')
        );


        $lista["pager"] = $this->ventas_modelo->pager->links();


        echo view($this->rutaHeader, $this->datamenu);
        echo view($this->rutaModulo . 'ventas', $lista);
        echo view($this->rutaFooter);
    }

    public function accion_venta()
    {
        $txtStatusVenta = $this->encrypter->decrypt(hex2bin($this->request->getVar('txtStatus')));
        $txtIdVenta = $this->encrypter->decrypt(hex2bin($this->request->getVar('txtId')));

        $datos_venta = [
            "status_venta" => $txtStatusVenta
        ];

        $respuesta = null;

        try {
            $respuesta = $this->ventas_modelo->update($txtIdVenta, $datos_venta);
        } catch (\Throwable $th) {
            $respuesta = $this->ventas_modelo->error();
        }

        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->ventas_modelo->errors());
        $this->session->setFlashdata('respuesta', $respuesta);
        return redirect()->to(base_url("admin/ventas?id=".$txtIdVenta));
    }
}
