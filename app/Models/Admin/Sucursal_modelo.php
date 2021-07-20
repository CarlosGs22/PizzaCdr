<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Sucursal_modelo extends Model
{

    public $table = 'sucursal';

    public $primaryKey = 'id';

    protected $allowedFields = [
        'id', 'nombre', 'imagen', 'telefono',
        'calle', 'numero', 'colonia', 'cp', 'status', 'cve_usuario', 'cve_fecha', 'id_localidad'
    ];

    protected $validationRules    = [
        'nombre' => 'required',
        'telefono' => 'required',
        'calle' => 'required',
        'numero' => 'required',
        'colonia' => 'required',
        'cp' => 'required',
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El campo nombre es obligatorio'
        ],
        'telefono' => [
            'required' => 'El campo telefono es obligatorio'
        ],
        'calle' => [
            'required' => 'El campo calle es obligatorio'
        ],
        'numero' => [
            'required' => 'El número nombre es obligatorio'
        ],
        'colonia' => [
            'required' => 'El campo nombre es obligatorio'
        ],
        'cp' => [
            'required' => 'El campo cp es obligatorio'
        ],
        'status' => [
            'required' => 'El campo status es obligatorio'
        ],
        'id_localidad' => [
            'required' => 'El localidad nombre es obligatorio'
        ]
    ];


    public function _obtenerEntidad($idLocalidad)
    {
        $sql = "SELECT localidad.id as loca_id,
     municipio.id as muni_id,
     estado.id as esta_id
     FROM `localidad`
    INNER JOIN municipio on municipio.id = localidad.municipio_id
    INNER JOIN estado on estado.id = municipio.estado_id
    WHERE localidad.id = ?";
        $query = $this->query($sql, $idLocalidad);
        return $query->getResult();
    }
}
