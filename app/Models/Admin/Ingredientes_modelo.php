<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Ingredientes_modelo extends Model
{

public $table = 'ingrediente';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'ingrediente','id_unidad','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'ingrediente' => 'required|max_length[50]',
    'id_unidad' => 'required|integer',
    'status' => 'required|integer',
    'cve_usuario' => 'required|max_length[5]'
];

protected $validationMessages = [
    'ingrediente'=> [
        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
];


}
