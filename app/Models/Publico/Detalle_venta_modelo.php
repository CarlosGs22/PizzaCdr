<?php

namespace App\Models\Publico;

use CodeIgniter\Model;

class Detalle_Venta_modelo extends Model
{

    public $table = 'detalle_venta';

    public $primaryKey = 'id';

    protected $allowedFields = [
        'id', 'cantidad', 'precio',
        'subtotal', 'id_venta', 'id_producto'
    ];

    protected $validationRules    = [
        'cantidad' => 'required',
        'precio' => 'required',
        'subtotal' => 'required',
        'id_venta' => 'required',
        'id_producto' => 'required'
    ];
}
