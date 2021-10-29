<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Ingredientes_Menu_modelo extends Model
{

public $table = 'menu_ingredientes';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'id_ingrediente','id_menu','cve_usuario'];

protected $validationRules    = [
    'id_ingrediente' => 'required',
    'id_menu' => 'required',
    'cve_usuario' => 'required'
];


}
