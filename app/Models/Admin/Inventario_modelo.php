<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Inventario_modelo extends Model
{

public $table = 'inventario';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'cantidad','id_ingrediente_producto','id_sucursal'];

protected $validationRules    = [
    'cantidad' => 'required',
    'id_ingrediente_producto' => 'required',
    'id_sucursal' => 'required'
];

protected $validationMessages = [
    'nombre'=> [
        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
];


}
