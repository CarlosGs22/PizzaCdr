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
    'dia' => 'required|max_length[20]',
    'horade' => 'required|max_length[20]',
    'horademns' => 'required|max_length[20]',
    'horahasta' => 'required|max_length[20]',
    'horahastamns' => 'required|max_length[20]',
    'status' => 'required|integer',
    'id_sucursal' => 'required|integer',
    'cve_usuario' => 'required'
];

}
