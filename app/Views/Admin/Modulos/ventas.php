<?php
$encrypter = \Config\Services::encrypter();
?>

<div class="xs-pd-20-10 pd-ltr-20">
    <div class="page-header">
        <div class="row">
            <div class="col-6 col-md-6 col-sm-6">
                <div class="title">
                    <?php
                    $pieces = explode("/", uri_string());
                    ?>
                    <h4><?php echo $pieces[1];  ?></h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a><?php echo $pieces[0]; ?></a></li>
                        <li class="breadcrumb-item"><a><?php echo $pieces[1]; ?></a></li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <?php

    $fechaDe = null;
    $fechaHasta = null;
    $id_tipo_orden = null;
    $id_status_venta = null;

    if ($lista_validar_txtFechaDeHasta["txtFechaDe"] != null) {
        $fechaDe = $lista_validar_txtFechaDeHasta["txtFechaDe"];
    }
    if ($lista_validar_txtFechaDeHasta["txtFechaHasta"] != null) {
        $fechaHasta = $lista_validar_txtFechaDeHasta["txtFechaHasta"];
    }
    if ($lista_validar_txtFechaDeHasta["txtTipoOrden"] != null) {
        $id_tipo_orden = $lista_validar_txtFechaDeHasta["txtTipoOrden"];
    }

    if ($lista_validar_txtFechaDeHasta["txtStatusVenta"] != null) {
        $id_status_venta = $lista_validar_txtFechaDeHasta["txtStatusVenta"];
    }

    ?>

    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
                <form class="form-inline row" action="<?php echo base_url("admin/ventas") ?>" accept-charset="UTF-8" method="get">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-inline">
                                        <label for="">Status</label>
                                        <select class="form-control  txtStatus w-100" name="txtStatusVenta" id="txtStatusVenta">
                                            <option value="">Todas</option>

                                            <?php

                                            if ($lista_status_venta) {
                                                foreach ($lista_status_venta as $key => $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_status_venta) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>

                                            <?php }
                                            } ?>
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-inline">
                                        <label for="">Tipo de orden</label>
                                        <select class="form-control txtForm txtTipoOrden w-100" name="txtTipoOrden" id="txtTipoOrden">
                                            <option value="">Todas</option>
                                            <?php




                                            if ($lista_orden) {
                                                foreach ($lista_orden as $key => $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_tipo_orden) ? ' selected="selected"' : ''; ?>><?php echo $value['tipo']; ?></option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="container">
                            <div class="form-inline">
                                <label for="">Filtro</label>
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                        <input class="form-control txtForm txtFecha fecha form-control w-100" data-language="en" type="text" name="txtFechaDe" id="txtBuscarDe" value="<?= $fechaDe != null ?  $fechaDe : "" ?>" placeholder="De">
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                        <input class="form-control txtForm txtFecha fecha form-control w-100" data-language="en" type="text" name="txtFechaHasta" id="txtBuscarHasta" value="<?= $fechaHasta != null ?  $fechaHasta : "" ?>" placeholder="Hasta">

                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </form>
                <div class="pb-20 pd-20">
                    <table class="table tablaDatatable  dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Id</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Status pedido </th>
                                <th>Tipo orden </th>
                                <th>Acción </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_ventas) {
                                foreach ($lista_ventas as $key => $value) { ?>
                                    <tr>
                                        <td class="table-plus"><?= $value['id'] ?></td>
                                        <td><?= $value['fecha'] ?></td>
                                        <td><?= $value['cantidad'] ?></td>
                                        <td>$<?= $value['total'] ?> </td>
                                        <td><span class="badge <?= $value["badge"] ?>"><?= $value['nombreStatus'] ?></span></td>
                                        <td><span class="badge badge-success"><?= $value['tipo'] ?></span></td>


                                        <td><a href="<?php echo base_url("admin/ventas?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Detalle</a></td>
                                    </tr>
                            <?php }
                            } ?>


                        </tbody>
                    </table>
                </div>

            </div>

            <div class="paginadordiv mt-30">
                <?php
                if ($pager) {
                    echo $pager;
                }
                ?>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modal_ventas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($lista_edit_venta) {

                    $total = 1;
                    $precio_total = 0;
                    $mostrar_modal = 1;
                    $fecha = null;
                    $status = null;
                    $status_v = null;
                    $tipo_orden = null;
                    $direccion = null;
                    $id_metodo = null;
                    $id_venta = null;
                    foreach ($lista_edit_venta as $key => $value) {

                        $total++;
                        $fecha = $value['fecha'];
                        $status = $value['status'];
                        $statusv = $value['status_pedido'];
                        $tipo_orden = $value['tipo_orden'];
                        $id_metodo = $value['metodo_pago'];
                        $direccion = "";
                        $id_venta = $value["idVenta"];
                        break;
                    }
                } ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 order-md-2 mb-4">
                            <h5 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Productos</span>
                                <span class="badge badge-secondary badge-pill"><?= $total ?></span>
                            </h5>

                            <ul class="list-group mb-3">
                                <?php if ($lista_edit_venta) {

                                    foreach ($lista_edit_venta as $key => $value) {
                                        $precio_total += $value["subtotal"];

                                ?>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0"><?php echo $value["nombre_producto"] ?></h6>
                                                <small class="text-muted"><?php echo $value["cantidad"] . "x" . $value["precio"] ?></small>
                                            </div>
                                            <span class="text-muted">$<?php echo $value["subtotal"] ?></span>
                                        </li>

                                <?php }
                                } ?>


                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (MXN)</span>
                                    <strong id="txtTotal">$<?= $precio_total != null ? $precio_total : "0" ?></strong>
                                </li>


                                <li class="list-group-item d-flex justify-content-between text-center">
                                    <form action="<?= base_url("admin/accion_venta") ?>" method="post" class="w-100">
                                        <div class="row">
                                            <?php

                                            $idValueId = bin2hex($encrypter->encrypt($id_venta)); ?>

                                            <div class="col text-center">
                                                <input type="hidden" name="txtId" id="txtId" value="<?= $idValueId ?>">
                                                <strong>Cambiar Status</strong>
                                                <select name="txtStatus" id="txtStatus" class="form-control m-2">
                                                    <option value="0"></option>
                                                    <?php if ($lista_status_venta) { ?>
                                                        <?php foreach ($lista_status_venta as $key => $value) {
                                                              $idValueStatus = bin2hex($encrypter->encrypt($value["id"])); ?>
                                                            <option value="<?=$idValueStatus ?>"><?php echo $value['nombre']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                                <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>


                            </ul>

                        </div>
                        <div class="col-md-4 order-md-1">

                            <h5 class="mb-3">Detalle</h5>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="firstName">Fecha</label>
                                    <input class="form-control txtForm txtFecha fecha" data-language="en" name="txtFecha" type="text" value="<?= $fecha ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="firstName">Tipo de orden</label>
                                    <input type="text" class="form-control" disabled value="<?= $tipo_orden ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="firstName">Status</label>
                                    <input type="text" class="form-control" disabled value="<?= $statusv ?>">
                                </div>
                            </div>
                            <?php if ($value["idTipoOrden"] == 2) {
                                $direccion = $value["calle"] . " " . $value["numero"] . " " .  $value["codigo_postal"]  . " " . $value["nombreLocalidad"]; ?>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="firstName">Dirección</label>

                                        <textarea class="form-control" cols="30" rows="10"><?= $direccion ?></textarea>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.txtFecha').datepicker({
            dateFormat: 'yy-dd-mm',
            language: 'es'
        });



        var idCompra = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idCompra == '1' || localStorage.getItem("opcionBtn") === '1') {
            $("#modal_ventas").modal('show');
            //$(".txtForm").prop('disabled', true);
            localStorage.removeItem("opcionBtn");
        }



    });
</script>