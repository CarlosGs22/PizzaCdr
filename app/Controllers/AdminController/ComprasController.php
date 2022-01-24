<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Funciones;
use App\Models\Admin\Compras_modelo;
use App\Models\Admin\Detalle_compra_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Ingredientes_modelo;
use App\Models\Admin\Inventario_modelo;
use App\Models\Admin\Metodos_Pago_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Proveedores_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Unidades_modelo;
use CodeIgniter\Controller;

class ComprasController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $compras_modelo;
  protected $compras_detalle_modelo;
  protected $status_modelo;
  protected $proveedores_modelo;
  protected $unidades_modelo;
  protected $metodos_pago_modelo;
  protected $ingredientes_modelo;
  protected $inventario_modelo;
  protected $sucursal_modelo;


  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));

    $this->compras_modelo = new Compras_modelo();
    $this->compras_detalle_modelo = new Detalle_compra_modelo();
    $this->status_modelo = new Status_modelo();
    $this->funciones = new Funciones();
    $this->session = session();
    $this->proveedores_modelo = new Proveedores_modelo();
    $this->metodos_pago_modelo = new Metodos_Pago_modelo();
    $this->ingredientes_modelo = new Ingredientes_modelo();
    $this->unidades_modelo = new Unidades_modelo();
    $this->inventario_modelo = new Inventario_modelo();
    $this->sucursal_modelo = new Sucursal_modelo();


    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';

  public function compras()
  {
    $paginas = 10;
    $lista['lista_compras'] = $this->compras_modelo->_obtenerCompras(null,null,$paginas,null);

    $lista['lista_status'] = $this->status_modelo->findAll();

    $lista['lista_sucursales'] = $this->sucursal_modelo->findAll();
    

    if ($this->request->getVar('id')) {
      $lista['lista_edit_compras'] = $this->compras_modelo->_obtenerComprasDetalle($this->request->getVar('id'));
    } else {
      $lista['lista_ingredientes'] = $this->ingredientes_modelo->where("status", 1)->findAll();
    }

    if ($this->request->getVar('txtFechaDe') != null && $this->request->getVar('txtFechaHasta') != null) {
      $lista['lista_compras'] = $this->compras_modelo->_obtenerCompras($this->request->getVar('txtFechaDe'),$this->request->getVar('txtFechaHasta'),$paginas,null);
    } else if ($this->request->getVar('txtFechaDe') == null && $this->request->getVar('txtFechaHasta') == null & $this->request->getVar('txtSucursal') != null) {
      $lista['lista_compras'] = $this->compras_modelo->_obtenerCompras(null,null,$paginas,$this->request->getVar('txtSucursal'));
    } else if ($this->request->getVar('txtFechaDe') != null && $this->request->getVar('txtFechaHasta') != null && $this->request->getVar('txtSucursal') != null) {
      $lista['lista_compras'] = $this->compras_modelo->_obtenerCompras($this->request->getVar('txtFechaDe'),$this->request->getVar('txtFechaHasta'),$paginas, $this->request->getVar('txtSucursal'));
    }

    $lista['lista_validar_txtFechaDeHasta'] = array(
      'txtFechaDe' => $this->request->getVar('txtFechaDe'),
      'txtFechaHasta' => $this->request->getVar('txtFechaHasta'),
      'id_sucursal' => $this->request->getVar('txtSucursal')
    );

  
    $lista["pager"] = $this->compras_modelo->pager->links();

    $lista['lista_proveedores'] = $this->proveedores_modelo->findAll();
    $lista['lista_metodos_pago'] = $this->metodos_pago_modelo->findAll();
    $lista['lista_unidades'] = $this->unidades_modelo->findAll();

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'compras', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_compras_borrar()
  {

    $idCompra = $this->request->getVar("txtId");

    $respuesta = null;
    $res = null;

    $this->inventario_modelo->transBegin();

    $lista['lista_inventario'] = $this->inventario_modelo->findAll();

    $lista['lista_edit_compras'] = $this->compras_modelo->_obtenerComprasDetalle($idCompra);

    foreach ($lista['lista_inventario']  as $valueInve) {

      foreach ($lista['lista_edit_compras']  as $valueCom) {
        if ($valueInve["id_ingrediente_producto"] == $valueCom["idIngrediente"]) {

          if ($valueInve["cantidad"] > 0) {
            $datos_inventario = [
              "cantidad" => ($this->funciones->cleanSanitize("STRING",$valueInve["cantidad"]) - $this->funciones->cleanSanitize("STRING",$valueCom["cantidad"]))
            ];

            $respuestaInvetario_Actualizar = $this->inventario_modelo->update($valueInve["id"], $datos_inventario);

            if ($respuestaInvetario_Actualizar) {
              $res = true;
              $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario_Actualizar, $this->inventario_modelo->errors());
            } else {
              $res = false;
              $respuesta = $this->inventario_modelo->error();
              $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario_Actualizar, $this->inventario_modelo->errors());
              break;
            }
          } else {

            $respuesta = array('0' => "Ocurrió un error al guardar, No existen productos en el inventario", '1' => "error");
            break;
            break;
          }
        }
      }
    }


    $this->compras_modelo->transBegin();

    $this->compras_detalle_modelo->transBegin();

    $this->compras_modelo->where('id', $idCompra);
    $this->compras_detalle_modelo->where('id_compra', $idCompra);
    if ($this->compras_modelo->delete() && $this->compras_detalle_modelo->delete()) {

      $respuesta = array('0' => "Registro guardado exitosamente", '1' => "success");
    } else {

      $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
    }


    if ($res) {
      if ($this->compras_modelo->transStatus() !== FALSE) {
        $this->compras_modelo->transCommit();
      }
      if ($this->compras_detalle_modelo->transStatus() !== FALSE) {
        $this->compras_detalle_modelo->transCommit();
      }

      if ($this->inventario_modelo->transStatus() !== FALSE) {
        $this->inventario_modelo->transCommit();
      }
    } else {
      if ($this->compras_modelo->transStatus() === FALSE) {
        $this->compras_modelo->transRollback();
      }
      if ($this->compras_detalle_modelo->transStatus() === FALSE) {
        $this->compras_detalle_modelo->transRollback();
      }

      if ($this->inventario_modelo->transStatus() === FALSE) {
        $this->inventario_modelo->transRollback();
      }
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/compras"));
  }

  public function accion_compras()
  {
    

    try {

      $lista['lista_ingredientes'] = $this->ingredientes_modelo->where("status", "1")->findAll();

      $total = 0;

      //echo print_r($lista['lista_ingredientes']);
      foreach ($lista['lista_ingredientes'] as $value) {
        if ($value['id'] === $this->request->getVar("txtResProd-" . $value['id'])) {
          $total += ($this->request->getVar("txtResPrec-" . $value['id']) * $this->request->getVar("txtResCant-" . $value['id']));
        }
      }


      $this->compras_modelo->transBegin();

      $this->compras_detalle_modelo->transBegin();

      $this->inventario_modelo->transBegin();

      $edate = strtotime($this->request->getVar('txtFecha'));
      $edate = date("Y-m-d", $edate);

      $datos_compra = [
        'fecha' => $edate,
        'total' =>  $total,
        'id_metodo_pago' =>  $this->request->getVar('txtMetodo'),
        'cve_usuario' =>  "1",
        'id_proveedor' =>  $this->request->getVar('txtProveedor'),
        'id_sucursal' =>  session()->get('id_sucursal')
      ];

      $respuesta = null;
      $res = null;
      $id_compra = 0;
      try {
        $id_compra = $this->compras_modelo->insert($datos_compra);
      } catch (\Throwable $th) {
        $id_compra = 0;
      }


      if ($id_compra != 0) {

        foreach ($lista['lista_ingredientes'] as $value) {

          if ($value['id'] == $this->request->getVar("txtResProd-" . $value['id'])) {
            echo $value['id'];

            $datos_detalle = [
              'cantidad' => $this->funciones->cleanSanitize("STRING", $this->request->getVar("txtResCant-" . $value['id'])),
              'precio' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResPrec-" . $value['id'])),
              'subtotal' => ($this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResPrec-" . $value['id'])) * $this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResCant-" . $value['id']))),
              'id_compra' =>  $this->funciones->cleanSanitize("INT",$id_compra),
              'id_articulo_ingrediente' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResProd-" . $value['id']))
            ];

            try {
              $respuestaDetalle = $this->compras_detalle_modelo->save($datos_detalle);
              if ($respuestaDetalle) {
                $lista['lista_inventario'] = $this->inventario_modelo->where("id_ingrediente_producto", $this->request->getVar("txtResProd-" . $value['id']))->first();

                if (!empty($lista['lista_inventario'])) {

                  $datos_inventario_actualizar = [
                    'cantidad' => ($this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResCant-" . $value['id'])) + $this->funciones->cleanSanitize("STRING",$lista['lista_inventario']["cantidad"])),
                  ];

                  $respuestaInvetario_Actualizar = $this->inventario_modelo->update($lista['lista_inventario']["id"], $datos_inventario_actualizar);
                  if ($respuestaInvetario_Actualizar) {
                    $res = true;
                    $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario_Actualizar, $this->inventario_modelo->errors());
                  } else {
                    $res = false;
                    $respuesta = $this->inventario_modelo->error();
                    $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario_Actualizar, $this->inventario_modelo->errors());
                    break;
                  }
                } else {

                  $datos_inventario = [
                    'cantidad' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar("txtResCant-" . $value['id'])),
                    'id_ingrediente_producto' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar("txtResProd-" . $value['id'])),
                    'id_sucursal' => $this->funciones->cleanSanitize("INT",session()->get('id_sucursal'))
                  ];

                  try {
                    $respuestaInvetario = $this->inventario_modelo->save($datos_inventario);
                    if ($respuestaInvetario) {
                      $res = true;
                      $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario, $this->inventario_modelo->errors());
                    } else {
                      $res = false;
                      $respuesta = $this->inventario_modelo->error();
                      $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario, $this->inventario_modelo->errors());
                      break;
                    }
                  } catch (\Throwable $th) {
                    $res = false;
                    $respuesta = $this->inventario_modelo->error();
                    $respuesta = $this->funciones->_CodigoFunciones($respuestaInvetario, $this->inventario_modelo->errors());
                    break;
                  }
                }
              } else {
                $respuesta = $this->compras_detalle_modelo->error();
                $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->compras_detalle_modelo->errors());
                $res = false;
                break;
              }
            } catch (\Throwable $th) {
              $respuesta = $this->compras_detalle_modelo->error();
              $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->compras_detalle_modelo->errors());

              $res = false;
              break;
            }
          }
        }
      } else {
        $res = false;
        $respuesta = $this->compras_modelo->error();
        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->compras_modelo->errors());
      }

      if ($res) {
        if ($this->compras_modelo->transStatus() !== FALSE) {
          $this->compras_modelo->transCommit();
        }
        if ($this->compras_detalle_modelo->transStatus() !== FALSE) {
          $this->compras_detalle_modelo->transCommit();
        }
        if ($this->inventario_modelo->transStatus() !== FALSE) {
          $this->inventario_modelo->transCommit();
        }
      } else {
        if ($this->compras_modelo->transStatus() === FALSE) {
          $this->compras_modelo->transRollback();
        }
        if ($this->compras_detalle_modelo->transStatus() === FALSE) {
          $this->compras_detalle_modelo->transRollback();
        }
        if ($this->inventario_modelo->transStatus() === FALSE) {
          $this->inventario_modelo->transRollback();
        }
      }
    } catch (\Exception $e) {
      $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/compras"));
  }
}
