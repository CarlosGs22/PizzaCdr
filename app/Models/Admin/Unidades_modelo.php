<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Unidades_modelo extends Model
{

public $table = 'unidad';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'nombre','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'nombre' => 'required|max_length[255]',
    'status' => 'required|integer|is_numeric',
    'cve_usuario' => 'required|max_length[5]'
];

}
