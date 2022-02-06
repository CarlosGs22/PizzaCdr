<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Sucursal_Localidad_modelo extends Model
{

public $table = 'sucursal_localidad';

public $primaryKey = 'id';

protected $allowedFields = ['id','precio','id_sucursal','id_localidad'];
    
protected $validationRules    = [
    'precio' => 'required|is_numeric',
    'id_sucursal' => 'required|integer|is_numeric',
    'id_localidad' => 'required|integer|is_numeric'
];



}
