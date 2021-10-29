<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Unidades_modelo extends Model
{

public $table = 'unidad';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'nombre','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'nombre' => 'required',
    'status' => 'required',
    'cve_usuario' => 'required'
];

}
