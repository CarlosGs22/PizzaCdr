<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Permisos_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Usuarios_modelo;
use CodeIgniter\Controller;

class LoginController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $usuarios_modelo;

  protected $permisos_modelo;

  protected $sucursales_modelo;


  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->sucursales_modelo = new Sucursal_modelo();
    $this->especiales = new Especiales_modelo();

    $this->session = \Config\Services::session();

    $this->usuarios_modelo = new Usuarios_modelo();
    $this->permisos_modelo = new Permisos_modelo();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Publico/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';

  public function login()
  {

    $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();
    $lista["listas_especiales"] = $this->especiales->findAll();

    $idSucursal = session()->get('sucursal_cobertura');

    $lista["lista_sucursal_info"] = $this->sucursales_modelo->select("municipio.nombre as nombre_municipio,estado.nombre as nombre_estado,sucursal.*")
      ->join("localidad", "localidad.id =  sucursal.id_localidad", "left")
      ->join("municipio", "municipio.id = localidad.municipio_id", "left")
      ->join("estado", "estado.id = municipio.estado_id")->where("sucursal.id", $idSucursal)->findAll();

    echo view($this->rutaModulo . 'login', $lista);
  }

  public function accion_login()
  {


    $usuario = $this->request->getVar('txtUsuario');
    $contrasenia = $this->request->getVar('txtContrasenia');

    $session = session();

    if ($usuario != null & $contrasenia != null) {


      $usuarios_model = new Usuarios_Modelo();
      $permiso_model = new Permisos_modelo();

      $validar = $usuarios_model->_validarContrasenia($usuario, $contrasenia);

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
              'imagen' => $value->imagen,
              'status' => $value->status,
              'id_sucursal' => $value->id_sucursal,
              'nombre_sucursal' => $value->nombre_sucursal

            ];
            break;
          }
          $session->set($newdata);

          return redirect()->to(base_url($redireccionar));
        } else {
          $_SESSION['error'] = 'No tienes permisos asignados';
          $session->markAsFlashdata('error');
          return redirect()->to(base_url("login"));
        }
      } else {
        $_SESSION['error'] = 'Credenciales inválidas';
        $session->markAsFlashdata('error');
        return redirect()->to(base_url("login"));
      }
    } else {
      $_SESSION['error'] = 'Credenciales inválidas';
      $session->markAsFlashdata('error');
      return redirect()->to(base_url("login"));
    }
  }

  public function salir()
  {
    $this->session->destroy();
    return redirect()->to(base_url("login"));
  }
}
