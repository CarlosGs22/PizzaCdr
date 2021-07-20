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
                <div class="pb-20 pt-20">
                    <div class="pd-20">
                        <h3 class="text-blue h3">
                            <button type="button" class="btn btn_add_tamanio" data-toggle="modal" data-target="#modal_tamanios" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                            <h3>
                    </div>
                    <div class="row pd-20">
                        <?php if ($lista_tamanios) {
                            foreach ($lista_tamanios as $key => $value) { ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 mb-30">
                                    <div class="card card-box">

                                        <h5 class="card-header weight-500">Estado: <?php echo ($value['status'] == '1') ? 'Activo' : 'Inactivo'; ?></h5>
                                        <div class="card-body text-center">
                                            <h5 class="card-title "><?php echo $value['tamanio']; ?></h5>

                                            <div class="row mb-30 mt-30">

                                                <div class="col-lg-12 mb-20 h-100">
                                                    <img src="<?php echo base_url("public/Admin/img/tamanios/" . $value['imagen']) ?>" alt="Tamaño" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-20 h-100">
                                                    <a href="<?php echo base_url("admin/tamanios?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</a>
                                                </div>

                                                <div class="col-6 mb-20 h-100">
                                                    <a href="<?php echo base_url("admin/tamanios?id_tamanio=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Tipo</a>
                                                </div>
                                            </div>
                                            <div class="row justify-center">
                                                <div class="col-12 mb-20 h-100">
                                                    <a href="<?php echo base_url("admin/tamanios?id_tamanio_ingrediente=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Ingredientes</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-muted">
                                            Creación: <?php echo $value['cve_fecha']; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>


                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal_tamanios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar tamanio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_tamanios") ?>" enctype="multipart/form-data" id="frm_tamanio">
                    <?php if ($lista_edit_tamanio) {
                        $mostrar_modal = 1;
                        $nombre = null;
                        $status = null;
                        $id_marca = null;
                        foreach ($lista_edit_tamanio as $key => $value) {
                            $nombre = $value['tamanio'];
                            $status = $value['status'];
                            $id_marca = $value['id'];
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
                        <label class="col-sm-12 col-md-2 col-form-label">Imagen: </label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" id="imgTamanio" name="imgTamanio" class="form-control-file form-control height-auto">

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





                    <div class="row">
                        <div class="col text-center">
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_marca; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_tipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar tamanio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nuevo</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $id_tamanio = null;
                        if ($lista_validar) {
                            $id_tamanio = $lista_validar["id_tamanio"];

                            $lista_validar = 1;

                        ?>
                            <div class="row">
                                <?php foreach ($lista_edit_tipos as $key => $value) {
                                ?>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-30">
                                        <form class="form-inline frm_tipo_tamanio" method="POST" action="<?= base_url() ?>/admin/accion_tipo_tamanio">

                                            <div class="form-group mb-2">
                                                <select name="txtTipo" readonly class="form-control-plaintext">
                                                    <?php foreach ($lista_tipos as $key2 => $value2) { ?>
                                                        <option value="<?php echo $value2['id']; ?>" <?php echo ($value2['id'] ==  $value->id_tipo) ? ' selected="selected"' : ''; ?>><?php echo $value2['tipo']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group mx-sm-3 mb-2">
                                                <input type="hidden" name="txtId" value="<?= $value->id; ?>">

                                                <input type="hidden" name="txtTamanio" value="<?= $id_tamanio ?>">
                                                <input type="text" class="form-control" name="txtPrecio" value="<?php echo $value->precio ?>" placeholder="Precio">
                                            </div>
                                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php } ?>
                        <hr style="border-color:#ff9800;">
                        <strong>Nuevos</strong>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <form class="form-inline frm_tipo_tamanio" method="POST" action="<?= base_url() ?>/admin/accion_tipo_tamanio">
                                    <div class="form-group mb-2">
                                        <select name="txtTipo" readonly class="form-control-plaintext">
                                            <?php if ($lista_tipos) foreach ($lista_tipos as $key2 => $value2) { ?>
                                                <option value="<?php echo $value2['id']; ?>"><?php echo $value2['tipo']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="hidden" name="txtTamanio" value="<?= $id_tamanio ?>">
                                        <input type="text" class="form-control" value="" name="txtPrecio" placeholder="Precio">
                                    </div>
                                    <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_ingredientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar ingredientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nuevo</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $id_tamanio_ingrediente = null;
                        if ($lista_validar_tamanio_ingrediente) {
                            $id_tamanio_ingrediente = $lista_validar_tamanio_ingrediente["id_tamanio_ingrediente"];
                            $lista_validar_tamanio_ingrediente = 1;

                        ?>
                            <div class="row">
                                <?php foreach ($lista_edit_ingredientes as $key => $value) {
                                ?>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-30">
                                        <form class="form-inline frm_tipo_tamanio" method="POST" action="<?= base_url() ?>/admin/accion_tipo_tamanio_ingrediente">
                                            <div class="form-group mb-2">
                                                <select name="txtIngrediente" readonly class="form-control-plaintext">
                                                    <option value="0"></option>
                                                    <?php if ($lista_ingredientes) {
                                                        foreach ($lista_ingredientes as $key3 => $value3) { ?>
                                                            <option value="<?php echo $value3['id']; ?>" <?php echo ($value3['id'] ==  $value->id_ingrediente) ? ' selected="selected"' : ''; ?>><?php echo $value3['ingrediente']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>

                                            <div class="form-group mx-sm-3 mb-2">
                                                <input type="hidden" name="txtId" value="<?= $value->id; ?>">
                                                <input type="hidden" name="txtIdTamanioIngrediente" value="<?php echo $id_tamanio_ingrediente; ?>">
                                                <input type="text" class="form-control" name="txtPorcion" value="<?php echo $value->porcion ?>" placeholder="Porción">
                                            </div>
                                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php } ?>
                        <hr style="border-color:#ff9800;">
                        <strong>Nuevos</strong>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <form class="form-inline frm_tipo_tamanio" method="POST" action="<?= base_url() ?>/admin/accion_tipo_tamanio_ingrediente">
                                    <div class="form-group mb-2">
                                        <select name="txtIngrediente" readonly class="form-control-plaintext">
                                            <option value="0"></option>
                                            <?php if ($lista_ingredientes) {
                                                foreach ($lista_ingredientes as $key4 => $value4) { ?>
                                                    <option value="<?php echo $value4['id']; ?>"><?php echo $value4['ingrediente']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="hidden" name="txtId" value="">
                                        <input type="hidden" name="txtIdTamanioIngrediente" value="<?php echo $id_tamanio_ingrediente; ?>">
                                        <input type="text" class="form-control" name="txtPorcion" value="" placeholder="Porción">

                                    </div>
                                    <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>
</div>

<script>
    $(function() {
        var idTamanio = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idTamanio == '1') {
            $("#modal_tamanios").modal('show');
        }

        var idValidar = <?php echo ($lista_validar == 1) ? $lista_validar : '"0"'; ?>;
        if (idValidar == '1') {
            $("#modal_tipos").modal('show');
        }

        var idValidarTamanioIngrediente = <?php echo ($lista_validar_tamanio_ingrediente == 1) ? $lista_validar_tamanio_ingrediente : '"0"'; ?>;
        if (idValidarTamanioIngrediente == '1') {
            $("#modal_ingredientes").modal('show');
        }


        $(".btn_add_btn_add_tamanio").click(function() {
            $("#frm_btn_add_tamanio input").val("");
            $("#txtStatus").val("1");
        });

        /*$(".btn_tipo_tamanio").click(function() {
            var formulario = $(this).closest(".frm_tipo_tamanio").serialize();
            $.ajax({
                type: 'POST',
                url: "",
                dataType: 'json',
                data: formulario,
                beforeSend: function() {
                    $(".loader").fadeIn(1000);
                },
                success: function(data) {
                    Swal.fire({
                        icon: data[1],
                        title: '',
                        text: data[0]
                    });
                    $(".loader").fadeOut(1000);
                },
                error: function(error, hxrt, status) {
                    alert(error);
                    $(".loader").fadeOut(1000);
                }
            });
        });*/

    });
</script>