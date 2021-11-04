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
                    <button type="button" class="btn btn_add_producto" data-toggle="modal" data-target="#modal_productos" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

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
                                    <form class="form-inline" action="<?php echo base_url("admin/productos") ?>" accept-charset="UTF-8" method="get">
                                        <div class="flex-fill mr-2">
                                            <input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Nombre, Descripción , Masa, Clasificación, Categoria" class="form-control w-100" required>
                                        </div>
                                        <button type="submit" class="btn btn-success"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="pb-20">

                    <div class="row pr-20 pl-20">
                        <?php
                        $mostrar_modal_imagen;

                        if ($lista_validar_imagen) {
                            $mostrar_modal_imagen = 1;
                        }


                        if ($lista_productos) {
                            foreach ($lista_productos as $key => $value) {
                        ?>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 pb-20">
                                    <div class="card-box pricing-card card mt-30  h-100 cardProductos">
                                        <div class="price-title textoTipo divText">
                                            <?= $value["nombreMenu"]; ?> <i class="icon-copy fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="pricing-icon">
                                            <div class="da-card card h-100" style="margin-left: 7%; margin-right:7%; border:none">
                                                <div class="da-card-photo ">
                                                    <?php if ($value['imagen'] != null || $value['imagen'] = "") { ?>
                                                        <img style="height: 180px;" src="<?= base_url("public/Admin/img/productos/" . $value['imagen']) ?>" alt="">
                                                    <?php } else { ?>
                                                        <img style="height: 180px;" src="<?= base_url("public/Admin/img/productos/warning.png") ?>" alt="">


                                                    <?php }  ?>

                                                    <div class="da-overlay">
                                                        <div class="da-social">
                                                            <ul class="clearfix">
                                                                <li><a href="<?php echo base_url("admin/productos?idImagenProducto=" . $value["idProducto"]) ?>"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="text textoNombre divText">
                                            <?= $value["nombre"]; ?>
                                        </div>

                                        <div class="text textoNombre">
                                            <strong>Fecha creación <br><?= $value["cve_fecha"]; ?></strong>
                                        </div>

                                        <div class="cta">
                                            <p class="btn btn-rounded btn-lg data-bgcolor=" #f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><a href="<?php echo base_url("admin/productos?id=" . $value["idProducto"]) ?>" class="text-white"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>

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


</div>
<div class="modal fade" id="modal_productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($lista_edit_productos) {

                    $mostrar_modal = 1;
                    $nombre = null;
                    $descripcion = null;
                    $status = null;
                    $id_masa = null;
                    $id_categoria = null;
                    $id_menu = null;
                    $id_clasificacion = null;
                    $id_tipo = null;
                    $total = null;
                    $id_tamanio = null;
                    foreach ($lista_edit_productos as $key => $value) {
                        $id_producto = $value['idProducto'];
                        $nombre = $value['nombre'];
                        $descripcion = $value['descripcion'];
                        $status = $value['status'];
                        $id_categoria = $value['idCategoria'];
                        $precio = $value['precioProducto'];
                        $id_tipo = $value['idTipoTamanio'];
                        $id_masa = $value['idMasa'];
                        $id_menu = $value['idMenu'];
                        $id_clasificacion = $value['idClasificacion'];
                        $total = $value['total'];
                        $id_tipo_tamanio = $value['idTamanio'];

                        break;
                    }
                } ?>
                <form method="post" action="<?php echo base_url("admin/accion_productos") ?>" enctype="multipart/form-data" id="frm_producto">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nombre: *</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control nombre" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Descripción: *</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control descripcion" id="txtDescripcion" name="txtDescripcion">
                                <?php echo ($descripcion) ? $descripcion : ''; ?>
                            </textarea>

                        </div>
                        <label class="col-sm-12 col-md-1 col-form-label">Precio: *</label>
                        <div class="col-sm-12 col-md-2">
                            <input class="form-control precio" type="text" id="txtPrecio" value="<?php echo ($precio) ? $precio : '0'; ?>" name="txtPrecio">
                        </div>
                    </div>


                    <div class=" form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Status: </label>
                        <div class="col-sm-12 col-md-4">
                            <select name="txtStatus" id="txtStatus" class="form-control height-auto status">

                                <option value="0"></option>
                                <?php if ($lista_status) { ?>
                                    <?php foreach ($lista_status as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $status) ? ' selected="selected"' : ''; ?>><?php echo $value['status']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>

                        <label class="col-sm-12 col-md-2 col-form-label">Menú: </label>
                        <div class="col-sm-12 col-md-4">
                            <select name="txtMenu" id="txtMenu" class=" form-control height-auto menu">

                                <option value="0"></option>
                                <?php if ($lista_menu) { ?>
                                    <?php foreach ($lista_menu as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_menu) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>


                    </div>



                    <div class=" form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Masa: </label>
                        <div class="col-sm-12 col-md-4">
                            <select name="txtMasa" id="txtMasa" class="form-control height-auto masa">
                                <option value="0"></option>
                                <?php if ($lista_masas) { ?>
                                    <?php foreach ($lista_masas as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_masa) ? ' selected="selected"' : ''; ?>><?php echo $value['masa']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>

                        <label class="col-sm-12 col-md-2 col-form-label">Categoria: </label>
                        <div class="col-sm-12 col-md-4">
                            <select name="txtCategoria" id="txtCategoria" class="form-control height-auto categoria">
                                <option value="0"></option>
                                <?php if ($lista_categorias) { ?>
                                    <?php foreach ($lista_categorias as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_categoria) ? ' selected="selected"' : ''; ?>><?php echo $value['categoria']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">

                        <label class="col-sm-12 col-md-2 col-form-label">Clasificación: </label>
                        <div class="col-sm-12 col-md-2">
                            <select name="txtClasificacion" id="txtClasificacion" class=" form-control height-auto clasificación">

                                <option value="0"></option>
                                <?php if ($lista_clasificacion) { ?>
                                    <?php foreach ($lista_clasificacion as $key => $valuec) { ?>
                                        <option value="<?php echo $valuec['id']; ?>" <?php echo ($valuec['id'] ==  $id_clasificacion) ? ' selected="selected"' : ''; ?>><?php echo $valuec['nombre']; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>


                        <label class="col-sm-12 col-md-2 col-form-label panelProm">Total: </label>
                        <div class="col-sm-12 col-md-1 panelProm">
                            <select name="txtTotal" id="txtTotal" class=" form-control height-auto total">
                                <?php if($total != null){ ?> 
                                    <option value="<?php echo $total; ?>"><?php echo $total; ?></option>
                                    <?php } ?>
                                <?php for ($i = 1; $i < 10; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <label class="col-sm-12 col-md-2 col-form-label panelProm">Tamaño: </label>
                        <div class="col-sm-12 col-md-3 panelProm">
                            <select name="txtTamanio" id="txtTamanio" class=" form-control height-auto tamaño">

                                <option value="0"></option>
                                <?php if ($lista_tipo_tamanio) { ?>
                                    <?php foreach ($lista_tipo_tamanio as $key => $valuec) { ?>
                                        <option value="<?php echo $valuec['id_tipo_tamanio']; ?>" <?php echo ($valuec['id_tipo_tamanio'] ==  $id_tipo_tamanio) ? ' selected="selected"' : ''; ?>><?php echo $valuec['tipo'] . " " . $valuec['tamanio']; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>

                    </div>

                    <!--< <div class="row mb-4">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-outline-success">Ingredientes</button>
                        </div>
                    </div>

                    <div class="row" id="panelIngredientes">

                    </div>
                    <div class="row mb-4" id="panelListaIngredientes">

                        <?php if ($mostrar_modal == 1) {

                            if ($lista_edit_ingredientes) {
                                $check = "";

                                $id_gen;
                                $id_sub;
                                $ingrediente;
                                $porcion;
                                $cantidad;
                                $arreglo = array();

                                foreach ($lista_edit_ingredientes as $key => $value) {
                                    $id_gen = $value["id_ingrediente"];
                                    array_push($arreglo, $id_gen);
                                }

                                foreach ($lista_ingredientes as $key2 => $value) {
                                    $id_sub =  $value["id"];
                                    $ingrediente = $value["ingrediente"];
                                    $cantidad = $value["cantidad"];

                                    if ($listas_tamanio_ingredientes[$key2] != null) {
                                        $porcion = $listas_tamanio_ingredientes[$key2]->porcion;
                                    } else {
                                        $porcion = "0";
                                    }


                                    if (in_array($id_sub, $arreglo)) { ?>

                                        <div class="col-2">
                                            <div class="form-check ">
                                                <div class="form-check ">
                                                    <label for=""><?php echo $value["ingrediente"] ?>(<?php echo $cantidad ?> g)</label>
                                                    <input type="checkbox" checked id="<?php echo $value["id"] ?>" name="<?php echo $value["ingrediente"] ?>" value="<?php echo $value["id"] ?>" /><br>
                                                    <input type="text" id="<?php echo $value["id"] ?>-1" name="<?php echo $value["ingrediente"] ?>-1" style="height: 35px;" class="form-control input-lg" value="<?php echo $porcion ?>" />

                                                </div>

                                            </div>
                                        </div>
                                    <?php } else { ?>

                                        <div class="col-2">
                                            <div class="form-check ">
                                                <div class="form-check ">
                                                    <label for=""><?php echo $value["ingrediente"] ?>(<?php echo $cantidad ?> g)</label>
                                                    <input type="checkbox" id="<?php echo $value["id"] ?>" name="<?php echo $value["ingrediente"] ?>" value="<?php echo $value["id"] ?>" /><br>
                                                    <input type="text" id="<?php echo $value["id"] ?>-1" name="<?php echo $value["ingrediente"] ?>-1" style="height: 35px;" class="form-control input-lg" value="<?php echo $porcion ?>" />
                                                </div>
                                            </div>
                                        </div>


                                <?php }
                                } ?>

                        <?php }
                        } ?>

                    </div>-->




                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_producto; ?>">
                            <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_imagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($lista_edit_imagenes) {
                    $mostrar_modal_imagen = 1;
                } ?>

                <section id="team">
                    <div class="container">

                        <div class="row">
                            <div class=" col-md-4">

                                <div class="frontside">
                                    <form class="formImagen" action="<?php echo base_url("admin/accion_imagenes") ?>" method="POST" enctype="multipart/form-data">

                                        <div class="card">
                                            <div class="card-body text-center">


                                                <p><img class=" img-fluid" src="<?php echo base_url("public/Admin/img/generales/iconPlus.png") ?>" alt="card image"></p>
                                                <h4 class="card-title">Nuevo</h4>

                                                <div class="form-group">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input fileImagen" name="fileImagen">
                                                        <label class="custom-file-label">Editar</label>
                                                    </div>
                                                </div>


                                                <div class="form-group">

                                                    <select name="txtStatus" id="txtStatus" class="form-control txtStatus">

                                                        <?php if ($lista_status) { ?>
                                                            <?php foreach ($lista_status as $key => $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $status) ? ' selected="selected"' : ''; ?>><?php echo $value['status']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>


                                                <input type="hidden" name="txtIdProducto" name="txtImagen" value="<?php echo $lista_validar_imagen["idImagenProducto"]; ?>">

                                                <button type="submit" class="btn btnImagen" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</button>

                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                            <?php if ($lista_edit_imagenes) {
                                foreach ($lista_edit_imagenes as $key => $valueI) { ?>

                                    <div class="col-xs-12 col-sm-6 col-md-4">

                                        <div class="frontside">
                                            <form class="formImagen" action="<?php echo base_url("admin/accion_imagenes") ?>" method="POST" enctype="multipart/form-data">

                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="<?php echo base_url("public/Admin/img/productos/" . $valueI['imagen']) ?>" alt="card image"></p>
                                                        <h4 class="card-title">Fecha de creación:</h4>
                                                        <div class="form-group">

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input fileImagen" name="fileImagen">
                                                                <label class="custom-file-label">Editar</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">

                                                            <select name="txtStatus" id="txtStatus" class="form-control txtStatus">

                                                                <?php if ($lista_status) { ?>
                                                                    <?php foreach ($lista_status as $key => $value) { ?>
                                                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] == $valueI['status']) ? ' selected="selected"' : ''; ?>><?php echo $value['status']; ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="txtIdImagen" name="txtIdImagen" value="<?php echo $valueI['id']; ?>">

                                                        <input type="hidden" name="txtIdProducto" name="txtImagen" value="<?php echo $lista_validar_imagen["idImagenProducto"]; ?>">
                                                        <button type="submit" class="btn btnImagen" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</button>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>


                            <?php }
                            } ?>

                        </div>

                    </div>

                </section>


            </div>
        </div>


    </div>

</div>




<script>
    $(function() {
        var idProducto = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idProducto == '1') {
            $("#modal_productos").modal('show');
        }

        var idImagen = <?php echo ($mostrar_modal_imagen == 1) ? $mostrar_modal_imagen : '"0"'; ?>;
        if (idImagen == '1') {
            $("#modal_imagenes").modal('show');
        }

        $(".btn_add_categoria").click(function() {
            $("#frm_categoria input").val("");
            $("#txtStatus").val("1");
        });

        $(".btn_add_producto").click(function() {
            $("#modal_productos").modal('hide');
            var idProducto = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
            if (idProducto == '1') {
                window.location.href = "<?php echo base_url("admin/productos"); ?>";
            }
        });

        /* $("#txtTipoTamanio").on('change', function() {
             $("#panelIngredientes").empty();
             $("#panelListaIngredientes").empty();
             fetch('<?php echo base_url("admin/consulta_porciones") ?>?txtTipoTamanio=' + $(this).val())
                 .then((response) => {
                     return response.json()
                 })
                 .then((data) => {
                     if (data.ingredientes_tamanio) {

                         var check = "";

                         var id_gen, id_sub, ingrediente, porcion, cantidad;
                         var arreglo = [];
                         for (var i = 0; i < data.ingredientes_tamanio.length; i++) {
                             id_gen = data.ingredientes_tamanio[i].id;
                             arreglo.push(id_gen);
                         }

                         for (var i = 0; i < data.ingredientes_gen.length; i++) {
                             id_sub = data.ingredientes_gen[i].id;
                             ingrediente = data.ingredientes_gen[i].ingrediente;
                             cantidad = data.ingredientes_gen[i].cantidad;

                             if (typeof data.ingredientes_tamanio[i] !== 'undefined') {
                                 porcion = data.ingredientes_tamanio[i].porcion;
                             } else {
                                 porcion = 0;
                             }

                             var found = arreglo.includes(id_sub);
                             if (found) {
                                 $("#panelIngredientes").append('<div class="form-check "><label for="">' + ingrediente + ' (' + cantidad + ' g) </label> <input type="checkbox" id="' + id_sub + '" name="' + ingrediente + '" value="' + id_sub + '" /><br><input type="text" id="' + id_sub + '-1" name="' + ingrediente + '-1" style="height: 35px;" class="form-control input-lg" value="' + porcion + '" /></div>');
                             } else {
                                 $("#panelIngredientes").append('<div class="form-check "><label for="">' + ingrediente + ' (' + cantidad + ' g) </label> <input type="checkbox" id="' + id_sub + '" name="' + ingrediente + '" value="' + id_sub + '" /><br><input type="text" id="' + id_sub + '-1" name="' + ingrediente + '-1" style="height: 35px;" class="form-control input-lg" value="' + porcion + '" /></div>');
                             }
                         }
                     }
                 })
                 .catch((err) => {
                     alert(err);
                 });
         });*/


        $(".fileImagen").on('change', function() {

            if ($(this).val() != null) {
                $(this).closest(".formImagen").find(".btnImagen").show();

            } else {
                $(this).closest(".formImagen").find(".btnImagen").hide();
            }

        });


        $(".txtStatus").on('change', function() {
            $(this).closest(".formImagen").find(".btnImagen").show();
        });


        $("#txtClasificacion").on('change', function() {

            if ($(this).val() == "2") {
                $(".panelProm").show();
            } else {
                $(".panelProm").hide();
            }
        });

        var id_tipo_tamanio = <?php echo ($id_clasificacion == "2") ? "1" : '"0"'; ?>;
        if (id_tipo_tamanio == '1') {
            $(".panelProm").show();
        } else {
            $(".panelProm").hide();
        }

        $("#frm_producto").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_producto")) {
                if (validacionSelect("frm_producto")) {
                    if ($.trim($("#txtDescripcion").val())) {
                        valid = true;
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: '',
                            text: 'Descripción no puede estar vacio',
                        });
                    }
                    
                }
            }

            if (valid) this.submit();
        });
    });
</script>