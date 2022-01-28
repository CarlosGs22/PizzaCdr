<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Clasificacion_Modelo extends Model
{

public $table = 'clasificacion';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'nombre','status'];

protected $validationRules    = [
    'nombre' => 'required|min_length[50]',
    'status' => 'required|min_length[1]',
];

protected $validationMessages = [
    'nombre'=> [
        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
    ]
];


}
