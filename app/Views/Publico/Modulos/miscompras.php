<?php if ($lista_compras) {
    setlocale(LC_TIME, 'spanish');
    $total = 0;
    $idVenta = null;
    $idTipoOrden = null;
    $idStatusOrden = null;
    $tipoOrden = null;
    $precioTotal = null;

    foreach ($lista_compras as $key => $value) {
        $total++;

        $fecha = strftime("%A, %d de %B, %G", strtotime($value["fecha"]));
        $idVenta = $value["idVenta"];
        $idTipoOrden = $value["idTipoOrden"];
        $tipoOrden = $value["tipo_orden"];
        $precioTotal = $value["total"];

        $direccion = $value["calle"] . " " . $value["numero"] . " " .  $value["codigo_postal"]  . " " . $value["nombreLocalidad"];
    }
}
?>

<div class="container">

    <div class="row m-4 panelId">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    <?= $fecha ?> <b>Orden 00-<?= $idVenta ?></b>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><span class="badge badge-success"><?= $value["status_pedido"] ?></span></h5>
                    <div class="row panelId">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                            <?php foreach ($lista_compras as $key => $value) { ?>
                                <div class="row m-4">
                                    <div class="col-6 aling-6">
                                        <img class="imgProd" src="<?= base_url("public/Admin/img/productos/" . $value["imagen"]) ?>" alt="imagenProducto">
                                    </div>
                                    <div class="col-6 ling-6">
                                        <p><?= $value["nombre_producto"] ?></p>
                                        <small>Cantidad: <?= $value["cantidad"] ?></small>
                                    </div>
                                </div>

                            <?php  } ?>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <p class="priceTotal">$<?= $precioTotal ?></p>

                            <p class="card-text">Tipo de orden : <?= $tipoOrden ?></p>
                            <?php if ($idTipoOrden == 2) { ?>
                                <p class="card-text" <?= $direccion ?></p>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Cantidad de productos: <?= $total ?>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
    .imgProd {
        max-width: 40%;
    }

    .panelId {
        align-items: center;
    }

    .aling-6 {
        align-self: center;
    }

    .priceTotal {
        font-size: 50px;
        color: #f79769;
    }
</style>