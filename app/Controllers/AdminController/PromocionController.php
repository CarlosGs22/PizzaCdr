<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Funciones;
use App\Models\Admin\Categorias_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Promocion_tamanio_modelo;
use App\Models\Admin\Promociones_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Tipo_Tamanio_modelo;
use CodeIgniter\Controller;

class PromocionController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $promociones_modelo;
  protected $tipo_tamanio_modelo;
  protected $promocion_tamanio;
  protected $status_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session($config);

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(1);

    $this->promociones_modelo = new Promociones_modelo();
    $this->status_modelo = new Status_modelo();
    $this->tipo_tamanio_modelo = new Tipo_Tamanio_modelo();
    $this->promocion_tamanio = new Promocion_tamanio_modelo();
    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';



  public function promociones()
  {
    $lista = [
      'lista_promociones' => $this->promociones_modelo->paginate(6),
      'pager' => $this->promociones_modelo->pager
    ];

    $lista['lista_status'] = $this->status_modelo->findAll();

    if ($this->request->getVar('id')) {
      $lista['lista_edit_promociones'] = $this->promociones_modelo->where("id", $this->request->getVar('id'))->findAll();
    }

    if ($this->request->getVar('idPromoTama') && $this->request->getVar('idPromo')) {
      $respuesta = null;
      $this->promocion_tamanio->where('id', $this->request->getVar('idPromoTama'));
      $this->promocion_tamanio->where('id_promocion', $this->request->getVar('idPromo'));
      if ($this->promocion_tamanio->delete()) {
        $respuesta = array('0' => "Registro guardado exitosamente", '1' => "success");
      } else {
        $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
      }
      $this->session->setFlashdata('respuesta', $respuesta);
      return redirect()->to(base_url("admin/promociones?idPromocion=". $this->request->getVar('idPromo')));
    }

    if ($this->request->getVar('idPromocion')) {
      $lista['lista_promo_tama'] = $this->promocion_tamanio->_obtenerPromociones($this->request->getVar('idPromocion'));
      $lista['lista_edit_promociones_tamanio'] = array('idPromocion' => $this->request->getVar('idPromocion'));
    }

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'promociones', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_promociones()
  {

    $idPromocion = $this->request->getVar("txtId");

    $datos_promocion = [
      'nombre' =>  $this->request->getVar('txtNombre'),
      'descripcion' =>  $this->request->getVar('txtDescripcion'),
      'precio' =>  $this->request->getVar('txtPrecio'),
      'status' =>  $this->request->getVar('txtStatus'),
      'cve_usuario' =>  "1"
    ];

    if ($idPromocion != null) {
      array_merge($datos_promocion, array("id" => $idPromocion));
    }

    $datos_promocion = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgPromocion'),
      './public/Admin/img/promociones',
      $datos_promocion,
      "imagen"
    );

    $respuesta = null;
    try {
      if ($idPromocion != null) {
        $respuesta = $this->promociones_modelo->update($idPromocion, $datos_promocion);
      } else {
        $respuesta = $this->promociones_modelo->save($datos_promocion);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->promociones_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->promociones_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/promociones"));
  }

  public function consultaTamanio()
  {
    $lista_tamanio = $this->tipo_tamanio_modelo->_obtenerTipoTamamanio();

    $datos = array(
      'lista_tamanios' => $lista_tamanio
    );

    header('Content-Type: application/json');
    echo json_encode($datos);
  }

  public function accion_productos_promociones()
  {
    $txtCantidad = $this->request->getVar('txtCantidad');
    $txtIdR = $this->request->getVar('txtIdR');

    $resModel = true;

    $this->promocion_tamanio->transBegin();

    for ($i = 0; $i < $txtCantidad; $i++) {

      $data = [
        'id_tipo_tamanio' => $this->request->getVar("txtValor-" . $i),
        'id_promocion' => $txtIdR
      ];

      if (!$this->promocion_tamanio->save($data)) {
        $resModel = false;
      }
    }

    if ($resModel) {
      if ($this->promocion_tamanio->transStatus() !== FALSE) {
        $this->promocion_tamanio->transCommit();
        $respuesta = array('0' => "Registro guardado exitosamente", '1' => "success");
      }
    } else {
      if ($this->promocion_tamanio->transStatus() === FALSE) {
        $this->promocion_tamanio->transRollback();
        $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
      }
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/promociones?idPromocion=".$txtIdR));
  }
}
