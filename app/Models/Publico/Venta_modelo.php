<?php

namespace App\Models\Publico;

use CodeIgniter\Model;

class Venta_modelo extends Model
{

    public $table = 'venta';

    public $primaryKey = 'id';

    protected $allowedFields = [
        'id', 'total', 'metodo_pago',
        'contacto', 'precio_envio', 'comentario', 'tipo_orden','status_venta',
        'id_cliente', 'id_direccion'
    ];

    protected $validationRules    = [
        'total' => 'required',
        'metodo_pago' => 'required',
        'precio_envio' => 'required',
        'tipo_orden' => 'required'
    ];

    public function _obtenerMisVentas($idVenta)
    {
        $sql = "SELECT venta.id as idVenta,venta.fecha,venta.total,venta.contacto,venta.precio_envio,
        producto.nombre as nombre_producto, producto.descripcion,
        detalle_venta.cantidad, detalle_venta.precio, detalle_venta.subtotal,
        tipo_orden.id as idTipoOrden,tipo_orden.tipo as tipo_orden,
        status_venta.id as statusIdVenta,status_venta.nombre as status_pedido,badge,
        direccion.id as idDireccion, direccion.calle, direccion.numero, direccion.codigo_postal,
        localidad.id as isLocalidad, localidad.nombre as nombreLocalidad,
        imagen.id as idImagen , imagen.imagen
        FROM venta
        INNER JOIN detalle_venta on detalle_venta.id_venta= venta.id
        INNER JOIN producto on producto.id = detalle_venta.id_producto
        INNER JOIN tipo_orden on tipo_orden.id = venta.tipo_orden
        INNER JOIN status_venta on status_venta.id = venta.status_venta
        LEFT JOIN direccion on direccion.id = venta.id_direccion
        left JOIN localidad on localidad.id = direccion.id_localidad
        LEFT JOIN imagen on imagen.id_producto = producto.id
        WHERE venta.id = ?
        GROUP BY producto.id;";
        $query = $this->query($sql, $idVenta);
        return $query->getResultArray();
    }

    public function _obtenerVentas($buscarde, $buscarhasta, $paginas, $idTipoOrden, $idStatusVenta)
    {
        $this->select('venta.id, venta.fecha,count(detalle_venta.id_venta) as cantidad,venta.total,tipo_orden.tipo, status_venta.nombre as nombreStatus,status_venta.id as idStatusVenta, badge')
            ->join('detalle_venta', 'detalle_venta.id_venta = venta.id')
            ->join('tipo_orden', 'tipo_orden.id = venta.tipo_orden')
            ->join('status_venta', 'status_venta.id = venta.status_venta')
            ->groupBy("venta.id");

        if ($idStatusVenta != null) {
            $this->where("status_venta", $idStatusVenta);
        }

        if ($buscarde == null && $buscarhasta == null && $idTipoOrden == null) {
            return $this->paginate($paginas);
        } else if ($buscarde != null && $buscarhasta != null && $idTipoOrden != null) {
            return $this->where("fecha >=", $buscarde)->where("fecha <=", $buscarhasta)->where("id_sucursal", $idTipoOrden)->paginate($paginas);
        } else if ($buscarde != null && $buscarhasta != null && $idTipoOrden == null) {
            return $this->where("fecha >=", $buscarde)->where("fecha <=", $buscarhasta)->paginate($paginas);
        } else if ($buscarde == null && $buscarhasta == null && $idTipoOrden != null) {
            return $this->where("tipo_orden", $idTipoOrden)->paginate($paginas);
        }
    }

    public function _obtenerMisComprasCliente($idCliente)
    {
        $sql = "SELECT venta.id as idVenta,venta.fecha,venta.total,venta.contacto,venta.precio_envio,
        producto.nombre as nombre_producto, producto.descripcion,
        detalle_venta.cantidad, detalle_venta.precio, detalle_venta.subtotal,
        tipo_orden.id as idTipoOrden,tipo_orden.tipo as tipo_orden,
        status_venta.nombre as status_pedido,badge,
        direccion.id as idDireccion, direccion.calle, direccion.numero, direccion.codigo_postal,
        localidad.id as isLocalidad, localidad.nombre as nombreLocalidad,
        imagen.id as idImagen , imagen.imagen
        FROM venta
        INNER JOIN detalle_venta on detalle_venta.id_venta= venta.id
        INNER JOIN producto on producto.id = detalle_venta.id_producto
        INNER JOIN tipo_orden on tipo_orden.id = venta.tipo_orden
        INNER JOIN status_venta on status_venta.id = venta.status_venta
        INNER JOIN usuario on usuario.id = venta.id_cliente
        LEFT JOIN direccion on direccion.id = venta.id_direccion
        left JOIN localidad on localidad.id = direccion.id_localidad
        LEFT JOIN imagen on imagen.id_producto = producto.id
        WHERE usuario.usuario = ? 
        GROUP BY producto.id;";
        $query = $this->query($sql, $idCliente);
        return $query->getResultArray();
    }
}
