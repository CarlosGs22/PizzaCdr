<style>
    body {
        background: #e9ecef;
    }

    .ulDireccion li:before {
        font-family: 'FontAwesome';
        content: '\2716';
        margin: 0 5px 0 -15px;
        border: 1px solid red;
        border-radius: 50%;
        padding: 3px;
        color: white;
        background-color: #e9091eb8;
    }
</style>


<?php

$encrypter = \Config\Services::encrypter();

if ($lista_micuenta) {
    foreach ($lista_micuenta as $key => $value) {
        $idHex = bin2hex($encrypter->encrypt($value["id"])); ?>

        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">

                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="<?= base_url("accion_usuarios_clientes") ?>" method="post" enctype="multipart/form-data" id="frm_cuenta">

                        <div class="row">
                            <div class="col-md-6 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <?php if ($value["imagen"] == null) { ?>
                                        <img class="rounded-circle mt-5" src="<?= base_url("public/Publico/img/clientes/clientepic.png") ?>" style="max-width: 144px;">
                                    <?php } else { ?>
                                        <img class="rounded-circle mt-5" src="<?= base_url("public/Publico/img/clientes/" . $value["imagen"]) ?>" style="max-width: 144px;">
                                    <?php  } ?>
                                    <input type="file" name="txtImagen" class="form-control imagen">

                                    <span class="font-weight-bold"><?= $value["nombres"] ?></span>
                                    <span class="text-black-50"><?= $value["usuario"] ?></span>
                                    <span class="text-black-50"><a href="">Cambiar contraseña</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Mi cuenta</h4>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Nombres</label>
                                            <input type="text" class="form-control Nombres" name="txtNombre" value="<?= $value["nombres"] ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Apellido paterno</label>
                                            <input type="text" class="form-control Apellido-Paterno" name="txtApe1" value="<?= $value["apellido_paterno"] ?>">
                                        </div>
                                        <div class="col-md-6"><label class="labels">Apellido materno</label>
                                            <input type="text" class="form-control Apellido Materno" name="txtApe2" value="<?= $value["apellido_materno"] ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Usuario</label>
                                            <input type="text" class="form-control" name="txtUsuario" value="<?= $value["usuario"] ?>">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <input type="hidden" name="txtHex" value="<?= $idHex ?>">
                                        <button type="submit" id="btnGuardarCuenta" class="btn btnForm mb-2">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center experience">
                                    <h4 class="text-right">Mis direcciones</h4>

                                    <button class="border px-3 p-1 add-experience btn_add_direccion btn-primary" data-toggle="modal" data-target="#modal_direcciones">
                                        <i class="fa fa-plus"></i>
                                        &nbsp; Nueva</button>
                                </div><br>
                                <div class="col-md-12">
                                    <ul class="list-group ulDireccion">
                                        <?php if ($lista_direcciones) {
                                            foreach ($lista_direcciones as $key => $value) {
                                                $idDireccion = bin2hex($encrypter->encrypt($value["idDireccion"])); ?>
                                                <a href="<?= base_url("accion_direcciones/" . $idDireccion) ?>">
                                                    <li class="list-group-item">
                                                        <?= $value["calle"] . " #" . $value["numero"] . ", " . " " . $value["codigo_postal"]
                                                        ?>
                                                        <br>
                                                        <?= $value["nombreLocalidad"]  . ", " . $value["nombreEstado"]
                                                        ?>
                                                    </li>
                                                </a>
                                            <?php }
                                        } else { ?>

                                        <?php
                                            echo "Aún no tiene direcciones registradas";
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>

        </div>
<?php  }
} ?>

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
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_categoria; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(function() {

        $("#frm_cuenta").submit(function(e) {
            e.preventDefault();
            var valid = false;

            if ($("#txtImagen").val() == null || $("#txtImagen").val() == "") {
                $("#txtImagen").remove();
            }

            if (validacionInput("frm_cuenta")) {
                if (validacionSelect("frm_cuenta")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
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


        $("#frm_direccion").submit(function(e) {
            e.preventDefault();
            var valid = false;


            if (validacionInput("frm_direccion")) {
                if (validacionSelect("frm_direccion")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
        });


    });
</script>