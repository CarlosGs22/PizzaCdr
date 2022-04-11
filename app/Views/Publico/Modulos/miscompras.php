<?php

$encrypter = \Config\Services::encrypter();

setlocale(LC_TIME, 'spanish');

header('Content-Type: text/html; charset=UTF-8');

if ($lista_compras) {

    $total = 0;
    $idVenta = null;
    $idTipoOrden = null;
    $idStatusOrden = null;
    $tipoOrden = null;
    $precioTotal = null;

    foreach ($lista_compras as $key => $value) {
        $total++;

        $fecha = $test = utf8_encode(strftime("%A, %d de %B, %G", strtotime($value["fecha"])));

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
                    <h5 class="card-title shake"><span class="badge badge-success element"><?= $value["status_pedido"] ?></span></h5>
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


    <?php

    if (1 == 2) {
        if ($lista_mis_detalles) {
            $totalProd = 0;

            foreach ($lista_mis_compras as $key => $value1) {
                if ($value1["id"] != $idVenta) {
                    $totalProd++;

                    $fecha1 = $test = utf8_encode(strftime("%A, %d de %B, %G", strtotime($value["fecha"])));

                    $idTipoOrden = $value1["idTipoOrden"]; ?>
                    <div class="row m-4 panelId">
                        <div class="col-12">
                            <div class="card text-center">
                                <div class="card-header">
                                    <?= $fecha1 ?> <b>Orden 00-<?= $value1["id"] ?></b>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><span class="badge badge-success"><?= $value["status_venta"] ?></span></h5>
                                    <div class="row panelId">

                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                                            <?php foreach ($lista_mis_detalles as $key => $value2) {

                                            ?>
                                                <div class="row m-4">
                                                    <div class="col-6 aling-6">
                                                        <img class="imgProd" src="<?= base_url("public/Admin/img/productos/" . $value2["imagen"]) ?>" alt="imagenProducto">
                                                    </div>
                                                    <div class="col-6 ling-6">
                                                        <p><?= $value2["nombre_producto"] ?></p>
                                                        <small>Cantidad: <?= $value2["cantidad"] ?></small>
                                                    </div>
                                                </div>

                                            <?php  } ?>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <p class="priceTotal">$<?= $value1["total"] ?></p>

                                            <p class="card-text">Tipo de orden : <?= $tipoOrden ?></p>
                                            <?php if ($idTipoOrden == 2) { ?>
                                                <p class="card-text" <?= $direccion ?></p>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Cantidad de productos: <?= $totalProd ?>
                                </div>
                            </div>
                        </div>
                    </div>




    <?php }
            }
        }
    } ?>

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

    /* http://waitanimate.wstone.io/#!/ */
    .shake {
        animation: shake-animation 2.72s ease infinite;
        transform-origin: 50% 50%;
    }

    @keyframes shake-animation {
        0% {
            transform: translate(0, 0)
        }

        1.78571% {
            transform: translate(7px, 0)
        }

        3.57143% {
            transform: translate(0, 0)
        }

        5.35714% {
            transform: translate(7px, 0)
        }

        7.14286% {
            transform: translate(0, 0)
        }

        8.92857% {
            transform: translate(7px, 0)
        }

        10.71429% {
            transform: translate(0, 0)
        }

        100% {
            transform: translate(0, 0)
        }
    }
</style>



<?php
$idValueIdVenta = bin2hex($encrypter->encrypt($idVenta));
?>


<script>
    $(function() {

        setInterval(function() {
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/status_compra",
                dataType: 'json',
                data: {
                    idVenta: '<?= $idValueIdVenta ?>',
                },
                success: function(data) {
                    $(".loader").fadeOut(1000);
                    $(".element").text(data[0]["status_pedido"]);

                },
                error: function(request, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: '' + request + ''
                    });
                    $(".loader").fadeOut(1000);
                }
            });

        }, 30000);


    });
</script>