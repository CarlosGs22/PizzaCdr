<?php 

namespace App\Models\Admin;
use CodeIgniter\Model;

class Proveedores_modelo extends Model{

    public $table = 'proveedor';

    public $primaryKey = 'id';
    
    protected $allowedFields = ['id','nombre',
    'apellido_paterno','apellido_materno',
    'razon_social',
    'telefono','direccion','correo','status','cve_usuario'];
    
    protected $validationRules    = [
        'nombre' => 'required|max_length[255]',
        'razon_social' => 'required|max_length[255]',
        'telefono' => 'required',
        'direccion' => 'required|max_length[255]',
        //'correo' => 'required',
        'status' => 'required|integer|is_numeric',
        'cve_usuario' => 'required|max_length[255]'
    ];
    
   
}

?>