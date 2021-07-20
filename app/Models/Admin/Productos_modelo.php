<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Productos_modelo extends Model
{

    protected $table = 'producto';
    protected $primaryKeuy = 'id';

    protected $allowedFields = [
        'id', 'nombre', 'descripcion', 'precio',
        'status', 'id_masa', 'id_categoria', 'id_tipo_tamanio', 'cve_usuario'
    ];

    protected $validationRules    = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',
        'status' => 'required',
        'id_masa' => 'required',
        'id_categoria' => 'required',
        'id_tipo_tamanio' => 'required',
        'cve_usuario' => 'required'
    ];

    public function _obtenerProductos($idProducto)
    {
        $condicion = null;
        if ($idProducto != null) {
            $condicion = "WHERE  producto.id = " . $idProducto;
        } else {
            $condicion = "";
        }

        $sql = "SELECT producto.id as idProducto, producto.nombre,producto.descripcion,producto.precio precioProducto,producto.status,producto.cve_fecha,
        masa.id as idMasa,masa.masa,
        categoria.id as idCategoria, categoria.categoria,
        tipo_tamanio.id as idTipoTamanio,tipo_tamanio.precio as precioTamanio,
        tipo.id as idTipo,tipo.tipo,
        tamanio.id as idTamanio, tamanio.tamanio,
        imagen.id,imagen.imagen
        FROM producto
        INNER JOIN masa on masa.id = producto.id_masa
        INNER JOIN categoria on categoria.id = producto.id_categoria
        INNER JOIN tipo_tamanio on tipo_tamanio.id = producto.id_tipo_tamanio
        INNER JOIN tipo on tipo.id = tipo_tamanio.id_tipo
        INNER JOIN tamanio on tamanio.id = tipo_tamanio.id_tamanio
        LEFT JOIN imagen on imagen.id_producto = producto.id "
        . $condicion . " GROUP BY producto.id";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
}
