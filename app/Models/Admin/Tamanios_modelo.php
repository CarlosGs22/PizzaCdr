<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Tamanios_modelo extends Model
{

    public $table = 'tamanio';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'tamanio', 'imagen', 'status', 'cve_fecha', 'cve_usuario'];

    protected $validationRules    = [
        'tamanio' => 'required|max_length[50]',
        
    ];

 

    public function _obtener_tipos($id_tamanio)
    {
        $sql = "SELECT tipo_tamanio.* 
        FROM `tipo_tamanio`
        inner JOIN tipo on tipo.id = tipo_tamanio.id_tipo
        INNER JOIN tamanio on tamanio.id = tipo_tamanio.id_tamanio
        WHERE tipo_tamanio.id_tamanio = ?";

        $query = $this->query($sql, $id_tamanio);

        return $query->getResult();
    }
}
