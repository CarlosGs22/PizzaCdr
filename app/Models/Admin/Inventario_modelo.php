<?php
namespace App\Models\Admin;

use App\Models\Publico\Productos_modelo;
use CodeIgniter\Model;


class Inventario_modelo extends Model
{

public $table = 'inventario';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'cantidad','id_ingrediente_producto','id_sucursal'];

protected $validationRules    = [
    'cantidad' => 'required|is_numeric|integer',
    'id_ingrediente_producto' => 'required|integer',
    'id_sucursal' => 'required|integer'
];

public function validarInventario($idProducto, $idProductoEncript, $cantidad)
{
  $productos_modelo = new Productos_modelo();
  $menu_modelo = new Menu_modelo();
  $inventario_modelo = new Inventario_modelo();
  $tamanio_ingredientes_modelo =  new Tamanios_Ingredientes_modelo();

  $res = 0;

  $lista_productos["lista_producto"] = $productos_modelo->_getProductosPublic(NULL, session()->get("sucursal_cobertura"), "999999999999", null, null);

  $id_sucursal = (session()->get("sucursal_cobertura") != null ? session()->get("sucursal_cobertura") : session()->get("id_sucursal"));

  foreach ($lista_productos["lista_producto"] as $keyProducto => $valueProducto) {

    if ($valueProducto["idProducto"] == $idProducto) {
      $idMenu = $valueProducto["idMenu"];
      //print_r("111111111111111111111111111");
      $lista['lista_menu_ingrediente'] = $menu_modelo->_obtenerIngredienteMenu($idMenu);
      if (!empty($lista['lista_menu_ingrediente'])) {
        //print_r("222222222222222222222");
        foreach ($lista['lista_menu_ingrediente'] as $keyMI => $valueMI) {
          //print_r("333333333333333333333333333333333");
          if ($res == 0) {
            //print_r("444444444444444444444444444");

            $idTipoTamanio = $valueProducto["idTipoTamanio"];

            $lista['lista_inventario'] = $inventario_modelo->where("id_ingrediente_producto", $valueMI["idIngrediente"])->where("id_sucursal", $id_sucursal)->findAll();

            $lista['lista_porcion'] = $tamanio_ingredientes_modelo->where("id_ingrediente", $valueMI["idIngrediente"])->where("id_tipo_tamanio", $idTipoTamanio)->findAll();

            $porcion = (int) $lista['lista_porcion'][0]["porcion"];
            $total_producto = (int) $valueProducto["total_productol"];
            $cantidad_a_restar = doubleval($porcion) * $cantidad * $total_producto;

            $cantidadInventario =  $lista['lista_inventario'][0]["cantidad"];

            //print_r("CANT".$cantidad);
            //print_r("\n <br> porcion".$porcion);
            //print_r("\n <br> CANTreS".$cantidad_a_restar);
            //print_r(" \n <br> cantIN".$cantidadInventario);

            if ($cantidadInventario > 0) {
              if ($cantidadInventario < $cantidad_a_restar) {
                $res = 1;
                break;
              }
            } else {
              $res = 1;
              break;
            }
          }
        }
      } else {
        $res = 1;
        break;
      }
    }
  }

  return $res;
}

}
