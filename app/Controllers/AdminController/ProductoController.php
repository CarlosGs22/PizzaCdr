<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Categorias_modelo;
use App\Models\Admin\Clasificacion_Modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Imagenes_modelo;
use App\Models\Admin\Ingredientes_modelo;
use App\Models\Admin\Ingredientes_Productos_modelo;
use App\Models\Admin\Masas_modelo;
use App\Models\Admin\Menu_modelo;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Productos_modelo;
use App\Models\Admin\Tamanios_Ingredientes_modelo;
use App\Models\Admin\Tipo_Tamanio_modelo;
use CodeIgniter\Controller;

class ProductoController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $productos_modelo;
  protected $ingredientes_modelo;
  protected $status_modelo;
  protected $categorias_modelo;
  protected $masas_modelo;
  protected $ingredientes_tamanios_modelo;
  protected $ingredientes_productos_modelo;
  protected $tamanios_ingredientes_modelo;
  protected $menu_modelo;
  protected $clasificacion_modelo;
  protected $tipo_tamanio_modelo;
  protected $funciones;
  protected $pager;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));
    
    $this->productos_modelo = new Productos_modelo();
    $this->ingredientes_modelo = new Ingredientes_modelo();
    $this->tipo_tamanio_modelo = new Tipo_Tamanio_modelo();
    $this->status_modelo = new Status_modelo();
    $this->categorias_modelo = new Categorias_modelo();
    $this->masas_modelo = new Masas_modelo();
    $this->ingredientes_tamanios_modelo = new Tamanios_Ingredientes_modelo();
    $this->ingredientes_productos_modelo = new Ingredientes_Productos_modelo();
    $this->tamanios_ingredientes_modelo = new Tamanios_Ingredientes_modelo();
    $this->imagenes_modelo = new Imagenes_modelo();
    $this->menu_modelo = new Menu_Modelo();
    $this->clasificacion_modelo = new Clasificacion_Modelo();
    $this->funciones = new Funciones();
    $this->tipo_tamanio_modelo = new Tipo_Tamanio_modelo();
    $this->session = session();

    $this->pager = \Config\Services::pager();
    

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


  public function productos()
  {

    $search = null;
		if ($this->request->getVar('txtBuscar') != null) {
			$search = $this->request->getVar('txtBuscar');
		}
    if ($search == null) {
			$lista['lista_productos'] = $this->productos_modelo->getProductos(null,session()->get('id_sucursal'));
		} else {
			$lista['lista_productos'] = $this->productos_modelo->getProductos($search,session()->get('id_sucursal'));
		}

    $lista['lista_status'] = $this->status_modelo->findAll();
    $lista['lista_categorias'] = $this->categorias_modelo->findAll();
    $lista['lista_masas'] = $this->masas_modelo->findAll();
    //$lista['lista_ingredientes'] = $this->ingredientes_modelo->findAll();
    $lista['lista_menu'] = $this->menu_modelo->findAll();
    $lista['lista_clasificacion'] = $this->clasificacion_modelo->findAll();

    $lista['lista_tipo_tamanio'] = $this->tipo_tamanio_modelo->_obtenerTipoTamamanio();

    if ($this->request->getVar('id')) {
      $lista['lista_edit_productos'] = $this->productos_modelo->_obtenerProductos($this->request->getVar('id'));
      //$lista['lista_edit_ingredientes'] = $this->ingredientes_productos_modelo->where('id_producto', $this->request->getVar('id'))->findAll();
      //$lista["listas_tamanio_ingredientes"] = $this->tamanios_ingredientes_modelo->_obtener_ingredientes($lista['lista_edit_productos'][0]['idTipoTamanio']);
    }

    if ($this->request->getVar('idImagenProducto')) {
      $lista['lista_edit_imagenes'] = $this->imagenes_modelo->where('id_producto', $this->request->getVar('idImagenProducto'))->findAll();
      $lista['lista_validar_imagen'] = array('idImagenProducto' => $this->request->getVar('idImagenProducto'));
    }

    $lista["pager"] = $this->productos_modelo->pager->links();


    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'productos', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_productos()
  {

    $idProducto = $this->request->getVar("txtId");

    $idPrecioTotal = $this->tipo_tamanio_modelo->where("id",$this->request->getVar('txtTamanio'))->findAll();
  
    $datos_producto = [
      'nombre' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtNombre')),
      'descripcion' =>  $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtDescripcion')),
      'precio' =>  $this->request->getVar('txtPrecio') == 0 ? $idPrecioTotal[0]["precio"] : $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtPrecio')),
      'total' =>  $this->request->getVar('txtClasificacion') == 1 ? "1" : $this->funciones->cleanSanitize("STRING",$this->request->getVar('txtTotal')),
      'status' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtStatus')),
      'id_masa' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtMasa')),
      'id_categoria' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtCategoria')),
      'id_menu' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtMenu')),
      'id_clasificacion' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtClasificacion')),
      'id_tamanio' => $this->funciones->cleanSanitize("INT",$this->request->getVar('txtTamanio')),
      'id_sucursal' => $this->funciones->cleanSanitize("INT",session()->get('id_sucursal')),
      'cve_usuario' =>  $this->funciones->cleanSanitize("INT",session()->get('id'))
    ];

    if ($idProducto != null) {
      array_merge($datos_producto, array("id" => $idProducto));
    }

    $respuesta = null;
    try {
      if ($idProducto != null) {
        $respuesta = $this->productos_modelo->update($idProducto, $datos_producto);
      } else {
        $respuesta = $this->productos_modelo->save($datos_producto);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->productos_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->productos_modelo->errors());

    /*if ($respuesta[1] === 'success') {
      $res = true;
      $ultimoID = $this->productos_modelo->insertID();
      $this->ingredientes_productos_modelo->transBegin();

      $lista['lista_ingredientes'] = $this->ingredientes_modelo->findAll();
      foreach ($lista['lista_ingredientes'] as $key => $value) {

        if ($value['id'] === $this->request->getVar($value['ingrediente'])) {

          if ($this->request->getVar($value['ingrediente'] . "-1") <= $value['cantidad']) {

            $datos_ingredientes = [
              'id_ingrediente' => $value['id'],
              'id_producto' => $ultimoID
            ];

            $datos_ingredientes_cantidad = [
              'cantidad' => ($value['cantidad'] - $this->request->getVar($value['ingrediente'] . "-1"))
            ];

            if (!$this->ingredientes_modelo->update($value['id'], $datos_ingredientes_cantidad)) {
              $res = false;
            }

            if (!$this->ingredientes_productos_modelo->save($datos_ingredientes)) {
              $res = false;
            }
          } else {
            $res = false;
            $respuesta = array('0' => 'La cantidad del ingrediente ' . $value['ingrediente'] . " excede la cantidad del inventario", '1' => "error");
            break;
          }
        }
      }*/

    /*if ($res) {
        if ($this->ingredientes_modelo->transStatus() !== FALSE) {
          $this->ingredientes_modelo->transCommit();
        }
        if ($this->ingredientes_productos_modelo->transStatus() !== FALSE) {
          $this->ingredientes_productos_modelo->transCommit();
        }
      } else {
        if ($this->ingredientes_modelo->transStatus() === FALSE) {
          $this->ingredientes_modelo->transRollback();
        }
        if ($this->ingredientes_productos_modelo->transStatus() === FALSE) {
          $this->ingredientes_productos_modelo->transRollback();
        }
      }
    } else {
      $respuesta = $respuesta;
    }*/

    $this->session->setFlashdata('respuesta', $respuesta);

    if ($idProducto != null) {
      return redirect()->to(base_url("admin/productos?id=" . $idProducto));
    } else {
      return redirect()->to(base_url("admin/productos"));
    }
  }

 

  public function accion_productos_editar()
  {

    $idProducto = $this->request->getVar("txtId");

    $datos_producto = [
      'nombre' =>  $this->request->getVar('txtNombre'),
      'descripcion' =>  $this->request->getVar('txtDescripcion'),
      'precio' =>  $this->request->getVar('txtPrecio'),
      'status' =>  $this->request->getVar('txtStatus'),
      'id_masa' =>  $this->request->getVar('txtMasa'),
      'id_categoria' =>  $this->request->getVar('txtCategoria'),
      'id_menu' =>  $this->request->getVar('txtMenu'),
      'id_clasificacion' =>  $this->request->getVar('txtClasificacion'),
      'cve_usuario' =>  "1"
    ];

    if ($idProducto != null) {
      array_merge($datos_producto, array("id" => $idProducto));
    }

    $this->productos_modelo->transBegin();
    $respuesta = null;
    try {
      if ($idProducto != null) {
        $respuesta = $this->productos_modelo->update($idProducto, $datos_producto);
      } else {
        $respuesta = $this->productos_modelo->save($datos_producto);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->productos_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->productos_modelo->errors());

    /*if ($respuesta[1] === 'success') {
      $res = true;
      $ultimoID = $idProducto;
      $this->ingredientes_productos_modelo->transBegin();

      $lista['lista_ingredientes'] = $this->ingredientes_modelo->findAll();

      $vuelta = 1;
      $listaIngredientesSeleccionados = array();

      foreach ($lista['lista_ingredientes'] as $key => $value) {
        if ($value['id'] == $this->request->getVar($value['ingrediente'])) {
          array_push($listaIngredientesSeleccionados, $this->request->getVar($value['ingrediente']));
          if ($this->request->getVar($value['ingrediente'] . "-1") <= $value['cantidad']) {

            if ($vuelta == 1) {
              $this->ingredientes_productos_modelo->where('id_producto', $ultimoID)->delete();
              $vuelta = 0;
            }

            $datos_ingredientes = [
              'id_ingrediente' => $value['id'],
              'id_producto' => $ultimoID
            ];

            $datos_ingredientes_cantidad = [
              'cantidad' => ($value['cantidad'] - $this->request->getVar($value['ingrediente'] . "-1"))
            ];

            if (!$this->ingredientes_modelo->update($value['id'], $datos_ingredientes_cantidad)) {
              $res = false;
              $respuesta = array('0' => 'Error al actualizar cantidad ingredientes', '1' => "error");
            }

            if (!$this->ingredientes_productos_modelo->save($datos_ingredientes)) {
              $respuesta = array('0' => 'Error al guardar ingredientes', '1' => "error");
              $res = false;
            }
          } else {
            $res = false;
            $respuesta = array('0' => 'La cantidad del ingrediente ' . $value['ingrediente'] . " excede la cantidad del inventario", '1' => "error");
          }
        }
      }

      if (empty($listaIngredientesSeleccionados)) {
        $this->ingredientes_productos_modelo->where('id_producto', $ultimoID)->delete();
      }


      if ($res) {
        if ($this->ingredientes_modelo->transStatus() !== FALSE) {
          $this->ingredientes_modelo->transCommit();
        }
        if ($this->ingredientes_productos_modelo->transStatus() !== FALSE) {
          $this->ingredientes_productos_modelo->transCommit();
        }
      } else {
        if ($this->ingredientes_modelo->transStatus() === FALSE) {
          $this->ingredientes_modelo->transRollback();
        }
        if ($this->ingredientes_productos_modelo->transStatus() === FALSE) {
          $this->ingredientes_productos_modelo->transRollback();
        }
      }
    } else {
      $respuesta = $respuesta;
    }*/

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/productos?id=" . $idProducto));
  }


  public function accion_imagenes()
  {

    $idImagen = $this->request->getVar("txtIdImagen");

    $datos_imagen = [
      'id_producto' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtIdProducto')),
      'status' =>  $this->funciones->cleanSanitize("INT",$this->request->getVar('txtStatus')),
      'cve_usuario' =>  $this->session->get("id")
    ];

    if ($idImagen != null) {
      array_merge($datos_imagen, array("id" => $idImagen));
    }

    $datos_imagen = $this->funciones->_GuardarImagen(
      $this->request->getFile('fileImagen'),
      './public/Admin/img/productos',
      $datos_imagen,
      "imagen"
    );

    $respuesta = null;
    try {
      if ($idImagen != null) {
        $respuesta = $this->imagenes_modelo->update($idImagen, $datos_imagen);
      } else {
        $respuesta = $this->imagenes_modelo->save($datos_imagen);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->imagenes_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->imagenes_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/productos?idImagenProducto=" . $this->request->getVar('txtIdProducto')));
  }
}

 /*$this->ingredientes_tamanios_modelo->join('ingrediente', 'ingrediente.id = tamanio_ingrediente.id_ingrediente');
      $this->ingredientes_tamanios_modelo->join('tipo_tamanio', 'tipo_tamanio.id = tamanio_ingrediente.id_tipo_tamanio');
      $this->ingredientes_tamanios_modelo->join('tipo', 'tipo.id = tipo_tamanio.id_tipo');

      $this->ingredientes_tamanios_modelo->select(
        'tamanio_ingrediente.id as ingre_tama_id,
        tamanio_ingrediente.porcion as porcion,
        ingrediente.id as id_ingrediente,ingrediente.ingrediente as ingrediente,tipo.tipo as tipo'
      );*/
