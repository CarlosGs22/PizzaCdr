<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Permisos_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Usuarios_modelo;
use App\Models\Publico\Sucursal_Localidad_modelo as PublicoSucursal_Localidad_modelo;
use CodeIgniter\Controller;

class LoginController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $usuarios_modelo;
  protected $sucursales_localidad_modelo;

  protected $permisos_modelo;

  protected $sucursales_modelo;

  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->sucursales_modelo = new Sucursal_modelo();
    $this->especiales = new Especiales_modelo();
    $this->sucursales_localidad_modelo = new PublicoSucursal_Localidad_modelo();


    $this->session = \Config\Services::session();

    $this->usuarios_modelo = new Usuarios_modelo();
    $this->permisos_modelo = new Permisos_modelo();
    $this->funciones = new Funciones();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Publico/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';

  public function login()
  {

    $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();
    $lista["listas_especiales"] = $this->especiales->findAll();

    $idSucursal = session()->get('sucursal_cobertura');

    if ($this->session->get("sucursal_cobertura") != null) {
      $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
    }
    echo view($this->rutaModulo . 'login', $lista);
  }

  public function accion_login()
  {

    $usuario = $this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtUsuario'));
    $contrasenia = $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtContrasenia'));

    $session = session();

    if ($usuario != null & $contrasenia != null) {

      $usuarios_model = new Usuarios_modelo();
      $permiso_model = new Permisos_modelo();

      $validar = $usuarios_model->_validarContrasenia($usuario, $contrasenia);

      $tipo_usuario = $usuarios_model->where("usuario", $usuario)->findAll();

      if ($tipo_usuario[0]["tipo"] == "2") {

        $datos_usuario = [
          'nombre_cliente' =>  $this->funciones->cleanSanitize("STRING", $tipo_usuario[0]["nombres"] . " " .  $tipo_usuario[0]["apellido_paterno"]),
          'usuario_cliente' =>  $this->funciones->cleanSanitize("EMAIL", $tipo_usuario[0]["usuario"]),
          'imagen_cliente' => $tipo_usuario[0]["imagen"],
          'telefono_cliente' => $tipo_usuario[0]["telefono"]
        ];

        $session->set($datos_usuario);

        return redirect()->to(base_url("micuenta"));
      } else {
        if ($validar) {
          $obtener_menu = null;
          foreach ($validar as $key => $value) {
            $obtener_menu = $permiso_model->_obtenerPermisoUsuario($value->id);
            break;
          }
          if ($obtener_menu) {
            $newdata = [];
            $redireccionar = null;
            foreach ($obtener_menu as $key => $value) {
              $obtener_menu = $permiso_model->_obtenerPermisoUsuario($value->id);
              $redireccionar = $value->url_submenu_web;

              $newdata = [
                'id'  => $value->id,
                'nombre'     => $value->nombres,
                'usuario' => $value->usuario,
                'telefono' => $value->telefono,
                'imagen' => $value->imagen,
                'status' => $value->status,
                'id_sucursal' => $value->id_sucursal,
                'nombre_sucursal' => $value->nombre_sucursal

              ];
              break;
            }

            if ($newdata["nombre_sucursal"] != null) {
              $session->set($newdata);
              return redirect()->to(base_url($redireccionar));
            } else {
              $this->session->setFlashdata('respuesta', array("0" => "Usuario incorrecto, no hay sucursal asignada", "1" => "error"));
              return redirect()->to(base_url("login"));
            }
          } else {
            $this->session->setFlashdata('respuesta', array("0" => "No tienes permisos asignados", "1" => "error"));
            return redirect()->to(base_url("login"));
          }
        } else {
          $this->session->setFlashdata('respuesta', array("0" => "Credenciales inválidas", "1" => "error"));
          return redirect()->to(base_url("login"));
        }
      }
    } else {
      $this->session->setFlashdata('respuesta', array("0" => "Credenciales inválidas", "1" => "error"));
      return redirect()->to(base_url("login"));
    }
  }

  public function salir()
  {
    $this->session->destroy();
    return redirect()->to(base_url("login"));
  }
}
