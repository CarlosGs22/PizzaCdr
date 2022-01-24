<?php

namespace App\Filters;

use App\Models\Admin\Sucursal_modelo;
use App\Models\Publico\Funciones;
use App\Models\Publico\Sucursal_Localidad_modelo;
use CodeIgniter\Filters\FilterInterface;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\HTTP\ResponseInterface;



class SessionSucursal implements FilterInterface

{

  protected $helpers = [];

  public function before(RequestInterface $request, $arguments = null)

  {

    $sucursales_localidad_modelo = new Sucursal_Localidad_modelo();

    $tiempoActual = date('H:i');


    $funciones = new Funciones();
  

    if (session()->get('sucursal_cobertura') == null) {
      

      $lista["lista_sucursal_info"] = $sucursales_localidad_modelo->_obtenerHorarios("1");

      if (!empty($lista["lista_sucursal_info"])) {


        foreach ($lista["lista_sucursal_info"] as $key => $value) {
          if ($value["dia"] == date('l')) {
            
            $tiempoInicial = $value["horade"] . ":" . $value["horademns"];
            $tiempoFinal = $value["horahasta"] . ":" . $value["horahastamns"];
            $restiempo = $funciones->_obtenerHorarioDisponible($tiempoActual, $tiempoInicial, $tiempoFinal);

            if ($restiempo != "1") {
              session()->setFlashdata('respuesta', array("0" => "Por el momento no hay servicio en esta sucursal, revise los horarios y cambie el tipo de orden", "1" => "error"));
              return redirect()->to(base_url(""));
            }
          }
        }

        $sucursales_modelo = new Sucursal_modelo();

        $lista["lista_cobertura"] = $sucursales_modelo->select("id as id_sucursal,nombre as nombre_sucursal")->where("status", "1")->where("id", "1")->findAll();

        $cobertura = [
          'sucursal_cobertura' => $lista["lista_cobertura"][0]["id_sucursal"],
          'nombre_cobertura' => $lista["lista_cobertura"][0]["nombre_sucursal"],
          'tipo_orden' =>  "En sucursal"
        ];

        $session = session();
        $session->set($cobertura);
      } else {
        session()->setFlashdata('respuesta', array("0" => "Por el momento no hay servicio en esta sucursal, revise los horarios y cambie el tipo de orden", "1" => "error"));

        return redirect()->to(base_url(""));
      }
    } else {

      $lista["lista_sucursal_info"] = $sucursales_localidad_modelo->_obtenerHorarios(session()->get('sucursal_cobertura'));

      foreach ($lista["lista_sucursal_info"] as $key => $value) {
        if ($value["dia"] == date('l')) {
          $tiempoInicial = $value["horade"] . ":" . $value["horademns"];
          $tiempoFinal = $value["horahasta"] . ":" . $value["horahastamns"];
          $restiempo = $funciones->_obtenerHorarioDisponible($tiempoActual, $tiempoInicial, $tiempoFinal);
      
          if ($restiempo != "1") {
            session()->setFlashdata('respuesta', array("0" => "Por el momento no hay servicio en esta sucursal, revise los horarios y cambie el tipo de orden", "1" => "error"));
            return redirect()->to(base_url(""));
          }
        }
      }
    }
  }



  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}
