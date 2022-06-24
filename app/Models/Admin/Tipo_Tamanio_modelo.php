<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Tipo_Tamanio_modelo extends Model
{

    public $table = 'tipo_tamanio';

    public $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_tipo', 'id_tamanio', 'precio', 'cve_usuario'];

    protected $validationRules    = [
        'id_tipo' => 'required|integer|is_numeric',
        'id_tamanio' => 'required|integer|is_numeric',
        'precio' => 'required|is_numeric',
    ];

    



    public function _obtenerTipoTamamanio()
    {
        $sql = "SELECT tipo_tamanio.id as id_tipo_tamanio,precio,tipo.id as id_tipo,tipo.tipo,tamanio.id as id_tamanio,tamanio.tamanio  
        FROM `tipo_tamanio`
        INNER JOIN tipo ON tipo.id = tipo_tamanio.id_tipo
        INNER JOIN tamanio ON tamanio.id = tipo_tamanio.id_tamanio
        WHERE tipo.status = 1 and tamanio.status = 1 ORDER BY tamanio.tamanio ASC ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
}
