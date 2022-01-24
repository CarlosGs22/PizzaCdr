<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Horario_modelo  extends Model
{

public $table = 'horario';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'dia',
'horade','horademns','horahasta',
'horahastamns','status','id_sucursal','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'dia' => 'required',
    'horade' => 'required',
    'horademns' => 'required',
    'horahasta' => 'required',
    'horahastamns' => 'required',
    'status' => 'required',
    'id_sucursal' => 'required',
    'cve_usuario' => 'required'
];

}
