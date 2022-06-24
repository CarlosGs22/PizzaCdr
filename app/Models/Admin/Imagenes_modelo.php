<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Imagenes_modelo extends Model
{

public $table = 'imagen';

public $primaryKey = 'id';

protected $allowedFields = ['id','imagen','status','id_producto','cve_usuario'];

protected $validationRules    = [
    'imagen' => 'required',
    'id_producto' => 'required|integer',
    'status' => 'required|integer',
    'cve_usuario' => 'required|max_length[5]'
];


}
