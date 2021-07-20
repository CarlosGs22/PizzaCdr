<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Categorias_modelo extends Model
{

public $table = 'categoria';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'categoria','imagen','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'categoria' => 'required',
    'status' => 'required',
    'cve_usuario' => 'required'
];

protected $validationMessages = [
    'nombre'=> [
        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
];


}
