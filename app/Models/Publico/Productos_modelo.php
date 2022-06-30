<?php

namespace App\Models\Publico;

use App\Models\Admin\Funciones;
use CodeIgniter\Model;


class Productos_modelo extends Model
{

    protected $table = 'producto';
    protected $primaryKeuy = 'id';

    protected $allowedFields = [
        'id', 'nombre', 'descripcion', 'precio', 'total',
        'status', 'id_masa', 'id_categoria', 'id_menu',
        'id_clasificacion', 'id_tamanio', 'id_sucursal',
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

    public function _obtenerProductospUBL($idProducto)
    {
        $funciones = new Funciones();
        $condicion = null;
        if ($idProducto != null) {
            $idProducto = $funciones->cleanSanitize("STRING", $idProducto);
            $condicion = "WHERE producto.id = " . $idProducto;
        } else {
            $condicion = "";
        }

        $sql = "SELECT
        ingrediente.id as idIngrediente,
        ingrediente.ingrediente as nombre_ingrediente,
        menu.id as idMenu,
        menu.nombre as nombre_menu,
        inventario.id as idIventario,
        cantidad,
        inventario.id_sucursal as idSucursal,
        producto.id as idProducto,
        producto.nombre as nombre_producto,
        producto.descripcion,
        producto.precio as precioProducto,
        producto.total as total_productol,
        imagen.id as idImagen,
        imagen.imagen as imagen_producto,
        masa.id as idMasa,
        masa.masa,
        categoria.categoria,
        tipo_tamanio.id as idTipoTamanio,
        tipo_tamanio.precio as precio_tamanio,
        tamanio.id as idTamanio,
        tamanio.tamanio as tamanio,
        tipo.id as itTipo,
        tipo.tipo as tipo,
        clasificacion.id as idClasificacion,
        clasificacion.nombre as clasificacion
    FROM
     producto
        INNER JOIN menu on menu.id = producto.id_menu
        INNER JOIN menu_ingredientes ON menu_ingredientes.id_menu = menu.id
        INNER JOIN ingrediente ON ingrediente.id = menu_ingredientes.id_ingrediente
        INNER JOIN inventario on inventario.id_ingrediente_producto = menu_ingredientes.id_ingrediente
        INNER JOIN imagen on imagen.id_producto = producto.id
        INNER JOIN masa on masa.id = producto.id_masa
        INNER JOIN categoria on categoria.id = producto.id_categoria
        INNER JOIN clasificacion on clasificacion.id = producto.id_clasificacion
        LEFT JOIN tipo_tamanio on tipo_tamanio.id = producto.id_tamanio
        LEFT JOIN tipo on tipo.id = tipo_tamanio.id_tipo
        LEFT JOIN tamanio on tamanio.id = tipo_tamanio.id_tamanio
        " . $condicion . "
       
    GROUP BY
        inventario.id limit 1";

        $query = $this->query($sql);
        return $query->getResultArray();
    }

    public function _getProductosPublic($txtBuscar, $idSucursal, $pagina, $idClasificacion, $idTipoTamanio, $idMenu)
    {
        $funciones = new Funciones();
        $condicion = null;
        $condicionMenu = "";
        if ($idClasificacion != null) {
            $condicion = "AND clasificacion.id = " . $idClasificacion;
        } else if ($idTipoTamanio != null) {
            $condicion = "AND tipo_tamanio.id = " . $idTipoTamanio;
        } else if ($txtBuscar != null) {
            $txtBuscar = $funciones->cleanSanitize("STRING", $txtBuscar);
            $condicion = "AND (producto.nombre like '%" . $txtBuscar . "%' 
            OR producto.descripcion like '%" . $txtBuscar . "%'
            ) ";
        }


        $this->table('ingrediente');
        $this->select(
            'ingrediente.id as idIngrediente,
        ingrediente.ingrediente as nombre_ingrediente,
        menu.id as idMenu,
        menu.nombre as nombre_menu,
        inventario.id as idIventario,
        cantidad,
        inventario.id_sucursal as idSucursal,
        producto.id as idProducto,
        producto.nombre as nombre_producto,
        producto.descripcion,
        producto.slider,
        producto.precio as precioProducto,
        producto.total as total_productol,
        imagen.id as idImagen,
        imagen.imagen as imagen_producto,
        masa.id as idMasa,
        masa.masa,
        categoria.categoria,
        tipo_tamanio.id as idTipoTamanio,
        tipo_tamanio.precio as precio_tamanio,
        tamanio.id as idTamanio,
        tamanio.tamanio as tamanio,
        tipo.id as itTipo,
        tipo.tipo as tipo,
        clasificacion.id as idClasificacion,
        clasificacion.nombre as clasificacion,
        sucursal.*,'
        )

            ->join('menu', 'menu.id = producto.id_menu', 'LEFT')
            ->join('menu_ingredientes', ' menu_ingredientes.id_menu = menu.id', 'LEFT')
            ->join('ingrediente', 'ingrediente.id = menu_ingredientes.id_ingrediente', 'LEFT')
            ->join('inventario', 'inventario.id_ingrediente_producto = menu_ingredientes.id_ingrediente', 'LEFT')
            ->join('sucursal', 'inventario.id_sucursal = sucursal.id')
            ->join('localidad', 'localidad.id = sucursal.id_localidad')
            ->join('municipio', 'municipio.id = localidad.municipio_id')
            ->join('masa', 'masa.id = producto.id_masa')
            ->join('categoria', 'categoria.id = producto.id_categoria')
            ->join('clasificacion', 'clasificacion.id = producto.id_clasificacion')
            ->join('tipo_tamanio', 'tipo_tamanio.id = producto.id_tamanio', 'LEFT')
            ->join('tipo', 'tipo.id = tipo_tamanio.id_tipo', 'LEFT')
            ->join('tamanio', 'tamanio.id = tipo_tamanio.id_tamanio', 'LEFT')
            ->join('imagen', 'imagen.id_producto = producto.id', 'LEFT')

            ->groupBy("producto.id")
            ->having('cantidad > 0 and producto.precio > 0 and menu.id in (SELECT menu.id
            FROM
             producto
                INNER JOIN menu on menu.id = producto.id_menu
                INNER JOIN menu_ingredientes ON menu_ingredientes.id_menu = menu.id
                INNER JOIN ingrediente ON ingrediente.id = menu_ingredientes.id_ingrediente
                INNER JOIN inventario on inventario.id_ingrediente_producto = menu_ingredientes.id_ingrediente
                WHERE cantidad > 0
                GROUP BY inventario.id HAVING cantidad > 0) ' . $condicion);

        if ($idMenu != null) {
            $this->where("menu.id !=", $idMenu);
        }

        return $this->where("inventario.id_sucursal", $idSucursal)->paginate($pagina);
    }

