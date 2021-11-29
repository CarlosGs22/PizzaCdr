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
                    <button type="button" class="btn btn_add_usuario" data-toggle="modal" data-target="#modal_usuarios" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" action="<?php echo base_url("admin/usuarios") ?>" accept-charset="UTF-8" method="get">
                                        <div class="flex-fill mr-2">
                                            <input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Nombres, Usuario" class="form-control w-100" required>
                                        </div>
                                        <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="pb-20 pt-20">

                    <div class="row pd-20">
                        <?php if ($lista_usuarios) {
                            foreach ($lista_usuarios as $key => $value) { ?>
                                <div class="col-md-3 col-lg-3 col-sm-6 col-12">
                                    <article class="material-card Red">
                                        <h2>
                                            <strong>
                                                <a class="text-white enlaceUsuario" href="<?php echo base_url("admin/usuarios?id=" . $value["id"]) ?>"><i class="fa fa-edit"></i>
                                                    <?php echo $value["usuario"]; ?></a>
                                            </strong>
                                        </h2>
                                        <div class="mc-content">
                                            <div class="img-container">
                                                <img class="img-fluid w-100 h-100" src="<?php echo base_url("public/Admin/img/usuarios/" . $value["imagen"]); ?>">
                                            </div>
                                            <div class="mc-description">
                                                <strong> Nombre:</strong>
                                                </br>
                                                <?php echo $value["nombres"]; ?>
                                                </br>
                                                <?php echo $value["apellido_paterno"] . " " . $value["apellido_materno"]; ?>
                                            </div>
                                        </div>
                                        <a class="mc-btn-action cool-background">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <div class="mc-footer">
                                            <h4>
                                                Creación
                                            </h4>
                                            <?php echo $value["cve_fecha"]; ?>

                                        </div>
                                    </article>
                                </div>
                            <?php }
                        } else { ?>


                            <div class="col-12 text-center">
                                <p class="dataTables_empty">No hay resultados para mostrar</p>

                            </div>



                        <?php  } ?>
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


    <div class="modal fade" id="modal_usuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url("admin/accion_usuarios") ?>" enctype="multipart/form-data" id="frm_tamanio">
                        <?php if ($lista_edit_usuarios) {
                            $mostrar_modal = 1;
                            $nombres = null;
                            $apellido_paterno = null;
                            $apellido_materno = null;
                            $usuario  = null;
                            $contrasenia = null;
                            $status = null;
                            $id_sucursal = null;
                            $id = null;

                            foreach ($lista_edit_usuarios as $key => $value) {
                                $nombres = $value['nombres'];
                                $apellido_paterno = $value['apellido_paterno'];
                                $apellido_materno = $value['apellido_materno'];
                                $usuario = $value['usuario'];
                                $contrasenia = $value['contrasenia'];
                                $status = $value['status'];
                                $id_usuario = $value['id'];
                                $id_sucursal = $value['id_sucursal'];
                                break;
                            }
                        } ?>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nombres: *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" id="txtNombres" value="<?php echo ($nombres) ? $nombres : ''; ?>" name="txtNombre">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Apellido paterno: *</label>
                            <div class="col-sm-12 col-md-4">
                                <input class="form-control" type="text" id="txApe1" value="<?php echo ($apellido_paterno) ? $apellido_paterno : ''; ?>" name="txtApe1">
                            </div>

                            <label class="col-sm-12 col-md-2 col-form-label">Apellido materno: *</label>
                            <div class="col-sm-12 col-md-4">
                                <input class="form-control" type="text" id="txtApe2" value="<?php echo ($apellido_materno) ? $apellido_materno : ''; ?>" name="txtApe2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Usuario: *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" id="txtUsuario" value="<?php echo ($usuario) ? $usuario : ''; ?>" name="txtUsuario">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Contraseña: *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="password" id="txtContrasenia" value="<?php echo ($contrasenia) ? $contrasenia : ''; ?>" name="txtContrasenia">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status: *</label>
                            <div class="col-sm-12 col-md-10">
                                <select name="txtStatus" id="txtStatus" class="form-control">
                                    <option value="0"></option>
                                    <?php if ($lista_status) { ?>
                                        <?php foreach ($lista_status as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $status) ? ' selected="selected"' : ''; ?>><?php echo $value['status']; ?></option>
                                    <?php }
                                    } ?>

                                </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Sucursal: *</label>
                            <div class="col-sm-12 col-md-10">
                                <select name="txtSucursal" id="txtSucursal" class="form-control">
                                    <option value="0"></option>
                                    <?php if ($lista_sucursales) { ?>
                                        <?php foreach ($lista_sucursales as $key => $value) { ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Imagen: </label>
                            <div class="col-sm-12 col-md-10">
                                <input type="file" id="imgUsuario" name="imgUsuario" class="form-control-file form-control height-auto">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <input type="hidden" name="txTipoUsuario" value="0x4R_q1lkdn*3Bd2qsd!&fc">
                                <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_usuario; ?>">
                                <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


</div>

<script>
    $(function() {
        var idUsuario = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idUsuario == '1') {
            $("#modal_usuarios").modal('show');
        }

    });
</script>