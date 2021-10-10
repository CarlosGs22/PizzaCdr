<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Menu_Modelo extends Model
{

    public $table = 'menu';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'nombre', 'status'];

    protected $validationRules    = [
        'nombre' => 'required',
        'status' => 'required'
    ];

    protected $validationMessages = [
        'nombre' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];

    public function _obtenerIngredienteMenu($idMenu)
    {
        $sql = "SELECT menu.id as idMenu,menu.nombre as menuNombre,
        ingrediente.id as idIngrediente, ingrediente.ingrediente as ingredienteNombre
        FROM menu
        INNER JOIN menu_ingredientes on menu_ingredientes.id_menu = menu.id
        INNER JOIN ingrediente on ingrediente.id = menu_ingredientes.id_ingrediente
        WHERE menu.id = ?";

        $query = $this->query($sql, $idMenu);

        return $query->getResultArray();
    }
}
