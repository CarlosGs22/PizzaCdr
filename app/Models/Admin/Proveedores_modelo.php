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
        'nombre' => 'required',
        'razon_social' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        //'correo' => 'required',
        'status' => 'required',
        'cve_usuario' => 'required'
    ];
    
    /*protected $validationMessages = [
        'nombre'=> [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];*/
    


}

?>