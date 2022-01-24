<?php

namespace App\Models\Publico;

use CodeIgniter\Model;


class Direccion_modelo extends Model
{

    public $table = 'direccion';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'calle', 
    'numero', 'colonia', 'codigo_postal', 'status','id_usuario','id_localidad'];

    protected $validationRules    = [
        'calle' => 'required',
        'numero' => 'required',
        'colonia' =>  'required',
        'codigo_postal' => 'required',
        'status' => 'required',
        'id_usuario' => 'required',
        'id_localidad' => 'required'
    ];
}
