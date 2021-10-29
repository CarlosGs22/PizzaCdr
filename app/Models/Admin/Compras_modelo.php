<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Compras_modelo extends Model
{

    public $table = 'compra';

    public $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id', 'fecha', 'total', 'id_metodo_pago', 'cve_fecha', 'cve_usuario','id_proveedor'];

    protected $validationRules    = [
        'fecha' => 'required',
        'total' => 'required',
        'id_metodo_pago' => 'required',
        'cve_usuario' => 'required'
    ];


    public function _obtenerCompras()
    {
        $sql = "SELECT c.id, c.fecha,count(detalle_compra.id_compra) as cantidad,c.total,proveedor.nombre as proveedor
        FROM compra c
        INNER JOIN detalle_compra on detalle_compra.id_compra = c.id
        INNER JOIN proveedor on proveedor.id = c.id_proveedor
        GROUP BY c.id;";

        $query = $this->query($sql);

        return $query->getResultArray();
    }

    public function _obtenerComprasDetalle($idCompra)
    {
        $sql = "SELECT c.id as idCompra, cast(c.fecha as date) as fecha,c.id_metodo_pago,
        dc.cantidad,dc.precio,dc.subtotal, id.ingrediente,id.id as idIngrediente, dc.id as idDeta,metodo_pago.id as idMet,metodo_pago.metodo,proveedor.id as idProveedor,proveedor.nombre as nombreProveedor,usuario.nombres as nombreUsuario, proveedor.direccion
        FROM compra c
        INNER JOIN detalle_compra dc on dc.id_compra = c.id
        INNER JOIN ingrediente id on id.id = dc.id_articulo_ingrediente
        INNER JOIN metodo_pago on metodo_pago.id = c.id_metodo_pago
        INNER JOIN proveedor on proveedor.id = c.id_proveedor
        INNER JOIN usuario on usuario.id = c.cve_usuario
        where id_compra = ?";

        $query = $this->query($sql,$idCompra);

        return $query->getResultArray();
    }
}
