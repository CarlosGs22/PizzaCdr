<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Ingredientes_modelo extends Model
{

public $table = 'ingrediente';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'ingrediente','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'ingrediente' => 'required',
    'status' => 'required',
    'cve_usuario' => 'required'
];

protected $validationMessages = [
    'ingrediente'=> [
        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
];


}
