<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Clientes_modelo extends Model
{

public $table = 'cliente';

public $primaryKey = 'id';

protected $allowedFields = ['nombres','apellido_paterno','telefono','cve_usuario','cve_fecha'];

protected $validationRules    = [
    'nombre' => 'required',
    'apellido_paterno' => 'required',
    'apellido_materno' => 'required'
];



}
