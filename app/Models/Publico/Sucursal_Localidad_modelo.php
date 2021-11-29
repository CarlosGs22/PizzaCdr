<?php

namespace App\Models\Publico;

use CodeIgniter\Model;


class Sucursal_Localidad_modelo extends Model
{

    public function _obtenerCobertura($idLocalidad)
    {
        $sql = "SELECT sl.id as idSL,sl.precio,
        s.id as id_sucursal, s.nombre as nombre_sucursal , s.calle, s.numero, s.colonia, s.cp as cp_sucursal,
        l.id as id_localidad, l.nombre as nombre_localidad, l.codigo_postal as cp_localidad
        FROM `sucursal_localidad` sl
        INNER JOIN sucursal s on s.id = sl.id_sucursal
        INNER JOIN localidad l on l.id = sl.id_localidad
        WHERE l.codigo_postal = ?";
        $query = $this->query($sql, $idLocalidad);
        return $query->getResultArray();
    }
}
