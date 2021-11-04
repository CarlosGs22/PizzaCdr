<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Sub_Menu_Model extends Model

{

    public $table = 'submenu_web';

    public $primaryKey = 'id';



    public $allowedFields = [

        'id', 'nombre_submenu_web', 'url_submenu_web'

    ];



    public function _obtenerSubmenu_web($idusuario)
    {
        return $this->join('permiso_menu', 'permiso_menu.id_submenu  =  submenu_web.id')->where(
            'permiso_menu.id_usuario',
            $idusuario
        )->orderBy('nombre_submenu_web', 'ASC')->findAll();
    }



    public function _obtenerMenus()

    {
        return $this->findAll();
    }



    public function _validarSesionUsuario($idusuario)

    {

        $sql = "SELECT * FROM `submenu_web`

      inner join permiso_menu on submenu_web.id_submenu_web = permiso_menu.idsubmenu

      WHERE permiso_menu.idusuario = ?";

        $query = $this->query($sql, $idusuario);

        return $query->getResult();
    }
}
