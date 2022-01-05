<?php

namespace App\Filters;

use App\Models\Admin\Sucursal_modelo;
use CodeIgniter\Filters\FilterInterface;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\HTTP\ResponseInterface;



class SessionSucursal implements FilterInterface

{

  protected $helpers = [];

  public function before(RequestInterface $request, $arguments = null)
   
  {
     if(session()->get('sucursal_cobertura') == null){

      $sucursales_modelo = new Sucursal_modelo();
         
      $lista["lista_cobertura"] = $sucursales_modelo->select("id as id_sucursal,nombre as nombre_sucursal")->where("status", "1")->where("id","1")->findAll();

      $cobertura = [
        'sucursal_cobertura' => $lista["lista_cobertura"][0]["id_sucursal"],
        'nombre_cobertura' => $lista["lista_cobertura"][0]["nombre_sucursal"],
        'tipo_orden' =>  "En sucursal"
      ];

      $session = session();
      $session->set($cobertura);

     }
  }



  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
