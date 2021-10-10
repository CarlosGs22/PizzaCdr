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
                            <button type="button" class="btn btn_add_surcusal" data-toggle="modal" data-target="#modal_sucursales" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>
                            <h3>
                    </div>

                    <div class="row pd-20">

                        <?php if ($lista_sucursales) {
                            foreach ($lista_sucursales as $key => $value) { ?>

                                <div class="col-6 col-lg-3 col-md-4 col-sm-12 mb-30">
                                    <div class="da-card">
                                        <div class="da-card-photo">
                                            <img style="max-height: 330px;" src="<?php echo base_url("public/Admin/img/sucursales/" . $value['imagen']) ?>" alt="Sucursal">
                                            <div class="da-overlay">
                                                <div class="da-social">
                                                    <ul class="clearfix">
                                                        <li><a href="<?php echo base_url("admin/sucursales?id=" . $value['id']) ?>"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo base_url("admin/sucursales?idSucursal=" . $value['id']) ?>"><span class="icon-copy ti-location-pin"></span></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="da-card-content">
                                            <h5 class="h5 mb-10"><?php echo $value['nombre']; ?></h5>
                                            <p class="mb-0"><i class="icon-copy fa fa-phone" aria-hidden="true"> </i> <?php echo $value['telefono']; ?></p>
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
    <div class="modal fade" id="modal_sucursales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar sucursal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url("admin/accion_sucursales") ?>" enctype="multipart/form-data" id="frm_sucursal">
                        <?php if ($lista_edit_sucursales) {
                            $mostrar_modal = 1;
                            $nombre = null;
                            $telefono = null;
                            $calle = null;
                            $numero = null;
                            $colonia = null;
                            $cp = null;
                            $status = null;
                            $id_localidad = null;
                            foreach ($lista_edit_sucursales as $key => $value) {
                                $nombre = $value['nombre'];
                                $telefono = $value['telefono'];
                                $calle = $value['calle'];
                                $numero = $value['numero'];
                                $colonia = $value['colonia'];
                                $cp = $value['cp'];
                                $status = $value['status'];
                                $id_localidad = $value['loca_id'];
                                $id_municipio = $value['muni_id'];
                                $id_estado = $value['esta_id'];
                                $id_sucursal = $value['id'];
                                break;
                            }
                        }

                        ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nombre: *</label>
                                    <input class="form-control" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Imagen: *</label>
                                    <input type="file" id="imgSucursal" name="imgSucursal" class="form-control-file form-control height-auto">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Télefono: *</label>
                                    <input class="form-control" type="text" id="txtTelefono" value="<?php echo ($telefono) ? $telefono : ''; ?>" name="txtTelefono">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Calle: *</label>
                                    <input class="form-control" type="text" id="txtCalle" value="<?php echo ($calle) ? $calle : ''; ?>" name="txtCalle">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Número: *</label>
                                    <input type="text" id="txtNumero" name="txtNumero" value="<?php echo ($numero) ? $numero : ''; ?>" class="form-control height-auto">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Colonia: *</label>
                                    <input class="form-control" type="text" id="txtColonia" value="<?php echo ($colonia) ? $colonia : ''; ?>" name="txtColonia">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>CP: *</label>
                                    <input class="form-control" type="text" id="txtCp" value="<?php echo ($cp) ? $cp : ''; ?>" name="txtCp">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Status: *</label>
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
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Estado: *</label>
                                    <select class='form-control' name="txtEstado" id="txtEstado">

                                        <option value='0'></option>
                                        <?php if ($lista_estados) { ?>
                                            <?php foreach ($lista_estados as $key => $value) { ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_estado) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Municipio: *</label>
                                    <select class='form-control' id="txtMunicipio" name="txtMunicipio">
                                        <option value='0'></option>
                                        <?php if ($lista_municipios) { ?>
                                            <?php foreach ($lista_municipios as $key => $value) { ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_municipio) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                        <?php }
                                        } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Localidad: *</label>
                                    <select class='form-control' id="txtLocalidad" name="txtLocalidad">
                                        <option value='0'></option>
                                        <?php if ($lista_localidades) { ?>
                                            <?php foreach ($lista_localidades as $key => $value) { ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_localidad) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_sucursal; ?>">
                                <button type="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_localidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar localidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Registros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Registrar localidades</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-12">
                                <div class="pb-20">
                                <table class="data-table table">
                    	<thead>
							<tr>
								<th class="table-plus">Id</th>
								<th>Localidad</th>
								<th>Precio</th>
                                <th>Acción</th>
                                
							</tr>
						</thead>
						<tbody>
							<?php if ($lista_localidades_registradas) {
								foreach ($lista_localidades_registradas as $key => $value) { ?>
									<tr>
										<td class="table-plus"><?=$value['idSL']?></td>
										<td><?=$value['nombreLoca'] . " " . $value['nombreMun'] ?></td>
										
										<td><input type="text" name="txtPrecio" class="form-control txtPrecio" value="<?=$value['precio']?>"></td>
                                        <td><button type="button" id="<?=$value['idSL']?>" class="btn btnPrecioLoca" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</button></t>
								
									</tr>
							<?php }
							} ?>


						</tbody>
					</table>
				</div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <?php if ($idSucursal_localidad) {
                                $mostrar_modal_localidad = 1;
                                $id_sucursal = $idSucursal_localidad['idSucursal'];
                            }
                            ?>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Estado: *</label>
                                        <select class='form-control' name="txtEstado" id="txtEstado">

                                            <option value='0'></option>
                                            <?php if ($lista_estados) { ?>
                                                <?php foreach ($lista_estados as $key => $value) { ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_estado) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Municipio: *</label>
                                        <select class='form-control' id="txtMunicipio" name="txtMunicipio">
                                            <option value='0'></option>
                                            <?php if ($lista_municipios) { ?>
                                                <?php foreach ($lista_municipios as $key => $value) { ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_municipio) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                            <?php }
                                            } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="row" id="panelIngredientes">

                                </div>




                            </div>

                            <div class="row" id="panelLocalidades">

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

    


        
        var idSucursal = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idSucursal == '1') {
            $("#modal_sucursales").modal('show');
        }
        var idSucursal_localidad = <?php echo ($mostrar_modal_localidad == 1) ? $mostrar_modal_localidad : '"0"'; ?>;
        if (idSucursal_localidad == '1') {
            $("#modal_localidades").modal('show');
        }
        $(".btn_add_sucursal").click(function() {
            $("#frm_sucursal input").val("");
            $("#txtStatus").val("1");

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
                        $("#txtMunicipio option").remove();
                        $("select[name='txtLocalidad'] option").remove();
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
                    $("#panelLocalidades div").remove();
                    if (data.lista_localidades) {
                        if (idSucursal_localidad != 1) {
                            $("select[name='txtLocalidad'] option").remove();

                            $('select[name="txtLocalidad"]').append("<option value='0'></option>");
                            for (var i = 0; i < data.lista_localidades.length; i++) {
                                $('select[name="txtLocalidad"]').append('<option value="' + data.lista_localidades[i].id + '">' + data.lista_localidades[i].nombre + '</option>');
                            }

                        } else {
                            for (var i = 0; i < data.lista_localidades.length; i++) {
                                $("#panelLocalidades").append('<div class="col-md-3"><div class="card h-100"><div class="list border-bottom"> <span class="icon-copy ti-location-pin"></span> <div class="d-flex flex-column ml-3"> <span>' + data.lista_localidades[i].nombre + ' <input type="checkbox" class="checksLocalidad" name="txtLocalidad" id="' + data.lista_localidades[i].nombre + '" value="' + data.lista_localidades[i].id + '" /></span>  </div> </div></div></div>');
                            }
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

        $(document).delegate(".checksLocalidad", "click", function(e) {
            var opcion = null;
            if ($(this).is(':checked')) {
                opcion = "0";
            } else {
                opcion = "1";
            }

            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/admin/accion_sucursales_localidades",
                dataType: 'json',
                data: {
                    opcion: opcion,
                    idSucursal: "<?= $id_sucursal ?>",
                    idLocalidad: $(this).val()
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

         $(".btnPrecioLoca").click(function() {
             alert( $(this).attr("id"));
         

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url("admin/accion_registrar_localidades") ?>",
                dataType: 'json',
                data: {
                    precio :$(this).closest('tbody').find('input').val(),
                    idSucursal_localidad : $(this).attr("id")
                },
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
        });

    });
</script>