<?php

namespace App\Controllers\PublicoController;

use App\Models\Publico\Contacto_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Imagenes_modelo;
use App\Models\Admin\Inventario_modelo;
use App\Models\Admin\Menu_modelo;
use App\Models\Publico\Sucursal_Localidad_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Tamanios_Ingredientes_modelo;
use App\Models\Publico\Productos_modelo;
use CodeIgniter\Controller;

class Carrito extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $funciones;


  protected $sucursales_modelo;
  protected $sucursales_localidad_modelo;
  protected $productos_modelo;
  protected $datamenu;
  protected $especiales;
  protected $contacto_modelo;
  protected $inventario_modelo;
  protected $tamanio_ingredientes_modelo;
  protected $imagen_modelo;
  protected $menu_modelo;
  protected $encrypter;
  protected $encryption;
  protected $cart;




  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {

    $this->funciones = new Funciones();

    $this->sucursales_modelo = new Sucursal_modelo();
    $this->productos_modelo = new Productos_modelo();


    $this->especiales = new Especiales_modelo();
    //$this->datamenu['listas_especiales'] = $especiales->findAll();

    $this->sucursales_localidad_modelo = new Sucursal_Localidad_modelo();
    $this->contacto_modelo = new Contacto_modelo();
    $this->imagen_modelo = new Imagenes_modelo();
    $this->menu_modelo = new Menu_modelo();
    $this->inventario_modelo = new Inventario_modelo();
    $this->tamanio_ingredientes_modelo = new Tamanios_Ingredientes_modelo();


    $this->session = \Config\Services::session();
    $this->cart = \Config\Services::cart();

    $this->encryption = new \Config\Encryption();

    $key = bin2hex(\CodeIgniter\Encryption\Encryption::createKey(32));

    $this->encryption->key = $key;
    $this->encrypter = \Config\Services::encrypter();

    parent::initController($request, $response, $logger);
  }

  public $rutaHeader = 'Publico/Marcos/header.php';
  public $rutaSelect_Sucursal = 'Publico/Marcos/select_sucursal.php';
  public $rutaContact = 'Publico/Marcos/contacto.php';
  public $rutaModulo = 'Publico/Modulos/';
  public $rutaFooter = 'Publico/Marcos/footer.php';

  public function carrito()
  {


    if ($this->cart->totalItems() != 0) {

      $pagina = 12;

      $lista["listas_especiales"] = $this->especiales->findAll();

      $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

      if (session()->get("cp") != null && session()->get("tipo_orden") == "A Domicilio") {
        $lista["lista_cobertura"] =  $this->sucursales_localidad_modelo->_obtenerCobertura($this->funciones->cleanSanitize("INT", session()->get("cp")));
      }


      $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
      $lista["listas_producto_existente"] = [];

      $lista["listas_producto_existente_options"] = [];

      foreach ($this->cart->contents() as $key => $items) {

        $decryptedId = $this->encrypter->decrypt(hex2bin($items["id"]));


        $lista['listas_producto_existente'] = array_merge(
          $lista['listas_producto_existente'],

          array(array(
            "idProducto" => $decryptedId,
            "nombre" => $items["name"],
            "cantidad" => $items["qty"],
            "precio" => $items["price"]
          )),
        );

        if ($items["options"] != null) {

          foreach ($items["options"] as $key => $items2) {

            $id = $items2[$key]["idProd"];
            $decryptedId2 = $this->encrypter->decrypt(hex2bin($id));


            $lista["detalle_producto"] = $this->productos_modelo->_obtenerProductospUBL($decryptedId2);

            $lista['listas_producto_existente_options'] = array_merge(
              $lista['listas_producto_existente_options'],
              array(array(
                "idProducto" => $decryptedId,
                "idOption" => $decryptedId2,
                "nombre" =>  $lista["detalle_producto"][0]["nombre_menu"],
                "cantidad" =>  "NA",
                "precio" =>  "NA"
              )),
            );
          }
        }
      }


      //print("<pre>" . print_r($lista, true) . "</pre>");


      echo view($this->rutaHeader, $lista);
      echo view($this->rutaModulo . 'carrito', $lista);
      echo view($this->rutaContact, $lista);
      echo view($this->rutaFooter, $lista);
    } else {
      $this->session->setFlashdata('respuesta', array("0" => "No hay productos agregados a su carrito de compra", "1" => "success"));
      return redirect()->to(base_url(""));
    }
  }


  public function accion_carrito()
  {
    $res = null;

    if (((int) $this->request->getVar("idClasificacion")) == 1) {

      $idProducto = $this->encrypter->decrypt(hex2bin($this->request->getVar("idProducto")));
      $idProductoEncript = $this->request->getVar("idProducto");
      $cantidad = (int) $this->request->getVar("qty");

      if ($this->inventario_modelo->validarInventario($idProducto, $cantidad, 0) == 1) {
        $res = array("0" => "No hay inventario para este producto (879)", "1" => "error");
        if ($this->request->getVar("txtModulo") == "0403435235") {
          header('Content-Type: application/json');
          echo json_encode($res);
          return;
        } else {
          $this->session->setFlashdata('respuesta', $res);
          return redirect()->to(base_url("detalle/" . $this->request->getVar("idProducto")));
        }
      }
    }else{

      $idProducto = $this->encrypter->decrypt(hex2bin($this->request->getVar("idProducto")));

      $ProductoInfo = $this->productos_modelo->where("id", $idProducto)->findAll();
      $idProductoEncript = $this->request->getVar("idProducto");
      $cantidad = (int) $this->request->getVar("qty");

      for ($i=0; $i < $ProductoInfo[0]["total"] ; $i++) { 

        $encrypted_product = $this->request->getVar("prod_exis" . ($i + 1));
        $idProductoBuscar = $this->encrypter->decrypt(hex2bin($encrypted_product));

        if ($this->inventario_modelo->validarInventario($idProductoBuscar, $cantidad) == 1) {
          $res = array("0" => "No hay inventario para este producto (879)", "1" => "error");
          if ($this->request->getVar("txtModulo") == "0403435235") {
            header('Content-Type: application/json');
            echo json_encode($res);
            return;
          } else {
            $this->session->setFlashdata('respuesta', $res);
            return redirect()->to(base_url("detalle/" . $this->request->getVar("idProducto")));
          }
        }
      }
      
    }


    try {
      $idProducto = $this->encrypter->decrypt(hex2bin($this->request->getVar("idProducto")));

      $idProductoEncript = $this->request->getVar("idProducto");
      $cantidad = $this->request->getVar("qty");

      if ($idProducto != null && ($cantidad != null || $cantidad > 0)) {

        $ProductoInfo = $this->productos_modelo->where("id", $idProducto)->findAll();

        $lista["detalle_producto"] = $this->productos_modelo->_obtenerProductospUBL($idProducto);

        $producto_personalizado = array();


        $idMenuEncrypt = bin2hex($this->encrypter->encrypt($lista["detalle_producto"][0]["idMenu"]));

        if ($ProductoInfo[0]["id_clasificacion"] == "2") {
          if ($ProductoInfo[0]["total"] > 1) {
            for ($i = 0; $i < $ProductoInfo[0]["total"]; $i++) {
              $encrypted_product = $this->request->getVar("prod_exis" . ($i + 1));
              if ($encrypted_product != null) {
                $idProductoBuscar = $this->encrypter->decrypt(hex2bin($encrypted_product));

                $lista["detalle_producto"] = $this->productos_modelo->_obtenerProductospUBL($idProductoBuscar);

                foreach ($lista["detalle_producto"] as $keyD => $valueD) {
                  $idMenuEncrypt = bin2hex($this->encrypter->encrypt($valueD["idMenu"]));

                  $producto_personalizado[] = array(
                    "idProd" => $encrypted_product,
                    "nomProd" => $valueD["nombre_menu"],
                    "idMenu" => $idMenuEncrypt
                  );
                }
              }
            }
          } else {
            $producto_personalizado[] = array(
              "idProd" => $idProductoEncript,
              "nomProd" => $lista["detalle_producto"][0]["nombre_menu"],
              "idMenu" => $idMenuEncrypt
            );
          }
        } else {
          $producto_personalizado[] = array(
            "idProd" => $idProductoEncript,
            "nomProd" => $lista["detalle_producto"][0]["nombre_menu"],
            "idMenu" => $idMenuEncrypt
          );
        }

        $resValidate = 0;

        if (count($producto_personalizado) == $ProductoInfo[0]["total"]) {

          if ($this->cart->totalItems() > 0) {
            foreach ($this->cart->contents() as $value) {
              $idValidateProducto = $this->encrypter->decrypt(hex2bin($idProductoEncript));
              $idValidateProducto2 = $this->encrypter->decrypt(hex2bin($value["id"]));

              if ($idValidateProducto == $idValidateProducto2) {
                $qtyValidate = (int) $cantidad;

                $this->cart->update(array(
                  'rowid' => $value["rowid"],
                  'qty'     => $qtyValidate,
                  'options' => array($producto_personalizado)
                ));

                $resValidate = 1;
                break;
              }
            }
          }

          if ($resValidate == 0) {
            $this->cart->insert(array(
              'id'      => $idProductoEncript,
              'img'      => $lista["detalle_producto"][0]["imagen_producto"],
              'qty'     => $cantidad,
              'price'   => floatval($ProductoInfo[0]["precio"]),
              'name'    =>  $ProductoInfo[0]["nombre"],
              'options' => array($producto_personalizado)
            ));
          }

          $res = array("0" => "Producto agregado exitosamente", "1" => "success");
        } else {
          $res = array("0" => "aOcurri?? un error interno", "1" => "error");
        }
      } else {
        $res = array("0" => "aOcurri?? un error interno", "1" => "error");
      }
    } catch (\Throwable $th) {
      $res = array("0" => "aOcurri?? un error interno", "1" => "error");
    }



    if ($this->request->getVar("txtModulo") == "0403435235") {
      header('Content-Type: application/json');
      echo json_encode($res);
    } else {
      if ($res[1] == "success") {
        $this->session->setFlashdata('respuesta', $res);
        return redirect()->to(base_url("carrito"));
      } else {
        $this->session->setFlashdata('respuesta', $res);
        return redirect()->to(base_url(""));
      }
    }
  }

  public function limpiar_carrito()
  {
    $respuesta = "";
    if ($this->cart->totalItems() != 0) {
      $this->cart->destroy();
      $respuesta = "Carrito vaciado correctamente";
    } else {
      $respuesta = "Ocurri?? un error internamente";
    }

    $this->session->setFlashdata('respuesta', array("0" => $respuesta, "1" => "success"));
    return redirect()->to(base_url(""));
  }

  public function accion_cantidad()
  {
    $respuesta = null;
    $totalPrice = 0;
    $subTotal = 0;
    $resValidate = 0;

    $idProducto = $this->encrypter->decrypt(hex2bin($this->request->getVar("id")));
    $idProductoEncript = $this->request->getVar("id");
    $cantidad = (int) $this->request->getVar("qty");


    if ($this->inventario_modelo->validarInventario($idProducto, $idProductoEncript, $cantidad, 0) == 1) {
      $res = array("0" => "No hay inventario para este producto (879)", "1" => "error");
      header('Content-Type: application/json');
      echo json_encode($res);
      return;
    }



    if ($this->request->getVar("id") != null && $this->request->getVar("qty") != null) {

      foreach ($this->cart->contents() as $value) {
        $idValidateProducto = $this->encrypter->decrypt(hex2bin($this->request->getVar("id")));
        $idValidateProducto2 = $this->encrypter->decrypt(hex2bin($value["id"]));

        if ($idValidateProducto == $idValidateProducto2) {
          $qtyValidate = (int) $this->request->getVar("qty");

          $this->cart->update(array(
            'rowid' => $value["rowid"],
            'qty'     => $qtyValidate,
          ));

          $resValidate = 1;
          break;
        }
      }

      if ($resValidate == 1) {

        foreach ($this->cart->contents() as $value) {
          $totalPrice += doubleval($value["price"]) * (int) $value["qty"];
          $subTotal += doubleval($value["price"]);
        }

        $respuesta = array('0' => 200, '1' => $subTotal, '2' => $totalPrice);
      } else {
        $respuesta = array('0' => "No se pud?? actualizar la cantidad", '1' => "error");
      }
    } else {
      $respuesta = array('0' => "Ocurri?? un error al guardar", '1' => "error");
    }

    header('Content-Type: application/json');
    echo json_encode($respuesta);
  }

  public function eliminarItem($item)
  {

    if (strpos($item, 'list') !== false) {

      $pieces = explode("-", $item);

      foreach ($this->cart->contents() as $value) {
        $idProducto = $this->encrypter->decrypt(hex2bin($value["id"]));

        if ($idProducto == $pieces[1]) {
          $this->cart->remove($value["rowid"]);
          break;
        }
      }

      header('Content-Type: application/json');
      echo json_encode(array('0' => "Registro eliminado exitosamente", '1' => "success"));
    } else {
      $this->cart->remove($item);
      $this->session->setFlashdata('respuesta', array("0" => "Producto eliminado exitosamente", "1" => "success"));
      return redirect()->to(base_url("carrito"));
    }
  }
}
