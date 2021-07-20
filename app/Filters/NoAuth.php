<?php

namespace App\Filters;

use App\Models\Admin\Sub_Menu_Model;

use CodeIgniter\Filters\FilterInterface;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\HTTP\ResponseInterface;



class Noauth implements FilterInterface

{

  public function before(RequestInterface $request, $arguments = null)

  {



    $submenu_model = new Sub_Menu_Model();

    $listas_submenu["listas_submenu"] = $submenu_model->_obtenerSubmenu_web(session()->get('id'));

   $res = null;

    if (session()->get('id') != null) {

      if($listas_submenu){

        foreach ($listas_submenu as $key => $value){

          foreach ($value as $key3 => $value2){
            $res = $value2["url_submenu_web"];
            break;
          }

        }
        return redirect()->to(base_url($res));
      }else{

        $_SESSION['error'] = 'No tiene permisos asignados';

        $session->markAsFlashdata('error');

        return redirect()->to(base_url("login"));

      }

    }else{

       redirect()->to(site_url('login'));

    }



  }



  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)

  {

    // Do something here

  }

}

