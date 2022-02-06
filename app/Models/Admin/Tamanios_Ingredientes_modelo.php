<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Tamanios_Ingredientes_modelo extends Model
{

public $table = 'tamanio_ingrediente';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'id_ingrediente','id_tipo_tamanio',
'porcion','cve_usuario'];
    
protected $validationRules    = [
    'id_ingrediente' => 'required|integer|is_numeric',
    'id_tipo_tamanio' => 'required|integer|is_numeric',
    'porcion' => 'required',
    'cve_usuario' => 'required|max_length[5]',
];

public function _obtener_ingredientes($id_tamanio)
    {
        $sql ="SELECT ingrediente.ingrediente,tamanio_ingrediente.*
        FROM tamanio_ingrediente
        INNER JOIN ingrediente on ingrediente.id = tamanio_ingrediente.id_ingrediente
        LEFT JOIN tipo_tamanio on tipo_tamanio.id = tamanio_ingrediente.id_tipo_tamanio
        WHERE tamanio_ingrediente.id_tipo_tamanio = ?";

        $query = $this->query($sql, $id_tamanio);

        return $query->getResult();
    }

}


