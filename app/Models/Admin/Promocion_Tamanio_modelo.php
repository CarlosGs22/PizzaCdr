<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Promocion_tamanio_modelo extends Model
{

public $table = 'promocion_tamanio';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'id_tipo_tamanio','id_promocion'];

protected $validationRules    = [
    'id_tipo_tamanio' => 'required',
    'id_promocion' => 'required'
];

public function _obtenerPromociones($id_promo)
  {
    $sql = "SELECT promocion_tamanio.id as idPromoTama, 
    tamanio.tamanio,
    tipo.tipo
    FROM `promocion_tamanio`
    INNER JOIN tipo_tamanio on tipo_tamanio.id = promocion_tamanio.id_tipo_tamanio
    LEFT JOIN tamanio on tipo_tamanio.id_tamanio = tamanio.id
    LEFT JOIN tipo on tipo.id = tipo_tamanio.id_tipo
    WHERE promocion_tamanio.id_promocion = ?";

    $query = $this->query($sql, $id_promo);

    return $query->getResultArray();

  }




}
