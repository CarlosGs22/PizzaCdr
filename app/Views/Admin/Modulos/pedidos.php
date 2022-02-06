<?php

use App\Models\Publico\Productos_modelo;

$productos_modelo = new Productos_modelo();

$encrypter = \Config\Services::encrypter();

?>

<div class="row">
    <div class="col-8">
        <div class="row">
            <?php
            if ($lista_productos) {
             
                foreach ($lista_productos as $key => $value) {
            ?>

                    <div class="col-4">
                    <form action="<?= base_url("accion_carrito") ?>" method="POST">
                            <div class="card-box mb-30">
                                <div class="pb-20">
                                    <div class="row pr-20 pl-20">

                                        <div class="col-12 pb-20">
                                            <div class="card-box pricing-card card mt-30  h-100 cardProductos">
                                                <div class="price-title textoTipo divText">
                                                    <?= $value["nombre_menu"]; ?> <i class="icon-copy fa fa-check-circle" aria-hidden="true"></i>
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

                                                <div class="text textoNombre divText">
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
                                                                        $lista["listas_producto_existente"] = $productos_modelo->_getProductosPublic(session()->get("id_sucursal"), "9999", null, $value["idTipoTamanio"]);

                                                                        if (!empty($lista["listas_producto_existente"])) {
                                                                        ?>
                                                                            <?php foreach ($lista["listas_producto_existente"] as $key => $value) {
                                                                                $idValueProd = bin2hex($encrypter->encrypt($value["idProducto"])); ?>
                                                                                <option value="<?= $idValueProd ?>"><?= $value["nombre_menu"] ?></option>
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
                                                                    <input type="text" name="qty" value="1" class="qty" maxlength="1" oninput="restrict(this);">
                                                                    <div class="qtyplus">+</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cta">
                                                    <button type="submit" class="btn btn-rounded btn-lg data-bgcolor=' #f46f30'" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="icon-copy fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="paginadordiv mt-30">
                                        <?php
                                        if ($pager) {
                                            echo $pager;
                                        }
                                        ?>
                                    </div>

                <?php  }
            } else { ?>
                <div class="col-12 text-center">
                    <p class="dataTables_empty">No hay resultados para mostrar</p>

                </div>
            <?php  } ?>
        </div>
    </div>

    <div class="col-4">

    </div>
</div>

<script>
    $(function() {
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
    });
</script>