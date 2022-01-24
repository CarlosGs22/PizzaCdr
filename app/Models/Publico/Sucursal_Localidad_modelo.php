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

    public function _obtenerHorarios($idSucursal)
    {
        $sql = "SELECT horario.id as idHorario,horario.dia,horario.horade,horario.horademns,horario.horahasta,horario.horahastamns,horario.status, 
        sucursal.id as idSucurusal,sucursal.nombre as nombreEstado,
        localidad.id as idLocalidad, localidad.nombre as nombreLocalidad,
        municipio.id as idMunicipio, municipio.nombre as nombreMunicipio,
        estado.id as idEstado, estado.nombre as nombreEstado,
        sucursal.id as idSucursal, sucursal.nombre as nombreSucursal, sucursal.telefono,calle,numero,cp,colonia,correo,presentacion,facebook_link, src_frame
        FROM sucursal
        INNER JOIN localidad on localidad.id = sucursal.id_localidad
        INNER JOIN municipio on municipio.id = localidad.municipio_id
        INNER JOIN estado on estado.id = municipio.estado_id
        INNER JOIN horario on horario.id_sucursal = sucursal.id
        WHERE horario.status = 1 and sucursal.status = 1 and sucursal.id = ?";

        $query = $this->query($sql, $idSucursal);
        return $query->getResultArray();
    }

    public function _obtenerColonia($idSucursal)
    {
        $sql = "SELECT sucursal.id as idSucursal , sucursal.nombre as nombreSucursal,
        sucursal_localidad.precio,
        localidad.id as idLocalidad, localidad.nombre as nombreLocalidad
        from sucursal
        INNER JOIN sucursal_localidad on sucursal.id = sucursal_localidad.id_sucursal
        INNER JOIN localidad on localidad.id = sucursal_localidad.id_localidad
        WHERE sucursal.status = 1 and sucursal.id = ?";

        $query = $this->query($sql, $idSucursal);
        return $query->getResultArray();
    }
}
