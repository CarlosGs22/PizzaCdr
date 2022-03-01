<?php
$encrypter = \Config\Services::encrypter();
$cart = \Config\Services::cart();

$totalPrice = 0;
$subTotal = 0;

if ($cart->totalItems() > 0) {
    foreach ($cart->contents() as $value) {
        $totalPrice += (int) $value["price"] * (int) $value["qty"];
        $subTotal += (int) $value["price"];
    }
}

?>



<div class="container">
    <div class="card cardPasarela border-0">
        <div class="heading_container heading_center" style="padding:15px;">
            <h2>
                Pasarela de Pago
            </h2>
        </div>
        <div id="payment-errors"></div>
        <form action="<?= base_url("accion_pasarela") ?>" method="post" id="paymentFrm">
            <div class="container py-5" style="background: #e9ecef;
    border-radius: 10px;">
                <div class="row" style="align-items: center;">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6 mx-auto h-100">
                        <div class="card" style="background: transparent;">
                            <div class="card-header" style="background: transparent;">
                                <div class="tab-content">

                                    <div id="credit-card" class="tab-pane fade show active pt-3">

                                        <div class="card card-box mb-2">
                                            <div class="card-header" style="background-color: #222831; color:white;">
                                                Datos de entrega
                                            </div>
                                            <div class="card-body">

                                                <?php
                                                if (session()->get("tipo_orden") == "A Domicilio") {
                                                    if ($lista_usuario) {
                                                        foreach ($lista_usuario as $key => $value) {
                                                ?>
                                                            <h5 class="card-title">Nombre:</h5>
                                                            <p class="card-text"><?= $value["nombres"] . " " . $value["apellido_materno"] . " " . $value["apellido_paterno"] ?></p>


                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <label for="username">
                                                                        <h6>Contacto (Télefono):</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Télefono" value="<?php echo session()->get("telefono_cliente") != null ? session()->get("telefono_cliente") : "" ?>" name="txtContacto" id="txtContacto" oninput="restrict(this);" minlength="1" maxlength="10">
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="username">
                                                                    <h6>Dirección:</h6>
                                                                </label>
                                                                <?php if ($lista_direccion) { ?>
                                                                    <select name="txtDireccion" id="txtDireccion" class="form-control height-auto Dirección">
                                                                        <option value="0"></option>

                                                                        <?php foreach ($lista_direccion as $key => $value) {
                                                                            $idValueDireccion = bin2hex($encrypter->encrypt($value["idDireccion"])); ?> ?>
                                                                            <option value="<?= $idValueDireccion ?>"><?php echo $value['calle'] . " #" . $value['numero'] . ", " . $value['cp'] . ", " . $value['nombreLocalidad']; ?></option>
                                                                        <?php } ?>

                                                                    </select>
                                                                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#modal_direcciones">Añadir direccion</a>
                                                                <?php } else { ?>
                                                                    </br>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="username">
                                                                                    <h6>Calle:</h6>
                                                                                </label>
                                                                                <input type="text" class="form-control Calle" name="txtCalle" id="txtCalle">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="username">
                                                                                    <h6>#:</h6>
                                                                                </label>
                                                                                <input type="text" class="form-control Número-Casa" name="txtNum" id="txtNum">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="form-group">
                                                                                <label for="username">
                                                                                    <h6>Código Postal:</h6>
                                                                                </label>
                                                                                <input type="text" class="form-control Código-Postal" name="txtCp" id="txtCp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-8">

                                                                            <div class="form-group">
                                                                                <label for="username">
                                                                                    <h6>Colonia:</h6>
                                                                                </label>
                                                                                <select name="txtLocalidad" id="txtLocalidad" class="form-control height-auto Colonia">

                                                                                    <option value="0"></option>
                                                                                    <?php if ($lista_colonias) { ?>
                                                                                        <?php foreach ($lista_colonias as $key => $value) {
                                                                                            $idValueLocalidad = bin2hex($encrypter->encrypt($value["idLocalidad"])); ?> ?>?>
                                                                                            <option value="<?= $idValueLocalidad ?>"><?php echo $value['nombreLocalidad']; ?></option>
                                                                                    <?php }
                                                                                    } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php  } ?>
                                                            </div>
                                                        <?php }
                                                    } else { ?>


                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>Nombre:</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Nombres" name="txtNombres" id="txtNombres">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="tel">
                                                                        <h6>Contacto (Télefono):</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Télefono" value="<?php echo session()->get("telefono_cliente") != null ? session()->get("telefono_cliente") : "" ?>" name="txtContacto" id="txtContacto" oninput="restrict(this);" minlength="1" maxlength="10">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>Calle:</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Calle" name="txtCalle" id="txtCalle">
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>#:</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Número-Casa" name="txtNum" id="txtNum">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>Código Postal:</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Código-Postal" name="txtCp" id="txtCp">
                                                                </div>
                                                            </div>

                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>Colonia:</h6>
                                                                    </label>
                                                                    <select name="txtLocalidad" id="txtLocalidad" class="form-control height-auto Colonia">

                                                                        <option value="0"></option>
                                                                        <?php if ($lista_colonias) { ?>
                                                                            <?php foreach ($lista_colonias as $key => $value) {
                                                                                $idValueLocalidad = bin2hex($encrypter->encrypt($value["idLocalidad"])); ?> ?>?>
                                                                                <option value="<?= $idValueLocalidad ?>"><?php echo $value['nombreLocalidad']; ?></option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    <?php } ?>
                                                <?php } else if (session()->get("tipo_orden") == "En sucursal") {  ?>
                                                    <h5 class="card-title">Sucursal de entrega:</h5>
                                                    <p class="card-text"><?= session()->get("nombre_cobertura") ?></p>

                                                    <?php if (session()->get("usuario_cliente") == null) { ?>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="username">
                                                                        <h6>A nombre:</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control Télefono" name="txtContacto" id="txtContacto">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <p class="card-text">A Nombre: <?= session()->get("nombre_cliente") ?></p>

                                                    <?php }  ?>
                                                <?php  } ?>

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
                                            </div>
                                        </div>

                                        <div class="card card-box">
                                            <div class="card-header" style="background-color: #222831; color:white;">
                                                Tipo de pago
                                            </div>

                                            <div class="card-body">

                                                <div class="onoffswitch2">
                                                    <input type="checkbox" name="txtTipoPago" class="onoffswitch2-checkbox" id="myonoffswitch2" checked value="<?php echo bin2hex($encrypter->encrypt("1")); ?>">
                                                    <label class="onoffswitch2-label" for="myonoffswitch2">
                                                        <span class="onoffswitch2-inner"></span>
                                                        <span class="onoffswitch2-switch"></span>
                                                    </label>
                                                </div>

                                                <div class="panelTarjeta">
                                                    <button type="button" class="btn btn-sm btn-block" style="background-color: #ccc; font-size: 19px; ">Tarjeta</button>

                                                    <div class="form-group"> <label for="username">
                                                            <h6>Titular</h6>
                                                        </label>
                                                        <input type="text" name="txtTitular" id="txtTitular" placeholder="" class="form-control Titular" minlength="1" maxlength="150">
                                                    </div>
                                                    <div class="form-group"> <label for="cardNumber">
                                                            <h6>Número de tarjeta</h6>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" name="txtNumero" id="txtNumero" class="form-control Número" placeholder="0000 0000 0000 0000" id="cr_no" minlength="1" maxlength="16" oninput="restrict(this);">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i>
                                                                    <i class="fab fa-cc-mastercard mx-1"></i>
                                                                    <i class="fab fa-cc-amex mx-1"></i>
                                                                </span>
                                                            </div>o'
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label>
                                                                    <span class="hidden-xs">
                                                                        <h6>Fecha expiración</h6>
                                                                    </span>
                                                                </label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="MM" name="txtMonth" name="txtMonth" id="txtMonth" class="form-control Mes" oninput="restrict(this);" min="1" max="12" minlength="1" maxlength="2">
                                                                    <input type="text" placeholder="YY" name="" name="txtYear" id="txtYear" class="form-control Año" oninput="restrict(this);" minlength="1" maxlength="2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group mb-4">
                                                                <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                                </label>
                                                                <input type="text" name="txtCVV" id="txtCVV" class="form-control Cvv" oninput="restrict(this);" minlength="1" maxlength="3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panelEfectivo">
                                                    <button type="button" class="btn btn-sm btn-block" style="background-color: #ccc; font-size: 19px; ">En efectivo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    $precioEnvio = 0;
                    if ($lista_cobertura) {
                        foreach ($lista_cobertura as $keyEnvio => $valueEnvio) {
                            $precioEnvio = $valueEnvio["precio"];
                            break;
                        }
                    }

                    ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6 h-100">
                        <div class="col-12 princing-item blue h-100">
                            <div class="pricing-divider text-center">
                                <h3 class="text-light">Total de pagar</h3>
                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3">
                                    <span class="h3">$</span> <?= $totalPrice + $precioEnvio ?>
                                </h4>
                                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                    <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                </svg>
                            </div>
                            <div class="card-body bg-white mt-0 shadow">
                                <button type="submit" class="btn btn-lg btn-block generalBackgroundColor   btn-custom" id="btnEnviarPago">Pagar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal_direcciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar dirección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("accion_direccion") ?>" enctype="multipart/form-data" id="frm_direccion">

                    <div class="row mt-2">
                        <div class="col-md-7"><label class="labels">Calle *</label>
                            <input type="text" class="form-control Calle" name="txtCalle" value="" maxlength="65" minlength="1">
                        </div>
                        <div class="col-md-3"><label class="labels">Número *</label>
                            <input type="text" class="form-control Número" name="txtNumero" value="" maxlength="65" minlength="1">
                        </div>
                        <div class="col-md-2"><label class="labels">Código postal *</label>
                            <input type="text" class="form-control Código-Postal" name="txtCp" value="" oninput="restrict(this);" maxlength="5" minlength="1">
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-4"><label class="labels">Estado *</label>
                            <select name="txtEstado" id="" class="form-control Estado">
                                <option value='0'></option>
                                <?php if ($lista_estados) { ?>
                                    <?php foreach ($lista_estados as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_estado) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-4"><label class="labels">Municipio *</label>
                            <select name="txtMunicipio" id="" class="form-control Municipio"></select>
                        </div>
                        <div class="col-md-4"><label class="labels">Localidad *</label>
                            <select name="txtLocalidad" id="" class="form-control Localidad"></select>
                        </div>
                    </div>

                    <div class="row  mt-2">
                        <div class="col text-center">
                            <input type="hidden" name="txtValue" id="txtValue" value="5fny20dbw-e3d">
                            <button type="submit" id="btnDireccion" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>



<script>
    $(function() {

        $(".panelTarjeta").hide();
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

        $('select[name="txtEstado"]').on("change", function() {
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/admin/obtenerEntidades",
                dataType: 'json',
                data: {
                    id_estado: $(this).val()
                },
                beforeSend: function() {
                    $(".loader").fadeIn(1000);
                },
                success: function(data) {
                    if (data.lista_municipios) {
                        $('select[name="txtMunicipio"] option').remove();
                        $('select[name="txtLocalidad"] option').remove();
                        $('select[name="txtMunicipio"]').append("<option value='0'></option>");
                        for (var i = 0; i < data.lista_municipios.length; i++) {
                            $('select[name="txtMunicipio"]').append('<option value="' + data.lista_municipios[i].id + '">' + data.lista_municipios[i].nombre + '</option>');
                        }
                    }

                    $(".loader").fadeOut(1000);

                },
                error: function(request, status, error) {
                    alert(request.responseText + " " + error);
                    $(".loader").fadeOut(1000);
                }
            });



        });

        $('select[name="txtMunicipio"]').on("change", function() {

            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/admin/obtenerEntidades",
                dataType: 'json',
                data: {
                    id_municipio: $(this).val(),
                    id_sucursal: '<?php echo $id_sucursal ?>'
                },
                beforeSend: function() {
                    $(".loader").fadeIn(1000);
                },
                success: function(data) {
                    $('select[name="txtLocalidad"] option').remove();
                    if (data.lista_localidades) {
                        $('select[name="txtLocalidad"]').append("<option value='0'></option>");
                        for (var i = 0; i < data.lista_localidades.length; i++) {
                            $('select[name="txtLocalidad"]').append('<option value="' + data.lista_localidades[i].id + '">' + data.lista_localidades[i].nombre + '</option>');
                        }

                    }

                    $(".loader").fadeOut(1000);

                },
                error: function(request, status, error) {
                    alert(request.responseText + " " + error);
                    $(".loader").fadeOut(1000);
                }
            });

        });

        $("#btnDireccion").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/accion_direccion",
                dataType: 'json',
                data: $("#frm_direccion").serialize(),
                beforeSend: function() {
                    $(".loader").fadeIn(1000);
                },
                success: function(data) {
                    $(".loader").fadeOut(1000);
                    if (data[1] == 'success') {
                        $('#txtDireccion').append($('<option>', {
                            value: data[0],
                            text: data[2]
                        }));

                        $('#txtDireccion').val(data[0]);
                        $(".loader").fadeOut(1000);

                        $("#modal_direcciones").modal("hide");

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: 'Ocurrió un error interno'
                        });
                    }
                },
                error: function(request, status, error) {
                    $(".loader").fadeOut(1000);
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: 'Ocurrió un error interno'
                    });


                }
            });
        });
    });
</script>