<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Sucursal_Localidad_modelo extends Model
{

public $table = 'sucursal_localidad';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'id_sucursal','id_localidad'];
    
protected $validationRules    = [
    'id_sucursal' => 'required',
    'id_localidad' => 'required'
];



}
