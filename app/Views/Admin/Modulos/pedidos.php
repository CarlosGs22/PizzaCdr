<?php

use App\Models\Admin\Funciones;
use App\Models\Publico\Productos_modelo;

$productos_modelo = new Productos_modelo();
$funciones = new Funciones();

$encrypter = \Config\Services::encrypter();
$cart = \Config\Services::cart();

?>

<div class="row">
    <div class="col-12">
        <form class="form-inline" action="<?php echo base_url("admin/pedidos") ?>" accept-charset="UTF-8" method="get" style="margin: 10px 0px 10px 0px;">
            <div class="flex-fill mr-2">
                <input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Nombre, Descripción , Masa, Clasificación, Categoria" class="form-control w-100" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
        </form>
    </div>
</div>
<div class="row">

    <?php
    if ($lista_productos) {

        foreach ($lista_productos as $key => $value) {
            $lista["lista_ingredientes_tamanios"] = $productos_modelo->_obtenerIngredientesTamanio($value["idMenu"], $value["idTipoTamanio"]);

            $validarPorciones = $funciones->findTextByValueInArray($lista["lista_ingredientes_tamanios"], "0", "porcion");

            if (!empty($lista["lista_ingredientes_tamanios"])) {
                if ($validarPorciones == 0) {

    ?>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4" id="<?= $key ?>">
                        <form action="<?= base_url("accion_carrito") ?>" method="POST" class="frm_carrito" id="<?= $key ?>">
                            <input type="hidden" name="txtModulo" value="0403435235">

                            <div class="pb-20">
                                <div class="row pr-20 pl-20">

                                    <div class="col-12 pb-20">
                                        <div class="card-box pricing-card card mt-30  h-100 cardProductos">
                                            <div class="price-title textoTipo divText">
                                                <?= $value["nombre_menu"] . " - " . $value["tipo"]. ' - '. $value["tamanio"]  ?> <i class="icon-copy fa fa-check-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="pricing-icon">
                                                <div class="da-card card h-100" style="margin-left: 7%; margin-right:7%; border:none">
                                                    <div class="da-card-photo ">
                                                        <?php if ($value['imagen_producto'] != null || $value['imagen_producto'] = "") { ?>
                                                            <img style="height: 180px;" src="<?= base_url("public/Admin/img/productos/" . $value['imagen_producto']) ?>" alt="">
                                                        <?php } else { ?>
                                                            <img style="height: 180px;" src="<?= base_url("public/Admin/img/productos/warning.png") ?>" alt="">

                                                        <?php }  ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text textoNombre divText">
                                                <?= $value["nombre_producto"]; ?>
                                            </div>

                                            <div class="text textoNombre divText">
                                                <?= $value["descripcion"] ?>
                                            </div>

                                            <div class="text textoNombre divText textoPrecio">
                                                <strong>$<?= $value["precioProducto"] ?></strong>
                                            </div>

                                            <?php if ($value["total_productol"] > 1) { ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6><strong>Personaliza tu orden</strong></h6>
                                                        <?php for ($i = 0; $i < $value["total_productol"]; $i++) {   ?>
                                                            <div class="form-group">
                                                                <label for="">Pizza <?= ($i + 1) ?></label>


                                                                <select name="prod_exis<?= ($i + 1) ?>" class="form-control">
                                                                    <?php
                                                                    $lista["listas_producto_existente"] = $productos_modelo->_getProductosPublic(NULL, session()->get("id_sucursal"), "9999", null, $value["idTipoTamanio"], $value["idMenu"]);

                                                                    if (!empty($lista["listas_producto_existente"])) {
                                                                    ?>
                                                                        <?php foreach ($lista["listas_producto_existente"] as $key => $valueLPE) {
                                                                            $idValueProd = bin2hex($encrypter->encrypt($valueLPE["idProducto"])); ?>
                                                                            <option value="<?= $idValueProd ?>"><?= $valueLPE["nombre_menu"] ?></option>
                                                                    <?php }
                                                                    } ?>
                                                                </select>
                                                            </div>

                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <div class="product-count">
                                                        <label for="size">Cantidad</label>
                                                        <div class="row">
                                                            <div class="col-12 display-flex" style="justify-content: center;">
                                                                <div class="qtyminus">-</div>
                                                                <?php
                                                                $idValueProduct = bin2hex($encrypter->encrypt($value["idProducto"]));
                                                                ?>
                                                                <input type="hidden" name="idProducto" value="<?= $idValueProduct;  ?>">
                                                                <input type="hidden" name="idClasificacion" value="<?= $value["idClasificacion"];  ?>">
                                                                <input type="hidden" name="txtIdTipoTamanio" value="<?= $value["idTipoTamanio"];  ?>">
                                                                <input type="text" name="qty" value="1" class="qty" maxlength="1" oninput="restrict(this);">
                                                                <div class="qtyplus">+</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cta text-center">
                                                <button type="submit" id="<?= $value["idProducto"] ?>" class="btn btn-rounded btn-lg data-bgcolor='#f46f30' btnAdd" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="icon-copy fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
        <?php  }
            }
        }  ?>
        <div class="col-12 text-center">
            <div class="paginadordiv mt-30">
                <?php
                if ($pager) {
                    echo $pager;
                }
                ?>
            </div>
        </div>

    <?php } else { ?>
        <div class="col-12 text-center">
            <p class="dataTables_empty">No hay resultados para mostrar</p>

        </div>
    <?php  } ?>



</div>

<a href="#" class="float" id="btnModalPedido" data-toggle="modal" data-target="#modalPedido">
    <i class="fa fa-check my-float"></i>
</a>

<div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url("accion_pasarela") ?>" method="post" id="frm_pedido">
                            <input type="hidden" name="txtTipoPago" value="<?php echo bin2hex($encrypter->encrypt("1")); ?>">
                            <div class="pd-20 card-box height-100-p">
                                <h4 class="mb-20 h4">Detalle Pedido</h4>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="list-group">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group panelChecksPay">
                                            <label for="username">
                                                <h6>Tipo de orden:</h6>
                                            </label>
                                            <select name="txtTipoOrden" id="txtTipoOrden" class="form-control">
                                                <option value="<?php echo bin2hex($encrypter->encrypt("2")); ?>">A domicilio</option>
                                                <option value="<?php echo bin2hex($encrypter->encrypt("1")); ?>">En sucursal</option>
                                            </select>
                                        </div>

                                        <div class="row panelDom">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>Colonia:</h6>
                                                    </label>
                                                    <select name="txtLocalidad" id="txtLocalidad" class="form-control Colonia">

                                                        <option value="0"></option>
                                                        <?php if ($lista_colonias) {
                                                            foreach ($lista_colonias as $key => $value) {
                                                                $idValueLocalidad = bin2hex($encrypter->encrypt($value["idLocalidad"])); ?>
                                                                <option value="<?= $idValueLocalidad ?>"><?php echo $value['nombreLocalidad'] . "-" . $value['codigo_postal'];  ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row panelDom panelAddDatos">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>Nombre:</h6>
                                                    </label>
                                                    <input type="text" class="form-control Nombres" name="txtNombres" id="txtNombres">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row panelDom panelAddDatos">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tel">
                                                        <h6>Contacto (Télefono):</h6>
                                                    </label>
                                                    <input type="text" class="form-control Télefono" value="<?php echo session()->get("telefono_cliente") != null ? session()->get("telefono_cliente") : "" ?>" name="txtContacto" id="txtContacto" oninput="restrict(this);" minlength="1" maxlength="10">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row panelDom panelAddDatos">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>Calle:</h6>
                                                    </label>
                                                    <input type="text" class="form-control Calle" name="txtCalle" id="txtCalle">
                                                </div>
                                            </div>

                                            <div class="col-6 panelAddDatos">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6># int/ext:</h6>
                                                    </label>
                                                    <input type="text" class="form-control Número-Casa" name="txtNum" id="txtNum">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row panelDom panelAddDatos">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>Código Postal:</h6>
                                                    </label>
                                                    <input type="text" class="form-control Código-Postal" name="txtCp" id="txtCp">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row panelSuc">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>A nombre:</h6>
                                                    </label>
                                                    <input type="text" class="form-control Contacto" name="txtContacto" id="txtContacto">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">
                                                        <h6>Comentario:</h6>
                                                    </label>
                                                    <textarea class="form-control Comentario" name="txtComentario" id="txtComentario" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h4>Envío: $<Strong id="txtLabelEnvio">0</Strong></h4>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h3>Total: $<Strong id="txtLabelTotal">0</Strong></h3>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-success">Crear pedido</button>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .panelChecksPay input {
        margin: 10px;
    }

    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #0C9;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
    }

    .my-float {
        margin-top: 22px;
    }
</style>

<script>
    $(function() {
        $(".panelSuc").hide();
        $(".panelAddDatos").hide();



        $(".qtyminus").on("click", function() {
            var now = $(this).closest(".display-flex").find(".qty").val();
            if ($.isNumeric(now)) {

                if (parseInt(now) - 1 > 0) {
                    $(this).closest(".display-flex").find(".qty").val((parseInt(now) - 1));
                }
            }
        });

        $(".qtyplus").on("click", function() {
            var now = $(this).closest(".display-flex").find(".qty").val();
            if ($.isNumeric(now) && parseInt(now) < 10) {
                $(this).closest(".display-flex").find(".qty").val(parseInt(now) + 1);
            }
        });

        $(".btnAdd").click(function(e) {
            var btn = $(this).closest(".cta");
            var btn2 = $(this);
            btn2.closest(".cardProductos").find(".m-5").remove();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/accion_carrito",
                data: $(this).closest("form").serialize(),
                dataType: "json",
                success: function(data) {

                    if (data[1] == "success") {
                        var id = btn2.attr("id");
                        var menu = btn2.closest(".cardProductos").find(".textoTipo").text();
                        var cantidad = btn2.closest(".cardProductos").find(".qty").val();
                        var precio = btn2.closest(".cardProductos").find(".textoPrecio").text().replace("$", "");
                        var totalSub = parseInt(cantidad) * parseInt(precio);

                        if ($(".list-group #list-" + btn2.attr("id")).length != 0) {
                            $(".list-group #list-" + btn2.attr("id")).remove();
                        }

                        $(".list-group").append('<a  class="list-group-item list-group-item-action flex-column align-items-start panelProds" id="list-' + id + '"><h5 class="mb-1 h5">' + menu + '</h5><div class="pb-1"><small class="text-muted weight-600">Cantidad : <strong class="qtyLabel">' + cantidad + 'x ' + precio + '</strong></br>Precio :$<small class="text-muted weight-600 txtLabelPrice"> ' + totalSub + '</small></div><p class="mb-1 font-14 text-right"><span class="badge badge-danger badge-pill"><i class="fa fa-trash btnDanger" id="' + id + '"></i></span></p><small class="text-muted"></small></a>');
                        btn.after('<div class="text-center m-5"><span class="badge badge-success txtInfo">Añadido</span></div>');

                        var total = 0;
                        $(".txtLabelPrice").each(function() {
                            total += parseInt($(this).text());
                        });

                        $("#txtLabelTotal").text(total);
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: data[0]
                        });
                    }


                },
                error: function(request, status, error) {
                    btn.after('<div class="text-center m-5"><span class="badge badge-danger txtInfo">error</span></div>');
                }
            });
        });

        $(document).delegate(".btnDanger", "click", function(e) {
            var btn2 = $(this);

            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/eliminarItem/list-" + $(this).attr("id"),
                dataType: "json",
                success: function(data) {
                    if (data[1] == "success") {
                        $(".list-group #list-" + btn2.attr("id")).remove();

                        var total = 0;
                        $(".txtLabelPrice").each(function() {
                            total += parseInt($(this).text());
                        });

                        $("#txtLabelTotal").text(total);
                    }
                },
                error: function(request, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Ocurrió un error interno'
                    });
                }
            });
        });

        $('input[type="checkbox"]').on('change', function() {
            $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
        });


        $("#myonoffswitch2").on("change", function() {
            if (!$(this).is(':checked')) {
                $(this).val("<?php echo bin2hex($encrypter->encrypt("2")); ?>");
                $(".panelTarjeta").show();
                $(".panelEfectivo").hide();
            } else {
                $(this).val("<?php echo bin2hex($encrypter->encrypt("1")); ?>");
                $(".panelEfectivo").show();
                $(".panelTarjeta").hide();
            }
        });

        $("#frm_pedido").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if ($(".panelProds").length > 0) {
                if (validacionInput("frm_pedido")) {
                    if (validacionSelect("frm_pedido")) {
                        valid = true;
                    }
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: '',
                    text: 'Añada por lo menos un producto'
                });
            }


            if (valid) this.submit();
        });


        $("#txtTipoOrden").on("change", function() {
            $("#txtLabelEnvio").text("0");
            if ($(this).prop('selectedIndex') == 0) {
                $(".panelDom").show();
                $(".panelSuc").hide();
                $("panelSuc input").val("");
            } else {
                $(".panelDom").hide();
                $(".panelSuc").show();
                $("panelDom input").val("");
                $("panelDom select").val("0");
            }
        });

        $("#txtLocalidad").on("change", function() {
            if ($(this).val() != "0") {

                var txtLocalidad = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "<?= base_url() ?>/admin/getCoberturaPrecio",
                    dataType: "json",
                    data: {
                        txtLocalidad: txtLocalidad
                    },
                    success: function(data) {
                        if (data[1] == "success") {
                            $("#txtLabelEnvio").text(data[0]);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '',
                                text: 'Ocurrió un error interno'
                            });
                        }
                    },
                    error: function(request, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: 'Ocurrió un error interno'
                        });
                    }
                });

                $(".panelAddDatos").show();
            } else {
                $(".panelAddDatos").hide();
            }
        });


        $(".btnAddPedido").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/accion_pasarela",
                data: $(this).closest("form").serialize(),
                dataType: "json",
                success: function(data) {
                    if (data[1] == 'success') {
                        let timerInterval
                        Swal.fire({
                            title: data[0],
                            html: '',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {

                            if (result.dismiss === Swal.DismissReason.timer) {
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: data[0],
                        });
                    }
                },
                error: function(request, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Ocurrió un error interno (Verifique los horarios,cantidades, productos, direcciones, etc.)',
                    });
                }
            });
        });


    });
</script>