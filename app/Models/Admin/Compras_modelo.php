<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Compras_modelo extends Model
{

    public $table = 'compra';

    public $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id', 'fecha',
        'total', 'id_metodo_pago', 'cve_fecha',
        'cve_usuario', 'id_proveedor', 'id_sucursal'
    ];

    protected $validationRules    = [
        'fecha' => 'required',
        'total' => 'required|numeric',
        'id_metodo_pago' => 'required|integer',
        'cve_usuario' => 'required|max_length[5]',
        'id_sucursal' => 'required|integer'
    ];


    public function _obtenerComprasQuery()
    {
        $sql = "SELECT c.id, c.fecha,count(detalle_compra.id_compra) as cantidad,c.total,proveedor.nombre as proveedor
        FROM compra c
        INNER JOIN detalle_compra on detalle_compra.id_compra = c.id
        INNER JOIN proveedor on proveedor.id = c.id_proveedor
        GROUP BY c.id;";

        $query = $this->query($sql);

        return $query->getResultArray();
    }

    public function _obtenerCompras($buscarde, $buscarhasta,$paginas,$idSucursal)
    {
        $this->select('compra.id, compra.fecha,count(detalle_compra.id_compra) as cantidad,compra.total,proveedor.nombre as proveedor')
            ->join('detalle_compra', 'detalle_compra.id_compra = compra.id')
            ->join('proveedor', 'proveedor.id = compra.id_proveedor')
            ->groupBy("compra.id");

        if ($buscarde == null && $buscarhasta == null && $idSucursal == null) {
            return $this->paginate($paginas);
        } else if ($buscarde != null && $buscarhasta != null && $idSucursal != null) { 
            return $this->where("fecha >=", $buscarde)->where("fecha <=", $buscarhasta)->where("id_sucursal", $idSucursal)->paginate($paginas);
        }
        else if ($buscarde != null && $buscarhasta != null && $idSucursal == null) { 
            return $this->where("fecha >=", $buscarde)->where("fecha <=", $buscarhasta)->paginate($paginas);
        }
        else if ($buscarde == null && $buscarhasta == null && $idSucursal != null) { 
            return $this->where("id_sucursal", $idSucursal)->paginate($paginas);
        }
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

        $query = $this->query($sql, $idCompra);

        return $query->getResultArray();
    }
}
