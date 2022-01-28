<?php

namespace App\Controllers\PublicoController;

use App\Models\Publico\Contacto_modelo;
use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Imagenes_modelo;
use App\Models\Admin\Menu_Modelo;
use App\Models\Publico\Sucursal_Localidad_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Publico\Funciones as PublicoFunciones;
use App\Models\Publico\Productos_modelo;
use CodeIgniter\Controller;

class Home extends Controller
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
  protected $imagen_modelo;
  protected $menu_modelo;
  protected $encrypter;
  protected $encryption;
  protected $cart;

  protected $funcionesPublic;




  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {

    $this->funciones = new Funciones();
    $this->funcionesPublic = new PublicoFunciones();

    $this->sucursales_modelo = new Sucursal_modelo();
    $this->productos_modelo = new Productos_modelo();

    $this->especiales = new Especiales_modelo();
    //$this->datamenu['listas_especiales'] = $especiales->findAll();

    $this->sucursales_localidad_modelo = new Sucursal_Localidad_modelo();
    $this->contacto_modelo = new Contacto_modelo();
    $this->imagen_modelo = new Imagenes_modelo();
    $this->menu_modelo = new Menu_Modelo();


    $this->session = \Config\Services::session();

    $this->encryption         = new \Config\Encryption();

    $key = bin2hex(\CodeIgniter\Encryption\Encryption::createKey(32));

    $this->encryption->key = $key;
    $this->encrypter = \Config\Services::encrypter();

    $this->cart = \Config\Services::cart();

    parent::initController($request, $response, $logger);
  }

  public $rutaHeader = 'Publico/Marcos/header.php';
  public $rutaSelect_Sucursal = 'Publico/Marcos/select_sucursal.php';
  public $rutaContact = 'Publico/Marcos/contacto.php';
  public $rutaModulo = 'Publico/Modulos/';
  public $rutaFooter = 'Publico/Marcos/footer.php';

  public $rutaHeaderServicio = 'Publico/Marcos/header_servicio.php';

  public $rutaFooterServicio = 'Publico/Marcos/footer_servicio.php';

  public function principal()
  {


    $pagina = 12;

    $lista["listas_especiales"] = $this->especiales->findAll();

    $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

    $idSucursal = session()->get('sucursal_cobertura') != null ? session()->get('sucursal_cobertura') : "1";

    $lista["lista_productos"] = $this->productos_modelo->_getProductosPublic($idSucursal, $pagina, null, null);

    if ($this->session->get("sucursal_cobertura") != null) {
      $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
    }

    echo view($this->rutaHeader, $lista);
    echo view($this->rutaModulo . 'inicio', $lista);
    echo view($this->rutaContact, $lista);
    echo view($this->rutaFooter, $lista);
  }

  public function buscar_cobertura()
  {

    if ($this->request->getVar('txtReg') == "ZM8ByFx#" || $this->request->getVar('txtReg') == "32U3&#vUd") {
      if ($this->request->getVar('txtCp') != null || $this->request->getVar('txtSucursal') != null) {


        $lista["lista_cobertura"] = $this->request->getVar('txtCp') != null
          ? $this->sucursales_localidad_modelo->_obtenerCobertura($this->funciones->cleanSanitize("INT", $this->request->getVar('txtCp')))
          : $this->sucursales_modelo->select("id as id_sucursal,nombre as nombre_sucursal")->where("status", "1")->where("id", $this->funciones->cleanSanitize("INT", $this->encrypter->decrypt(hex2bin($this->request->getVar('txtSucursal')))))->findAll();


        if ($lista["lista_cobertura"][0]["id_sucursal"] != null) {
          $tiempoActual = date('H:i');
          $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($lista["lista_cobertura"][0]["id_sucursal"]);

          if (!empty($lista["lista_sucursal_info"])) {
            foreach ($lista["lista_sucursal_info"] as $key => $value) {
              if ($value["dia"] == date('l')) {
                $tiempoInicial = $value["horade"] . ":" . $value["horademns"];
                $tiempoFinal = $value["horahasta"] . ":" . $value["horahastamns"];
                $restiempo = $this->funcionesPublic->_obtenerHorarioDisponible($tiempoActual, $tiempoInicial, $tiempoFinal);

                if ($restiempo != "1") {
                  session()->setFlashdata('respuesta', array("0" => "Por el momento no hay servicio en esta sucursal, revise los horarios y cambie el tipo de orden", "1" => "error"));
                  return redirect()->to(base_url(""));
                }
              }
            }

            $cobertura = [
              'sucursal_cobertura' => $lista["lista_cobertura"][0]["id_sucursal"],
              'nombre_cobertura' => $lista["lista_cobertura"][0]["nombre_sucursal"],
              'tipo_orden' => $this->request->getVar('txtReg') == "ZM8ByFx#" ? "En sucursal" : "A Domicilio",
              'cp' => $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtCp')),
            ];

            if ($this->session->get("sucursal_cobertura") != null &&  $this->session->get("nombre_cobertura")) {
              $this->session->remove("sucursal_cobertura");
              $this->session->remove("nombre_cobertura");
            }

            $this->cart->destroy();

            $session = session();
            $session->set($cobertura);

            $respuesta = array('0' => "Si hay cobertura para esta zona", '1' => "success");
          } else {
            session()->setFlashdata('respuesta', array("0" => "Por el momento no hay servicio en esta sucursal,revise los horarios y cambie el tipo de orden", "1" => "error"));
            return redirect()->to(base_url(""));
          }
        } else {
          $respuesta = array('0' => "No hay cobertura para esta zona", '1' => "error");
        }
      } else {
        $respuesta = array('0' => "No hay cobertura para esta zona", '1' => "error");
      }
    } else {
      $respuesta = array('0' => "No hay cobertura para esta zona", '1' => "error");
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url(""));
  }

  public function contacto()
  {

    $datos_contacto = [
      'nombre' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNombre')),
      'telefono' => $this->funciones->cleanSanitize("INT", $this->request->getVar('txtTelefono')),
      'correo' => $this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtCorreo')),
      'mensaje' => $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtMensaje')),
      'usuario' =>  $this->session->get("id") != null ? $this->session->get("id") :  "0"
    ];

    $respuesta = null;
    try {
      $respuesta = $this->contacto_modelo->save($datos_contacto);
    } catch (\Throwable $th) {
      $respuesta = $this->contacto_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->contacto_modelo->errors());

    if ($respuesta[1] === 'success' && $this->request->getVar('txtCorreo') != null) {
      $this->funciones->_sendMail($this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtCorreo')), "Mensaje de contacto", $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtMensaje')), "Emporio Pizza");
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url(""));
  }

  public function detalle($id)
  {

    try {
      $decrypted_data = $this->encrypter->decrypt(hex2bin($id));
      $lista["detalle_producto"] = $this->productos_modelo->_obtenerProductospUBL($decrypted_data);

      if (!empty($lista["detalle_producto"])) {

        $idSucursal = session()->get('sucursal_cobertura');

        $lista["listas_especiales"] = $this->especiales->findAll();
        $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();
        $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));

        $lista["listas_producto_existente"] = $this->productos_modelo->_getProductosPublic($idSucursal, "50", null, $lista["detalle_producto"][0]["idTipoTamanio"]);
        $lista["lista_imagenes"] = $this->imagen_modelo->where("id_producto", $decrypted_data)->findAll();

        if (!empty($lista["detalle_producto"])) {
          $lista['lista_menu_ingrediente'] = $this->menu_modelo->_obtenerIngredienteMenu($lista["detalle_producto"][0]["idMenu"]);
        }

        echo view($this->rutaHeader, $lista);
        echo view($this->rutaModulo . 'detalle', $lista);
        echo view($this->rutaFooter, $lista);
      } else {
        $this->session->setFlashdata('respuesta', array("0" => "No se encontró el producto", "1" => "error"));
        return redirect()->to(base_url(""));
      }
    } catch (\Throwable $th) {
      $this->session->setFlashdata('respuesta', array("0" => "No se encontró el producto", "1" => "error"));
      return redirect()->to(base_url(""));
    }
  }
  public function menu($name)
  {

    if ($name == "promociones"  || $name == "individuales") {

      $clasificacion = ($name == "promociones" ? "2" : "1");
      $lista['lista_name_titulo'] = array('nombre' => $name == "promociones" ? "Nuestras Promociones" : "Nuestro Menú");

      $pagina = 10;

      $lista["listas_especiales"] = $this->especiales->findAll();

      $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

      $idSucursal = session()->get('sucursal_cobertura');

      $lista["lista_productos"] = $this->productos_modelo->_getProductosPublic($idSucursal, $pagina, $clasificacion, null);

      $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));

      $lista["pagina"] = $this->productos_modelo->pager->links();

      echo view($this->rutaHeader, $lista);
      echo view($this->rutaModulo . 'menu', $lista);
      echo view($this->rutaContact, $lista);
      echo view($this->rutaFooter, $lista);
    }
  }

  public function nosotros()
  {

    $pagina = 12;

    $lista["listas_especiales"] = $this->especiales->findAll();

    $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

    $idSucursal = session()->get('sucursal_cobertura');

    $lista["lista_productos"] = $this->productos_modelo->_getProductosPublic($idSucursal, $pagina, null, null);

    if ($this->session->get("sucursal_cobertura") != null) {
      $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
    }


    echo view($this->rutaHeader, $lista);
    echo view($this->rutaModulo . 'nosotros', $lista);
    echo view($this->rutaContact, $lista);
    echo view($this->rutaFooter, $lista);
  }

  public function servicio()
  {
    $pagina = 12;

    $lista["listas_especiales"] = $this->especiales->findAll();

    $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

    $idSucursal = session()->get('sucursal_cobertura');

    $lista["lista_productos"] = $this->productos_modelo->_getProductosPublic($idSucursal, $pagina, null, null);

    $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));

    echo view($this->rutaHeaderServicio, $lista);
    echo view($this->rutaModulo . 'servicio', $lista);

    echo view($this->rutaFooterServicio, $lista);
  }
}
