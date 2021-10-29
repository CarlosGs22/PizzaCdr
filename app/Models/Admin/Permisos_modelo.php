<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Permisos_modelo extends Model
{

public $table = 'permiso_menu';

public $primaryKey = 'id';

protected $allowedFields = ['id','id_usuario','id_menu','cve_usuario','cve_fecha'];

public function _obtenerPermisoUsuario($idusuario)
  {
    $sql = "SELECT permiso_menu.*, submenu_web.*, usuario.id,usuario.usuario,usuario.nombres,usuario.imagen,usuario.status,
    usuario.id_sucursal, sucursal.nombre as nombre_sucursal
    FROM `permiso_menu` 
    INNER join submenu_web on submenu_web.id = permiso_menu.id_submenu 
    INNER JOIN usuario on permiso_menu.id_usuario = usuario.id 
    left JOIN sucursal on sucursal.id = usuario.id_sucursal
    where permiso_menu.id_usuario = ?";

    $query = $this->query($sql, $idusuario);

    return $query->getResult();

  }

}
