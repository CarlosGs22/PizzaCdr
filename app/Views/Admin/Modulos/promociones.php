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
                            <button type="button" class="btn btn_add_promocion" data-toggle="modal" data-target="#modal_promociones" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                            <h3>

                    </div>



                    <div class="row pd-20">
                        <?php if ($lista_promociones) {
                            foreach ($lista_promociones as $key => $value) { ?>
                                <ul class="col-12 col-lg-4 col-md-6 col-sm-12">
                                    <li>
                                        <div class="contact-directory-box">
                                            <div class="contact-dire-info text-center">
                                                <div class="contact-avatar">
                                                    <span>
                                                        <img style="border-radius: 0;" class="img-fluid" src="<?php echo base_url("public/Admin/img/promociones/" . $value['imagen']) ?>" alt="Promoción">
                                                    </span>
                                                </div>
                                                <div class="contact-name">
                                                    <h4><?php echo $value['nombre'] ?></h4>

                                                    <div class=" text-success"><span class="ti-money"></span><?php echo $value['precio'] ?></div>
                                                </div>

                                                <div class="profile-sort-desc">
                                                    <?php echo $value['descripcion'] ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="view-contact-1">
                                                        <a href="<?php echo base_url("admin/promociones?id=" . $value['id']) ?>"><i class="fa fa-edit"></i>Editar</a>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="view-contact-2">
                                                        <a href="<?php echo base_url("admin/promociones?idPromocion=" . $value['id']) ?>" class="btnRegProd"><i class="fa fa-edit"></i>Productos</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        <?php }
                        }  ?>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center paginacionCI">
                            <?php if ($pager) : ?>
                                <?= $pager->links() ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal_promociones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar promoción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url("admin/accion_promociones") ?>" enctype="multipart/form-data" id="frm_categoria">
                    <?php if ($lista_edit_promociones) {
                        $mostrar_modal = 1;
                        $nombre = null;
                        $descripcion = null;
                        $precio = null;
                        $status = null;

                        $id_promocion = null;
                        foreach ($lista_edit_promociones as $key => $value) {
                            $nombre = $value['nombre'];
                            $descripcion =  $value['descripcion'];
                            $precio =  $value['precio'];
                            $dia =  $value['dia'];
                            $fecha =  $value['fecha'];
                            $status =  $value['status'];

                            $id_promocion =  $value['id'];
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
                        <label class="col-sm-12 col-md-2 col-form-label">Descripción: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtDescripcion" value="<?php echo ($descripcion) ? $descripcion : ''; ?>" name="txtDescripcion">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Imagen: </label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" id="imgPromocion" name="imgPromocion" class="form-control-file form-control height-auto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Precio: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="txtPrecio" value="<?php echo ($precio) ? $precio : '0'; ?>" name="txtPrecio">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Dia: *</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" id="txtDia" value="<?php echo ($dia) ? $dia : ''; ?>" name="txtDia">
                        </div>

                        <label class="col-sm-12 col-md-2 col-form-label">Fecha: *</label>
                        <div class="col-sm-12 col-md-4">
                            <input class="form-control" type="text" id="txtDia" value="<?php echo ($dia) ? $dia : ''; ?>" name="txtDia">
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
                        <div class="col-12 text-center">
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_promocion; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_promociones_tamanios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar promoción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-blue active" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Nuevo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-blue" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Listado</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home5" role="tabpanel">
                            <div class="pd-20">

                                <form method="post" action="<?php echo base_url("admin/accion_productos_promociones") ?>" enctype="multipart/form-data" id="frm_categoria">
                                    <?php if ($lista_edit_promociones_tamanio) {
                                        $mostrar_modal_tamanio = 1;
                                        $idPromocion = $lista_edit_promociones_tamanio['idPromocion'];
                                    } ?>

                                    <div class="form-group row" id="">
                                        <label class="col-sm-12 col-md-4 col-form-label">Cantidad de productos: </label>
                                        <div class="col-sm-12 col-md-8">
                                            <select name="txtCantidad" id="txtCantidad" class=" form-control height-auto">
                                                <option value="0"></option>
                                                <?php for ($i = 1; $i < 101; $i++) {  ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="" id="panelCantidad">

                                    </div>


                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <input type="hidden" name="txtIdR" id="txtIdR" value="<?= $idPromocion ?>">
                                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile5" role="tabpanel">
                            <div class="pd-20">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Tamaño</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Acción</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($lista_promo_tama) {
                                                foreach ($lista_promo_tama as $key => $value) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $value['idPromoTama'] ?></th>
                                                        <td><?= $value['tamanio'] ?></td>
                                                        <td><?= $value['tipo'] ?></td>
                                                        <td><a href="<?= base_url("admin/promociones?idPromoTama=").$value["idPromoTama"]."&idPromo=".$idPromocion ?>" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Borrar</a></td>

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
    </div>
</div>

<script>
    $(function() {
        var idPromocion = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idPromocion == '1') {
            $("#modal_promociones").modal('show');
        }

        var idPromocionTamanio = <?php echo ($mostrar_modal_tamanio == 1) ? $mostrar_modal_tamanio : '"0"'; ?>;
        if (idPromocionTamanio == '1') {
            $("#modal_promociones_tamanios").modal('show');
        }


        $(".btn_add_promocion").click(function() {
            $("#frm_promocion input").val("");
            $("#txtStatus").val("1");
        });


        $(".btnRegProd").click(function() {
            $('#txtIdR').val($(this).attr('id'));
        });


        $("#txtCantidad").on('change', function() {
            var cantidad = $(this).val();

            $(".panelListado").remove();
            $(".txtValor option").remove();
            fetch('<?php echo base_url("admin/promociones/consultaTamanio") ?>')
                .then((response) => {
                    return response.json()
                })
                .then((data) => {
                    if (data.lista_tamanios) {
                        for (let index = 0; index < cantidad; index++) {
                            $("#panelCantidad").append('<div class="form-group row panelListado"><label class="col-sm-12 col-md-3 col-form-label">Tamaños : </label><div class="col-sm-12 col-md-6"><select name="txtValor-' + index + '" class="txtValor form-control height-auto"><option value="0"></option> </select></div></div>');
                            $(".txtValor option").remove();

                            for (let index = 0; index < data.lista_tamanios.length; index++) {
                                const id_tipo_tamanio = data.lista_tamanios[index].id_tipo_tamanio;
                                const tipo = data.lista_tamanios[index].tipo;
                                const tamanio = data.lista_tamanios[index].tamanio;

                                $(".txtValor").append('<option value="' + id_tipo_tamanio + '">' + tipo + ' (' + tamanio + ') </option>');

                            }

                        }

                    }

                })
                .catch((err) => {
                    alert(err);
                });


        });



    });
</script>