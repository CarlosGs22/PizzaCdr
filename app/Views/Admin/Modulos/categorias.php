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
                    <button type="button" class="btn btn_add_categoria" data-toggle="modal" data-target="#modal_categorias" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

                </h3>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12">
        <div class="card-box mb-30">
            <div class="pb-20 pt-20">


                <table class="data-table table hover multiple-select-row nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus">ID</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Fecha de registro</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista_categorias) {
                            foreach ($lista_categorias as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td class="table-plus" style="width: 13%;"><img class="img-fluid imgTable" src="<?php echo base_url("public/Admin/img/categorias/" . $value['imagen']) ?>" alt="categoria"></td>
                                    <td><?php echo $value['categoria']; ?></td>
                                    <td><?php echo ($value['status'] == "1") ? "Activo" : 'Inactivo'; ?></td>
                                    <td class="table-plus"><?php echo $value['cve_fecha']; ?></td>
                                    <td><a href="<?php echo base_url("admin/categorias?id=" . $value['id']) ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</a></td>
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
<div class="modal fade" id="modal_categorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_categorias") ?>" enctype="multipart/form-data" id="frm_categoria">
                    <?php if ($lista_edit_categorias) {
                        $mostrar_modal = 1;
                        $nombre = null;
                        $status = null;
                        $id_categoria = null;
                        foreach ($lista_edit_categorias as $key => $value) {
                            $nombre = $value['categoria'];
                            $status = $value['status'];
                            $id_categoria = $value['id'];
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
                        <label class="col-sm-12 col-md-2 col-form-label">Imagen: </label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" id="imgCategoria" name="imgCategoria" class="form-control-file form-control height-auto">
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
        var idCategoria = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idCategoria == '1') {
            $("#modal_categorias").modal('show');
        }

        $(".btn_add_categoria").click(function() {
            $("#frm_categoria input").val("");
            $("#txtStatus").val("1");
        });

    });
</script>