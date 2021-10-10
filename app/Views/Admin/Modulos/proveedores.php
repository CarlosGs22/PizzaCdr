<div class="xs-pd-20-10 pd-ltr-20">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
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
                <div class="pd-20">
                    <h3 class="text-blue h3">
                        <button type="button" class="btn btn_add_categoria" data-toggle="modal" data-target="#modal_ingredientes" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                        <h3>

                </div>
                <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Id</th>
                                <th>Nombre</th>
                                <th>Razón social</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Status</th>
                                <th>Fecha registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($lista_proveedores) {
                                foreach ($lista_proveedores as $key => $value) {
                            ?>
                                    <tr data-toggle="popover" data-trigger="focus" data-placement="right" id="<?php echo $value["id"]; ?>">
                                        <td class="table-plus"><?php echo $value["id"]; ?></td>
                                        <td><?php echo $value["nombre"]; ?></td>
                                        <td><?php echo $value["razon_social"]; ?></td>
                                        <td><?php echo $value["telefono"]; ?></td>
                                        <td><?php echo $value["direccion"]; ?></td>
                                        <td><?php echo $value["correo"]; ?></td>
                                        <td><?php echo ($value["status"] == "1") ? "Activo" : "Inactivo"; ?></td>
                                        <td><?php echo $value["cve_fecha"]; ?></td>
                                    </tr>
                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modal_ingredientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_proveedores") ?>" enctype="multipart/form-data" id="frm_ingrediente">
                    <?php if ($lista_edit_proveedores) {
                        $mostrar_modal = 1;
                        $nombre = null;
                        $razon = null;
                        $telefono = null;
                        $direecion = null;
                        $correo = null;
                        $status = null;
                        $id_proveedor = null;
                        foreach ($lista_edit_proveedores as $key => $value) {
                            $nombre = $value['nombre'];
                            $razon = $value['razon_social'];
                            $telefono = $value['telefono'];
                            $direecion = $value['direccion'];
                            $correo = $value['correo'];
                            $status = $value['status'];
                            $id_proveedor = $value['id'];
                            break;
                        }
                    } ?>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nombre: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Razón social: </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtRazon" value="<?php echo ($razon) ? $razon : ''; ?>" name="txtRazon">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Telefono: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtTelefono" value="<?php echo ($telefono) ? $telefono : ''; ?>" name="txtTelefono">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Dirección: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtDireccion" value="<?php echo ($direecion) ? $direecion : ''; ?>" name="txtDireccion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Correo: </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtCorreo" value="<?php echo ($correo) ? $correo : ''; ?>" name="txtCorreo">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Status: </label>
                        <div class="col-sm-12 col-md-10">
                            <select name="txtStatus" id="txtStatus" class=" form-control height-auto">

                                <option value="0"></option>
                                <?php if ($lista_status) { ?>
                                    <?php foreach ($lista_status as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $status) ? ' selected="selected"' : ''; ?>><?php echo $value['status']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_proveedor; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div id="a02" style="display: none;">
    <a href="" class="enlaceProveedor">Editar</a>
</div>

<script>
    $(function() {
        var idIngrediente = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idIngrediente == '1') {
            $("#modal_ingredientes").modal('show');
        }

        $(".btn_add_categoria").click(function() {
            $("#frm_categoria input").val("");
            $("#txtStatus").val("1");
        });

        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                $('.enlaceProveedor').attr('href', '<?php echo base_url('admin/proveedores?id='); ?>' + $(this).attr("id"));
                return $('#a02').html();
            },
            title: 'Acción',
        }).click(function() {
            $(this).popover('show');
        });

    });
</script>

