<?php

namespace App\Models\Publico;

use CodeIgniter\Model;


class Contacto_modelo extends Model
{

    public $table = 'contacto';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'nombre', 'telefono', 'correo', 'mensaje', 'usuario'];

    protected $validationRules    = [
        'nombre' => 'required',
        'telefono' => 'required',
        'correo' =>  'required',
        'mensaje' => 'required',
        'usuario' => 'required'
    ];
}
