<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Permiso_menu_modelo extends Model
{

public $table = 'permiso_menu';

public $primaryKey = 'id';

public function _obtenerSubmenu_web($idusuario)
  {
    return $this->join('submenu_web', 'submenu_web.id  =  permiso_menu.id_submenu')->where(
      'permiso_menu.id_usuario ',
      $idusuario
      )->orderBy('nombre_submenu_web', 'ASC')->findAll();
  }



  
    
}
