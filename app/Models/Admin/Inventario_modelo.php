<?php
namespace App\Models\Admin;
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

}
