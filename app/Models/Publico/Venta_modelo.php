<?php

namespace App\Models\Publico;

use CodeIgniter\Model;

class Venta_modelo extends Model
{

public $table = 'venta';

public $primaryKey = 'id';

protected $allowedFields = ['id','total','metodo_pago',
'id_cliente','id_direccion'];

protected $validationRules    = [
    'total' => 'required',
    'metodo_pago' => 'required',
    'id_cliente' => 'required',
    'id_direccion' => 'required'
];


}
