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
                    <button type="button" class="btn btn_add_proveedores" data-toggle="modal" data-target="#modal_proveedores" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

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
                                        <form class="form-inline" action="<?php echo base_url("admin/proveedores") ?>" accept-charset="UTF-8" method="get">
                                            <div class="flex-fill mr-2">
                                                <input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Nombre" class="form-control w-100" required>
                                            </div>
                                            <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pb-20 pt-20">
                        <table class="table tablaDatatable  dt-responsive nowrap" style="width:100%">

                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Id</th>
                                    <th>Nombre</th>
                                    <th>Razón social</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>

                                    <th>Status</th>
                                    <th>Fecha registro</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($lista_proveedores) {
                                    foreach ($lista_proveedores as $key => $value) {
                                ?>
                                        <tr data-toggle="popover" data-trigger="focus" data-placement="right" id="<?php echo $value["id"]; ?>">
                                            <td class="table-plus"><?php echo $value["id"]; ?></td>
                                            <td><?php echo $value["nombre"] . " " . $value["apellido_paterno"]; ?></td>
                                            <td><?php echo $value["razon_social"]; ?></td>
                                            <td><?php echo $value["telefono"]; ?></td>
                                            <td><?php echo $value["direccion"]; ?></td>

                                            <td><?php echo ($value["status"] == "1") ? "Activo" : "Inactivo"; ?></td>
                                            <td><?php echo $value["cve_fecha"]; ?></td>
                                            <td><a href="<?php echo base_url("admin/proveedores?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</a></td>
                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                        </table>
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
    </div>
    <div class="modal fade" id="modal_proveedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url("admin/accion_proveedores") ?>" enctype="multipart/form-data" id="frm_proveedor">
                        <?php if ($lista_edit_proveedores) {
                            $mostrar_modal = 1;
                            $nombre = null;
                            $apellido_paterno = null;
                            $apellido_materno = null;
                            $razon = null;
                            $telefono = null;
                            $direecion = null;
                            $correo = null;
                            $status = null;
                            $id_proveedor = null;
                            foreach ($lista_edit_proveedores as $key => $value) {
                                $nombre = $value['nombre'];
                                $apellido_paterno = $value['apellido_paterno'];
                                $apellido_materno = $value['apellido_materno'];
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
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control nombre" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
                            </div>

                            <label class="col-sm-12 col-md-2 col-form-label">Apellido paterno: *</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control apellido-paterno" type="text" id="txtApe1" value="<?php echo ($apellido_paterno) ? $apellido_paterno : ''; ?>" name="txtApe1">
                            </div>

                            <label class="col-sm-12 col-md-2 col-form-label">Apellido materno *</label>
                            <div class="col-sm-12 col-md-2">
                                <input class="form-control apellido-materno" type="text" id="txtApe2" value="<?php echo ($apellido_materno) ? $apellido_materno : ''; ?>" name="txtApe2">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Telefono: *</label>
                            <div class="col-sm-12 col-md-4">
                                <input class="form-control teléfono" type="text" id="txtTelefono" value="<?php echo ($telefono) ? $telefono : ''; ?>" name="txtTelefono">
                            </div>
                            

                            <label class="col-sm-12 col-md-2 text-center col-form-label">Correo: </label>
                            <div class="col-sm-12 col-md-4">
                                <input class="form-control correo" type="text" id="txtCorreo" value="<?php echo ($correo) ? $correo : '0'; ?>" name="txtCorreo">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Razón social: </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control razon-social" type="text" id="txtRazon" value="<?php echo ($razon) ? $razon : '0'; ?>" name="txtRazon">
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Dirección: *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control dirección" type="text" id="txtDireccion" value="<?php echo ($direecion) ? $direecion : ''; ?>" name="txtDireccion">
                            </div>
                        </div>

          
                        <div class=" form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status: </label>
                            <div class="col-sm-12 col-md-10">
                                <select name="txtStatus" id="txtStatus" class=" form-control height-auto status">

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

        
        var idProveedor = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idProveedor == '1' || localStorage.getItem("opcionBtn") === '1') {
            localStorage.removeItem("opcionBtn");
            $("#modal_proveedores").modal('show');
        }

        $(".btn_add_proveedores").click(function() {
            if (idProveedor == '1') {
                localStorage.setItem("opcionBtn", "1");
                window.location.href = "<?php echo base_url("admin/proveedores"); ?>";
            }
        });

        $("#frm_proveedor").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_proveedor")) {
                if (validacionSelect("frm_proveedor")) {
                    valid = true;
                }
            }

            if (valid) this.submit();
        });

    });
</script>