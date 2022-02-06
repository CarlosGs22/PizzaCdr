<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Metodos_Pago_modelo extends Model
{

public $table = 'metodo_pago';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'metodo','status','cve_fecha','cve_usuario'];

protected $validationRules    = [
    'metodo' => 'required|max_length[50]',
    'status' => 'required|integer|numeric',
    'cve_usuario' => 'required|max_length[5]'
];


}
