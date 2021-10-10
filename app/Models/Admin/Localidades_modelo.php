<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Localidades_modelo extends Model
{

    public $table = 'localidad';

    public $primaryKey = 'id';

    public function _obtenerLocalidadesNot($idMun,$idSuc)
    {

        $sql = "SELECT * FROM localidad
        WHERE municipio_id = ? and localidad.id not in (
                   
            SELECT sucursal_localidad.id_localidad from sucursal_localidad 
        WHERE sucursal_localidad.id_sucursal = ?
        
            );";
        $query = $this->query($sql,array($idMun,$idSuc));

        return $query->getResultArray();
    }

    
    public function _obtenerLocalidadesRegistradas($idSuc)
    {

        $sql = "SELECT sl.id as idSL, ld.id as idLoca,ld.nombre as nombreLoca,sc.id as idSuc, sl.precio,mn.nombre as nombreMun
        FROM sucursal_localidad sl
        INNER JOIN sucursal sc on sc.id = sl.id_sucursal
        INNER JOIN localidad ld on ld.id = sl.id_localidad
        INNER JOIN municipio mn on mn.id = ld.municipio_id
        WHERE id_sucursal = ?";
        $query = $this->query($sql,$idSuc);

        return $query->getResultArray();
    }

}
