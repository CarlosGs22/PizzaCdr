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


    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
                <div class="pb-20 pt-20">

                    <?php if ($lista_micuenta) {
                        $mostrar_modal = 1;
                        $nombres = null;
                        $apellido_paterno = null;
                        $apellido_materno = null;
                        $usuario  = null;
                        $imagen = null;
                        $contrasenia = null;

                        

                        foreach ($lista_micuenta as $key => $value) {
                            $nombres = $value['nombres'];
                            $apellido_paterno = $value['apellido_paterno'];
                            $apellido_materno = $value['apellido_materno'];
                            $usuario = $value['usuario'];
                            $contrasenia = $value['contrasenia'];
                            $imagen  = $value["imagen"];
        
                            break;
                        }
                    } ?>

                    <div class="container bootstrap snippet">
                        <form method="post" action="<?php echo base_url("admin/accion_micuenta") ?>" enctype="multipart/form-data" id="frm_micuenta">

                            <div class="row">

                                <div class="col-sm-3">

                                    <div class="text-center">
                                        <?php if ($imagen != null || $imagen = "") { ?>
                                            <img style="height: 180px;" class="avatar img-circle img-thumbnail" src="<?= base_url("public/Admin/img/usuarios/" . $imagen) ?>" alt="">
                                        <?php } else { ?>
                                            <img style="height: 180px;" class="avatar img-circle img-thumbnail" src="<?= base_url("public/Admin/img/productos/warning.png") ?>" alt="">

                                        <?php }  ?>

                                        <h6>Nueva fotografía</h6>
                                        <input type="file" id="imgFoto" name="imgFoto" class="form-control-file form-control height-auto archivo" accept=".jpg, .jpeg, .png">
                                    </div>

                                </div>
                                <!--/col-3-->
                                <div class="col-sm-9">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <hr>


                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Nombres: *</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control nombres" type="text" id="txtNombres" value="<?php echo ($nombres) ? $nombres : ''; ?>" name="txtNombre">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Apellido paterno: *</label>
                                                <div class="col-sm-12 col-md-4">
                                                    <input class="form-control apellido_paterno" type="text" id="txApe1" value="<?php echo ($apellido_paterno) ? $apellido_paterno : ''; ?>" name="txtApe1">
                                                </div>

                                                <label class="col-sm-12 col-md-2 col-form-label">Apellido materno: *</label>
                                                <div class="col-sm-12 col-md-4">
                                                    <input class="form-control apellido_materno" type="text" id="txtApe2" value="<?php echo ($apellido_materno) ? $apellido_materno : ''; ?>" name="txtApe2">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Usuario: *</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control usuario" type="text" id="txtUsuario" value="<?php echo ($usuario) ? $usuario : ''; ?>" name="txtUsuario">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Contraseña: *</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control contraseña" type="password" id="txtContrasenia" value="<?php echo ($contrasenia) ? $contrasenia : ''; ?>" name="txtContrasenia">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <!--/tab-pane-->
                                </div>


                                <!--/tab-content-->

                            </div>
                        </form>
                        <!--/col-9-->
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


<script>
    $(function() {

        $("#frm_micuenta").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_micuenta")) {
                if (validacionSelect("frm_micuenta")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
        });

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("#imgFoto").on('change', function() {
            readURL(this);
        });


    });
</script>