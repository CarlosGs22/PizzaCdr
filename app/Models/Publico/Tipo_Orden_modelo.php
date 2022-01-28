<?php

namespace App\Models\Publico;

use CodeIgniter\Model;


class Tipo_Orden_modelo extends Model
{

    public $table = 'tipo_orden';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'tipo'];

    protected $validationRules    = [
        'tipo' => 'required'
    ];
}
