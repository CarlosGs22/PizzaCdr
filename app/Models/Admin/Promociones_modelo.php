<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Promociones_modelo extends Model
{

public $table = 'promocion';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'nombre','descripcion',
'imagen','precio','dia','fecha','status','cve_usuario'];
    
protected $validationRules    = [
    'nombre' => 'required',
    'descripcion' => 'required',
    //'imagen' => 'required',
    'precio' => 'required',
    'dia' => 'required',
    'fecha' => 'required',
    'status' => 'required',
    'cve_usuario' => 'required',
];

}
