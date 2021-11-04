<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Productos_modelo extends Model
{

    protected $table = 'producto';
    protected $primaryKeuy = 'id';

    protected $allowedFields = [
        'id', 'nombre', 'descripcion', 'precio', 'total',
        'status', 'id_masa', 'id_categoria', 'id_menu', 
        'id_clasificacion', 'id_tamanio','id_sucursal', 
        'cve_usuario'
    ];

    protected $validationRules    = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',
        'status' => 'required',
        'id_masa' => 'required',
        'id_categoria' => 'required',
        'id_menu' => 'required',
        'id_clasificacion' => 'required',
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
        categoria.id as idCategoria, categoria.categoria,menu.id as idMenu,menu.nombre as nombreMenu,
        imagen.id,imagen.imagen,
        clasificacion.id as idClasificacion,clasificacion.nombre as nombreClasificacion,total,
        tipo.id as idTipo,tipo.tipo,tamanio.id as idTamanio,tamanio.tamanio
       
        FROM producto
        
        INNER JOIN masa on masa.id = producto.id_masa
        INNER JOIN categoria on categoria.id = producto.id_categoria
        INNER JOIN clasificacion on clasificacion.id = producto.id_clasificacion
        LEFT JOIN tipo_tamanio on tipo_tamanio.id = producto.id_tamanio
        LEFT JOIN tipo on tipo.id = tipo_tamanio.id_tipo
        LEFT JOIN tamanio on tamanio.id = tipo_tamanio.id_tamanio
        
        INNER JOIN menu on menu.id = producto.id_menu
        LEFT JOIN imagen on imagen.id_producto = producto.id "
            . $condicion . " GROUP BY producto.id";

        $query = $this->query($sql);
        return $query->getResultArray();
    }

    public function getProductos($buscar,$id_sucursal)
    {
        $this->select('producto.id as idProducto, producto.nombre,producto.descripcion,producto.precio precioProducto,producto.status,producto.cve_fecha,
        masa.id as idMasa,masa.masa,
        categoria.id as idCategoria, categoria.categoria,menu.id as idMenu,menu.nombre as nombreMenu,
        imagen.id,imagen.imagen,
        clasificacion.id as idClasificacion,clasificacion.nombre as nombreClasificacion,total,
        tipo.id as idTipo,tipo.tipo,tamanio.id as idTamanio,tamanio.tamanio')
            ->join('masa', 'masa.id = producto.id_masa')
            ->join('categoria', 'categoria.id = producto.id_categoria')
            ->join('clasificacion', 'clasificacion.id = producto.id_clasificacion')
            ->join('tipo_tamanio', 'tipo_tamanio.id = producto.id_tamanio', 'LEFT')
            ->join('tipo', 'tipo.id = tipo_tamanio.id_tipo', 'LEFT')
            ->join('tamanio', 'tamanio.id = tipo_tamanio.id_tamanio', 'LEFT')
            ->join('menu', 'menu.id = producto.id_menu')
            ->join('imagen', 'imagen.id_producto = producto.id', 'LEFT')
            ->groupBy("producto.id");

        if ($buscar == null) {
            return $this->where("id_sucursal",$id_sucursal)->paginate(10);
        } else {
            return $this->where("id_sucursal",$id_sucursal)->like("producto.nombre", $buscar)->paginate(10);
        }
    }
}
