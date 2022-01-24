<?php

namespace App\Filters;

use App\Models\Admin\Permiso_menu_modelo;

use CodeIgniter\Filters\FilterInterface;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\HTTP\ResponseInterface;



class Auth implements FilterInterface

{

  protected $helpers = [];

  public function before(RequestInterface $request, $arguments = null)

  {

    $submenu_model = new Permiso_menu_modelo();

    $listas_submenu["listas_submenu"] = $submenu_model->_obtenerSubmenu_web(session()->get('id'));

    $val = false;

    if (session()->get('id')) {
      if($listas_submenu){
        foreach ($listas_submenu as $key => $value){
          foreach ($value as $key3 => $value2){
            $res = $value2["url_submenu_web"];
            $ruts = explode("/",uri_string());

            $rutaUri = null;
            if($ruts[1] != null){
              $rutaUri = $ruts[0]."/".$ruts[1];
            }else{
              $rutaUri = $ruts[0];
            }
            if($rutaUri === $res){
              $val = true;
              return;
            }
          }
        }

        if(!$val){
          return redirect()->to(site_url('login'));
        }
      }else{
        $_SESSION['error'] = 'No tiene permisos asignados';
        session()->markAsFlashdata('error');
        return redirect()->to(base_url("login"));
      }
    }else{
      return redirect()->to(site_url('login'));
    }
  }



  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)

  {

    // Do something here

  }

}
