<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Categorias_modelo extends Model
{

public $table = 'categoria';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'categoria','imagen','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'categoria' => 'required|max_length[50]',
    'status' => 'required|max_length[5]|integer',
    'cve_usuario' => 'required|max_length[5]'
];


}