    public function _obtenerIngredientesTamanio($idMenu, $idTipoTamanio)
    {
        $sql = "SELECT menu.id as idMenu,menu.nombre as nombreMenu,
        ingrediente.id as idIngrediente, ingrediente.ingrediente,
        porcion
        FROM menu
        LEFT JOIN menu_ingredientes on menu_ingredientes.id_menu = menu.id
        LEFT JOIN ingrediente on ingrediente.id = menu_ingredientes.id_ingrediente
        LEFT JOIN tamanio_ingrediente on tamanio_ingrediente.id_ingrediente = ingrediente.id
        LEFT JOIN inventario on inventario.id_ingrediente_producto = ingrediente.id
        WHERE menu.id = ? and tamanio_ingrediente.id_tipo_tamanio = ?";

        $query = $this->query($sql, array($idMenu, $idTipoTamanio));
        return $query->getResultArray();
    }

    public function _obtenerIngredientesTamanioMenu($idTipoTamanio)
    {
        $sql = "SELECT menu.id as idMenu,menu.nombre as nombreMenu,
       ingrediente.id as idIngrediente, ingrediente.ingrediente,
       porcion
       FROM menu
       LEFT JOIN menu_ingredientes on menu_ingredientes.id_menu = menu.id
       LEFT JOIN ingrediente on ingrediente.id = menu_ingredientes.id_ingrediente
       LEFT JOIN tamanio_ingrediente on tamanio_ingrediente.id_ingrediente = ingrediente.id
       WHERE tamanio_ingrediente.id_tipo_tamanio = ?
       GROUP BY menu.id;";

        $query = $this->query($sql, $idTipoTamanio);
        return $query->getResultArray();
    }
}
