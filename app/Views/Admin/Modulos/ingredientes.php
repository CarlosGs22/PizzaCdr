<div class="xs-pd-20-10 pd-ltr-20">
    <div class="page-header">
        <div class="row">
            <div class="col-6 col-md-6 col-sm-6">
                <div class="title">
                    <h4>compras</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a>admin</a></li>
                        <li class="breadcrumb-item"><a>compras</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 col-md-6 col-sm-6 text-right">
                <h3 class="text-blue h3">
                    <button type="button" class="btn btn_add_menu" data-toggle="modal" data-target="#modal_ingrediente" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

                </h3>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ingredientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Menús</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card-box mb-30">
                        <div class="pb-20 pt-20">


                            <table class="data-table table  nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus">ID</th>
                                        <th>Ingrediente</th>
                                        <th>Status</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($lista_ingredientes) {
                                        foreach ($lista_ingredientes as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td class="table-plus"><?php echo $value['ingrediente']; ?></td>
                                                <td><?php echo ($value['status'] == "1") ? "Activo" : 'Inactivo'; ?></td>
                                                <td><a href="<?php echo base_url("admin/ingredientes?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</a></td>
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
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card-box mb-30">
                        <div class="pb-20 pt-20">
                            <div class="pd-20">
                                <h3 class="text-blue h3">
                                    <button type="button" class="btn btn_add_menu" data-toggle="modal" data-target="#modal_menu" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                                    <h3>

                            </div>

                            <table class="data-table table hover multiple-select-row nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus">ID</th>
                                        <th>Menu</th>
                                        <th>Status</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($lista_menu) {
                                        foreach ($lista_menu as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value['id']; ?></td>
                                                <td><?php echo $value['nombre']; ?></td>
                                                <td><?php echo ($value['status'] == "1") ? "Activo" : 'Inactivo'; ?></td>
                                                <td><a href="<?php echo base_url("admin/ingredientes?idMenu=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</a> <a href="<?php echo base_url("admin/ingredientes?idMenuIng=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Ingredientes</a></td>

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

    </div>

</div>

<div class="modal fade" id="modal_ingrediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar ingrediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_ingredientes") ?>" enctype="multipart/form-data" id="frm_categoria">
                    <?php if ($lista_edit_ingredientes) {
                        $mostrar_modal = 1;
                        $nombre = null;
                        $status = null;
                        $id_ingrediente = null;
                        foreach ($lista_edit_ingredientes as $key => $value) {
                            $nombre = $value['ingrediente'];
                            $status = $value['status'];
                            $id_ingrediente = $value['id'];
                            break;
                        }
                    } ?>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nombre: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtIngrediente" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtIngrediente">
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
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_ingrediente; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_menu") ?>" enctype="multipart/form-data" id="frm_categoria">
                    <?php if ($lista_edit_menu) {
                        $mostrar_modal_menu = 1;
                        $nombre = null;
                        $status = null;
                        $id_menu = null;
                        foreach ($lista_edit_menu as $key => $value) {
                            $nombre = $value['nombre'];
                            $status = $value['status'];
                            $id_menu = $value['id'];
                            break;
                        }
                    } ?>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nombre: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
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
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_menu; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_menu_ingredientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar ingredientes - menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php if ($lista_ingredientes) {
                        $idMenu = null;

                        if ($lista_validar_ing) {
                            $mostrar_modal_menu_ingredientes = 1;
                            $idMenu = $lista_validar_ing["idMenuIng"];
                        }

                        $idIngrediente;
                        $id_sub;
                        $arreglo = array();

                        if ($lista_menu_ingrediente) {


                            foreach ($lista_menu_ingrediente as $key => $value) {
                                $idIngrediente = $value["idIngrediente"];
                                array_push($arreglo, $idIngrediente);
                            }
                        }

                        if ($lista_ingredientes) {

                            foreach ($lista_ingredientes as $key2 => $value2) {
                                $id_sub =  $value2["id"];
                                $ingrediente = $value2["ingrediente"];

                                if (in_array($id_sub, $arreglo)) { ?>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline"> <input class="form-check-input checkIngredientes" checked type="checkbox" id="<?php echo $value2["id"]; ?>" value="<?php echo $value2["id"]; ?>"> <label class="form-check-label" for="inlineCheckbox1"><?php echo $value2["ingrediente"]; ?></label> </div>
                                    </div>

                                <?php } else { ?>
                                    <div class="col-3">
                                        <div class="form-check form-check-inline"> <input class="form-check-input checkIngredientes" type="checkbox" id="<?php echo $value2["id"]; ?>" value="<?php echo $value2["id"]; ?>"> <label class="form-check-label" for="inlineCheckbox1"><?php echo $value2["ingrediente"]; ?></label> </div>
                                    </div>
                    <?php }
                            }
                        }
                    } ?>




                </div>


            </div>

        </div>
    </div>
</div>

<script>
    $(function() {

        var idMenu = <?php echo ($mostrar_modal_menu == 1) ? $mostrar_modal_menu : '"0"'; ?>;
        if (idMenu == '1') {
            $("#modal_menu").modal('show');
        }

        var idIngrediente = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idIngrediente == '1') {
            $("#modal_ingrediente").modal('show');
        }

        var idIngrediente_menu = <?php echo ($mostrar_modal_menu_ingredientes == 1) ? $mostrar_modal_menu_ingredientes : '"0"'; ?>;
        if (idIngrediente_menu == '1') {
            $("#modal_menu_ingredientes").modal('show');
        }

        $(document).delegate(".checkIngredientes", "click", function(e) {
            var opcion = null;
            if ($(this).is(':checked')) {
                opcion = "0";
            } else {
                opcion = "1";
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/admin/accion_ingredientes_menu",
                dataType: 'json',
                data: {
                    opcion: opcion,
                    id_menu: "<?= $idMenu ?>",
                    id_ingrediente: $(this).val()
                },
                beforeSend: function() {
                    $(".loader").fadeIn(1000);
                },
                success: function(data) {
                    $(".loader").fadeOut(1000);
                    Swal.fire({
                        icon: '' + data[1] + '',
                        title: '',
                        text: '' + data[0] + ''
                    });
                },
                error: function(request, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: '',
                        text: '' + request + ''
                    });
                    $(".loader").fadeOut(1000);
                }
            });
        });
    });
</script>