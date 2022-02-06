<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Detalle_compra_modelo extends Model
{

    public $table = 'detalle_compra';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'cantidad', 'precio', 'subtotal','id_compra','id_articulo_ingrediente'];

    protected $validationRules    = [
        'cantidad' => 'required|integer|numeric|integer',
        'precio' => 'required|decimal|numeric',
        'precio' => 'required|decimal|numeric',
        'subtotal' => 'required|decimal|numeric',
        'id_articulo_ingrediente' => 'required|integer|numeric'
    ];
}
