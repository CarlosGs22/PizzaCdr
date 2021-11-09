<?php

namespace App\Controllers\AdminController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Permiso_menu_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Usuarios_modelo;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\Types\Static_;

class UsuariosController extends Controller
{

  protected $helpers = [];
  protected $session;
  protected $datamenu;
  protected $usuarios_modelo;
  protected $status_modelo;
  protected $sucursales_modelo;
  protected $funciones;

  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    parent::initController($request, $response, $logger);

    $this->session = \Config\Services::session();

    $submenu_web = new Permiso_menu_modelo();
    $this->datamenu['listas_submenu_web'] = $submenu_web->_obtenerSubmenu_web(session()->get('id'));

    $this->usuarios_modelo = new Usuarios_modelo();
    $this->status_modelo = new Status_modelo();
    $this->sucursales_modelo = new Sucursal_modelo();

    $this->funciones = new Funciones();
    $this->session = session();

    $especiales = new Especiales_modelo();
    $this->datamenu['listas_especiales'] = $especiales->findAll();
  }

  public $rutaHeader = 'Admin/Marcos/header.php';
  public $rutaModulo = 'Admin/Modulos/';
  public $rutaFooter = 'Admin/Marcos/footer.php';


  public function usuarios()
  {

    $paginas = 10;

    $search = null;
		if ($this->request->getVar('txtBuscar') != null) {
			$search = $this->request->getVar('txtBuscar');
		}
    if ($search == null) {
      $lista['lista_usuarios'] = $this->usuarios_modelo->where("tipo", "1")->paginate($paginas);
		} else {
			$lista['lista_usuarios'] = $this->usuarios_modelo->where("tipo", "1")->
      like("nombres", $search)->orlike("usuario", $search)->paginate($paginas);
		}

   
    $lista['lista_status'] = $this->status_modelo->findAll();

    $lista['lista_sucursales'] = $this->sucursales_modelo->findAll();


    if ($this->request->getVar('id')) {
      $lista['lista_edit_usuarios'] = $this->usuarios_modelo->where("id", $this->request->getVar('id'))->findAll();
    }

    
    $lista["pager"] = $this->usuarios_modelo->pager->links();

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'usuarios', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_usuarios()
  {

    $idUsuario = $this->request->getVar("txtId");

    $idTipoUsuario = null;
    $idEstatus = null;

    if ($this->request->getVar('txTipoUsuario') == '0x4R_q1lkdn*3Bd2qsd!&fc') {
      $idTipoUsuario = "1";
      $idEstatus = "1";
    }/*else if($this->request->getVar('txTipoUsuario') == 'mxjD[Pfms#dg*2dcEgfdZ<'){
      $idTipoUsuario = "2";
      $idEstatus = $this->request->getVar('txtStatus');
    }*/

    $hash = password_hash($this->request->getVar('txtContrasenia'), PASSWORD_DEFAULT);

    $datos_usuario = [
      'nombres' =>  $this->request->getVar('txtNombre'),
      'apellido_paterno' =>  $this->request->getVar('txtApe1'),
      'apellido_materno' =>  $this->request->getVar('txtApe2'),
      'tipo' => $idTipoUsuario,
      'usuario' =>  $this->request->getVar('txtUsuario'),
      'contrasenia' =>  $hash,
      'status' => $this->request->getVar('txtStatus'),
      'cve_usuario' =>  1,
      'id_sucursal' => $this->request->getVar('txtSucursal')
    ];

    if ($idUsuario != null) {
      array_merge($datos_usuario, array("id" => $idUsuario));
    }

    $datos_usuario = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgUsuario'),
      './public/Admin/img/usuarios',
      $datos_usuario,
      "imagen"
    );

    $contras = $this->usuarios_modelo->_validarContraseniaHash($this->request->getVar('txtUsuario'));
    if ($contras == $this->request->getVar('txtContrasenia')) {
      $datos_usuario['contrasenia'] = $contras;
    } else {
      $datos_usuario['contrasenia'] = $hash;
    }

    $respuesta = null;
    try {
      if ($idUsuario != null) {
        $respuesta = $this->usuarios_modelo->update($idUsuario, $datos_usuario);
      } else {
        $respuesta = $this->usuarios_modelo->save($datos_usuario);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->usuarios_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->usuarios_modelo->errors());

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/usuarios"));
  }

  public function accion_usuarios_clientes()
  {

    $idUsuario = $this->request->getVar("txtId");
    $hash = password_hash($this->request->getVar('txtContrasenia'), PASSWORD_DEFAULT);

    $datos_usuario = [
      'nombres' =>  $this->request->getVar('txtNombre'),
      'apellido_paterno' =>  $this->request->getVar('txtApe1'),
      'apellido_materno' =>  $this->request->getVar('txtApe2'),
      'tipo' => "2",
      'usuario' =>  $this->request->getVar('txtUsuario'),
      'contrasenia' =>  $hash,
      'status' => "1",
      'cve_usuario' =>  "1"
    ];

    if ($idUsuario != null) {
      array_merge($datos_usuario, array("id" => $idUsuario));
    }
    $datos_usuario = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgUsuario'),
      './public/Admin/img/usuarios',
      $datos_usuario,
      "imagen"
    );

    $contras = $this->usuarios_modelo->_validarContraseniaHash($this->request->getVar('txtUsuario'));
    if ($contras == $this->request->getVar('txtContrasenia')) {
      $datos_usuario['contrasenia'] = $contras;
    } else {
      $datos_usuario['contrasenia'] = $hash;
    }

    $respuesta = null;
    try {
      if ($idUsuario != null) {
        $respuesta = $this->usuarios_modelo->update($idUsuario, $datos_usuario);
      } else {
        $respuesta = $this->usuarios_modelo->save($datos_usuario);
      }
    } catch (\Throwable $th) {
      $respuesta = $this->usuarios_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->usuarios_modelo->errors());
    $session = session();
    if ($respuesta[1] == 'success' && $idUsuario == null) {
      $newdata = [
        'nombre'     => $this->request->getVar('txtNombre'),
        'usuario' => $this->request->getVar('txtUsuario'),
        'imagen' => ""
      ];
      $session->set($newdata);
      return redirect()->to(base_url("inicio"));
    } else if ($respuesta == "1" && $idUsuario != null) {
      $this->session->setFlashdata('respuesta', $respuesta);
      return redirect()->to(base_url("mi_cuenta"));
    } else {
      $_SESSION['error'] = $respuesta;
      $this->session->setFlashdata('respuesta', $respuesta);
      return redirect()->to(base_url("login"));
    }
  }



  public function micuenta()
  {
    $lista['lista_micuenta'] = $this->usuarios_modelo->where("id", session()->get('id'))->findAll();

    echo view($this->rutaHeader, $this->datamenu);
    echo view($this->rutaModulo . 'micuenta', $lista);
    echo view($this->rutaFooter);
  }

  public function accion_micuenta()
  {

    $hash = password_hash($this->request->getVar('txtContrasenia'), PASSWORD_DEFAULT);

    $datos_usuario = [
      'nombres' =>  $this->request->getVar('txtNombre'),
      'apellido_paterno' =>  $this->request->getVar('txtApe1'),
      'apellido_materno' =>  $this->request->getVar('txtApe2'),
      'usuario' =>  $this->request->getVar('txtUsuario'),
      'contrasenia' =>  $hash,
    ];


    $datos_usuario = $this->funciones->_GuardarImagen(
      $this->request->getFile('imgFoto'),
      './public/Admin/img/usuarios',
      $datos_usuario,
      "imagen"
    );

    $contras = $this->usuarios_modelo->_validarContraseniaHash($this->request->getVar('txtUsuario'));
    if ($contras == $this->request->getVar('txtContrasenia')) {
      $datos_usuario['contrasenia'] = $contras;
    } else {
      $datos_usuario['contrasenia'] = $hash;
    }

    $respuesta = null;
    try {
      $respuesta = $this->usuarios_modelo->update(session()->get('id'), $datos_usuario);
    } catch (\Throwable $th) {
      $respuesta = $this->usuarios_modelo->error();
    }

    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->usuarios_modelo->errors());
    $session = session();
    if ($respuesta[1] == 'success') {
      try {
        $this->session->remove("nombre");
        $this->session->remove("usuario");

        $newdata = [
          'nombre'     => $this->request->getVar('txtNombre'),
          'usuario' => $this->request->getVar('txtUsuario')
        ];

        if ($datos_usuario["imagen"] != null) {
          $newdata['imagen'] = $datos_usuario["imagen"];
        }

        $session->set($newdata);
      } catch (\Throwable $th) {
        $respuesta = array('0' => "Ocurrió un error al guardar", '1' => "error");
      }
    }

    $this->session->setFlashdata('respuesta', $respuesta);
    return redirect()->to(base_url("admin/micuenta"));
  }
}
