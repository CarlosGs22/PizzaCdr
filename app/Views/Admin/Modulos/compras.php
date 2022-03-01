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
            <div class="col-6 col-md-6 col-sm-6 text-right">
                <h3 class="text-blue h3">
                    <button type="button" class="btn btn_add_compra" data-toggle="modal" data-target="#modal_compras" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
                <form class="form-inline row" action="<?php echo base_url("admin/compras") ?>" accept-charset="UTF-8" method="get">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-inline">
                                        <label for="">Sucursal</label>
                                        <select class="form-control txtForm txtSucursal w-100" name="txtSucursal" id="txtSucursal">
                                            <option value="">Todas</option>
                                            <?php 
                                            $fechaDe = null;
                                            $fechaHasta = null;
                                            $id_sucursal = null;

                                            if ($lista_validar_txtFechaDeHasta["txtFechaDe"] != null) {
                                                $fechaDe = $lista_validar_txtFechaDeHasta["txtFechaDe"];
                                            }
                                            if ($lista_validar_txtFechaDeHasta["txtFechaHasta"] != null) {
                                                $fechaHasta = $lista_validar_txtFechaDeHasta["txtFechaHasta"];
                                            }
                                            if ($lista_validar_txtFechaDeHasta["id_sucursal"] != null) {
                                                $id_sucursal = $lista_validar_txtFechaDeHasta["id_sucursal"];
                                            }
                                            
                                            if ($lista_sucursales) {
                                                foreach ($lista_sucursales as $key => $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>

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
                                        <input class="form-control txtForm txtFecha fecha form-control w-100" data-language="en" type="text" name="txtFechaDe" id="txtBuscarDe" value="<?=$fechaDe != null ?  $fechaDe : "" ?>" placeholder="De">
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                        <input class="form-control txtForm txtFecha fecha form-control w-100" data-language="en" type="text" name="txtFechaHasta" id="txtBuscarHasta" value="<?=$fechaHasta != null ?  $fechaHasta : "" ?>" placeholder="Hasta">

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
                                <th>Proveedor</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_compras) {
                                foreach ($lista_compras as $key => $value) { ?>
                                    <tr>
                                        <td class="table-plus"><?= $value['id'] ?></td>
                                        <td><?= $value['fecha'] ?></td>
                                        <td><?= $value['cantidad'] ?></td>
                                        <td><?= $value['total'] ?> </td>
                                        <td><?= $value['proveedor'] ?></td>
                                        <td><a href="<?php echo base_url("admin/compras?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Detalle</a></td>
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
<div class="modal fade" id="modal_compras" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $lista_edit_compras == null ?  base_url("admin/accion_compras") :  base_url("admin/accion_compras_borrar"); ?>" enctype="multipart/form-data" id="frm_compras">
                    <?php if ($lista_edit_compras) {
                        $total = 1;
                        $precio_total = 0;
                        $mostrar_modal = 1;
                        $fecha = null;
                        $status = null;
                        $id_proveedor = null;
                        $direccion = null;
                        $usuario = null;
                        $id_metodo = null;
                        $id_compra = null;
                        foreach ($lista_edit_compras as $key => $value) {
                            $total++;
                            $fecha = $value['fecha'];
                            $status = $value['status'];
                            $id_proveedor = $value['idProveedor'];
                            $id_metodo = $value['idMet'];
                            $direccion = $value['direccion'];
                            $usuario = $value["nombreUsuario"];
                            $id_compra = $value["idCompra"];
                            break;
                        }
                    } ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 order-md-2 mb-4">
                                <h5 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Ingredientes - Productos</span>
                                    <span class="badge badge-secondary badge-pill"><?= $total ?></span>
                                </h5>

                                <ul class="list-group mb-3">
                                    <?php if ($lista_edit_compras) {

                                        foreach ($lista_edit_compras as $key => $value) {
                                            $precio_total += $value["subtotal"];

                                    ?>
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0"><?php echo $value["ingrediente"] ?></h6>
                                                    <small class="text-muted"><?php echo $value["cantidad"] . "x" . $value["precio"] ?></small>
                                                </div>
                                                <span class="text-muted">$<?php echo $value["subtotal"] ?></span>
                                            </li>

                                    <?php }
                                    } ?>

                                    <?php if ($lista_ingredientes) { ?>
                                        <div class="row rowCantidad" id="rowCantidad">
                                            <div class="col-12">
                                                <label for="">Cantidad</label>
                                                <select name="txtCantidadIngreProd" class="form-control CantidadxIgrediente" id="txtCantidadIngreProd">
                                                    <option value="0"></option>
                                                    <?php for ($i = 1; $i < 26; $i++) {  ?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <li class="list-group-item text-center">

                                            <div class="row">
                                                <div class="col-4">
                                                    <p>Producto</p>
                                                </div>
                                                <div class="col-3">
                                                    <p>Precio</p>
                                                </div>
                                                <div class="col-2">
                                                    <p>Cantidad</p>
                                                </div>
                                               
                                            </div>
                                        </li>

                                        <li class="list-group-item justify-content-between listaIngredientes">
                                            <div class="row">
                                                <div class="col-4">
                                                    <select name="txtResProd" class="form-control txtResProd producto">
                                                        <option value="0"></option>
                                                        <?php if ($lista_ingredientes) { ?>
                                                            <?php foreach ($lista_ingredientes as $key => $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $status) ? ' selected="selected"' : ''; ?>><?php echo $value['ingrediente']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input name="txtResPrec" oninput="restrict(this);" type="text" class="form-control txtResPrec precio" placeholder="$">
                                                </div>
                                                <div class="col-2">
                                                    <select name="txtResCant" class="form-control txtResCant cantidad">
                                                        <option value="0"></option>
                                                        <?php for ($i = 1; $i < 26; $i++) {  ?>
                                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <!--<div class="col-3">
                                                    <select name="txtResUni" class="form-control txtResUni unidad">

                                                        <?php if ($lista_unidades) { ?>
                                                            <?php foreach ($lista_unidades as $key => $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>-->

                                                <div class="col-3">
                                                    <small class="text-muted txtResLabelPrecio"></small>
                                                    <small class="text-muted txtResLabelSigno">x</small>
                                                    <small class="text-muted txtResLabelCantidad"></small>
                                                    <small class="text-muted txtResLabelTotalSig">$</small>
                                                    <small class="text-muted txtResLabelTotal"></small>
                                                </div>

                                                <div class="col-3 offset-md-6" style="margin-top:3px;">
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm btnRemProd"><i class="fa fa-remove"></i></button>
                                                    <button type="button" class="btn btn-primary btn-circle btn-sm btnAddProd"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </li>

                                    <?php }  ?>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (MXN)</span>
                                        <strong id="txtTotal">$<?= $precio_total != null ? $precio_total : "0" ?></strong>
                                    </li>
                                </ul>

                                <div class="input-group">
                                    <?php if ($mostrar_modal == 1) { ?>
                                        <input type="hidden" name="txtId" id="txtId" value="<?= $id_compra ?>">
                                        <button type="submit" class="btn btn-block btn btn-danger"><i class="fa fa-warning">Eliminar</i></button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-block btn btn-success"><i class="fa fa-save">Guardar</i></button>
                                    <?php  } ?>
                                </div>

                            </div>
                            <div class="col-md-4 order-md-1">
                                <h5 class="mb-3">Proveedor</h5>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Nombre</label>
                                        <select name="txtProveedor" id="txtProveedor" class="form-control height-auto txtForm proveedor">

                                            <option value="0"></option>
                                            <?php if ($lista_proveedores) { ?>
                                                <?php foreach ($lista_proveedores as $key => $value) { ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_proveedor) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <h5 class="mb-3">Método de pago</h5>
                                <div class="d-block my-3">
                                    <?php if ($lista_metodos_pago) { ?>
                                        <?php foreach ($lista_metodos_pago as $key => $value) { ?>
                                            <input type="checkbox" class="txtForm pago" name="txtMetodo" value="<?php echo $value["id"]; ?>" <?php echo ($value['id'] ==  $id_metodo) ? 'checked' : ''; ?>>
                                            <?php echo $value["metodo"]; ?>
                                    <?php }
                                    } ?>
                                </div>

                                <hr class="mb-4">

                                <h5 class="mb-3">Detalle</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Fecha</label>
                                        <input class="form-control txtForm txtFecha fecha" data-language="en" name="txtFecha" type="text" value="<?= $fecha ?>">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Usuario</label>
                                        <input type="text" class="form-control txtForm usuario" disabled id="txtUsuario" value="<?php echo $lista_edit_compras != null ? $usuario :  $_SESSION["nombre"] ?>">
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
    </form>

</div>


<script>
    $(function() {
        $('.txtFecha').datepicker({
            dateFormat: 'yy-dd-mm',
            language: 'es'
        });

        var duplicados = function() {
            var res = true;
            var checker = {};
            $(".txtResProd").each(function() {
                var selection = $(this).val();
                if (checker[selection]) {
                    res = false;
                    return res;
                } else {
                    checker[selection] = true;
                    res = true;
                    return res;
                }
            });

            return res;

        }

        var idCompra = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idCompra == '1'  || localStorage.getItem("opcionBtn") === '1') {
            $("#modal_compras").modal('show');
            $(".txtForm").prop('disabled', true);
            localStorage.removeItem("opcionBtn");
        }

        $(".listaIngredientes").hide();

        $("#txtCantidadIngreProd").on("change", function() {
            $("#txtTotal").text("$ " + "0");
            $('.listaIngredientes').slice(1).remove();
            for (let index = 1; index <= $(this).val(); index++) {
                $(".listaIngredientes:last").clone().insertAfter(".listaIngredientes:last").show();
            }

        });


        $(".btn_add_compra").click(function() {
            if (idCompra == '1') {
                localStorage.setItem("opcionBtn", "1");
                window.location.href = "<?php echo base_url("admin/compras"); ?>";
            }
        });



        $(document).delegate(".txtResProd", "change", function(e) {
            var valor = $(this).val();
            if ($(this).val() != "0") {
                $(this).attr("name", "txtResProd-" + $(this).val());
                $(this).closest(".row").find(".txtResCant").attr("name", "txtResCant-" + $(this).val());
                $(this).closest(".row").find(".txtResPrec").attr("name", "txtResPrec-" + $(this).val());
                //$(this).closest(".row").find(".txtResUni").attr("name", "txtResUni-" + $(this).val());


            } else {
                $(this).attr("name", "txtResProd");
                $(this).closest(".row").find(".txtResCant").attr("name", "txtResCant");
                $(this).closest(".row").find(".txtResPrec").attr("name", "txtResPrec");
                //$(this).closest(".row").find(".txtResUni").attr("name", "txtResUni");

            }
        });


        $(document).delegate(".txtResPrec", "blur", function(e) {
            var sum = 0;
            if (isNumeric($(this).val())) {

                $(this).closest(".row").find(".txtResLabelPrecio").text(Number($(this).val()).toFixed(2));
                var cantidad = $(this).closest(".row").find(".txtResLabelCantidad").text();
                $(this).closest(".row").find(".txtResLabelTotal").text((Number($(this).val()) * Number(cantidad)).toFixed(2));

                var total = 0;
                $('.txtResLabelTotal:visible').each(function(index, value) {
                    total += Number($(this).text());
                });

                $("#txtTotal").text("$ " + total.toFixed(2));
            }
        });

        $(document).delegate(".txtResCant", "change", function(e) {
            var sum = 0;
            if (isNumeric($(this).val())) {

                $(this).closest(".row").find(".txtResLabelCantidad").text($(this).val());

                var precio = $(this).closest(".row").find(".txtResLabelPrecio").text();

                $(this).closest(".row").find(".txtResLabelTotal").text((Number($(this).val()) * Number(precio)).toFixed(2));

                var total = 0;
                $('.txtResLabelTotal:visible').each(function(index, value) {
                    total += Number($(this).text());
                });

                $("#txtTotal").text("$ " + total.toFixed(2));

            }

        });

        $(document).delegate(".btnRemProd", "click", function(e) {


            $(this).closest(".listaIngredientes").remove();
            var total = 0;
            $('.txtResLabelTotal:visible').each(function(index, value) {
                total += Number($(this).text());
            });

            $("#txtTotal").text("$ " + total.toFixed(2));

            var cant = $('.listaIngredientes:visible').length;
            $("#txtCantidadIngreProd").val(cant);


        });

        $(document).delegate(".btnAddProd", "click", function(e) {

            $(".listaIngredientes:last").clone().insertAfter(".listaIngredientes:last").show();

            var cant = $('.listaIngredientes:visible').length;
            $("#txtCantidadIngreProd").val(cant);

        });

        $("#frm_compras").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_compras")) {
                if (validacionSelect("frm_compras")) {
                    if ($(".pago").is(':checked')) {

                        if (duplicados()) {
                            valid = true;
                        } else {
                            valid = false;
                            Swal.fire({
                                icon: 'error',
                                title: '',
                                text: 'Los productos - ingredientes no pueden estar repetidos',
                            });
                        }

                    } else {
                        valid = false;
                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: 'Metodo de pago no puede estar vacio',
                        });
                    }
                }
            }
            if (valid) this.submit();
        });




    });
</script>