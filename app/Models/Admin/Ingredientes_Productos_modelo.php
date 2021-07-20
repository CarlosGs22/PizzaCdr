<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Ingredientes_Productos_modelo extends Model
{

public $table = 'ingrediente_producto';

public $primaryKey = 'id';

protected $allowedFields = ['id','id_ingrediente','id_producto'];

protected $validationRules    = [
    'id_ingrediente' => 'required',
    'id_producto' => 'required'
];

}


