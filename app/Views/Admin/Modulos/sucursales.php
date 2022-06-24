<?php
$encrypter = \Config\Services::encrypter();

$datos_dias = [
    'lunes' => "Monday",
    'martes' => "Tuesday",
    'miercoles' => "Wednesday",
    'jueves' => "Thursday",
    'viernes' => "Friday",
    'sabado' => "Saturday",
    'domingo' => "Sunday"
];


?>


<style>
    .panelMasInfo {
        display: none;
    }
</style>
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
                    <button type="button" class="btn btn_add_sucursal" data-toggle="modal" data-target="#modal_sucursales" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-plus"></i> Nuevo</button>

                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box mb-30">
                <div class="pb-20 pt-20">

                    <div class="row pd-20">

                        <?php if ($lista_sucursales) {
                            foreach ($lista_sucursales as $key => $value) { ?>

                                <div class="col-6 col-lg-4 col-md-4 col-sm-12 mb-30">
                                    <div class="da-card">
                                        <div class="da-card-photo">
                                            <img style="height: 345px;" src="<?php echo base_url("public/Admin/img/sucursales/" . $value['imagen']) ?>" alt="Sucursal">
                                            <div class="da-overlay">
                                                <div class="da-social">
                                                    <ul class="clearfix">
                                                        <li><a href="<?php echo base_url("admin/sucursales?id=" . $value['id']) ?>"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?php echo base_url("admin/sucursales?idSucursal=" . $value['id']) ?>"><span class="icon-copy ti-location-pin"></span></a></li>
                                                        <li><a href="<?php echo base_url("admin/sucursales?idSucursalHorario=" . $value['id']) ?>"><span class="icon-copy ti-alarm-clock"></span></a></li>

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
                        } else { ?>


                            <div class="col-12 text-center">
                                <p class="dataTables_empty">No hay resultados para mostrar</p>

                            </div>



                        <?php  } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_sucursales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                            $frame = null;
                            $link = null;
                            $correo = null;
                            $id_localidad = null;
                            foreach ($lista_edit_sucursales as $key => $value) {
                                $nombre = $value['nombre'];
                                $telefono = $value['telefono'];
                                $calle = $value['calle'];
                                $numero = $value['numero'];
                                $colonia = $value['colonia'];
                                $cp = $value['cp'];
                                $status = $value['status'];
                                $frame = $value['src_frame'];
                                $link = $value['facebook_link'];
                                $correo = $value['correo'];
                                $horario = $value['horario'];
                                $presentacion = $value['presentacion'];
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
                                    <input class="form-control nombre" type="text" id="txtNombre" value="<?php echo ($nombre) ? $nombre : ''; ?>" name="txtNombre">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Imagen: *</label>
                                    <input type="file" id="imgSucursal" name="imgSucursal" class="form-control-file form-control height-auto imagen" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Télefono: *</label>
                                    <input class="form-control télefono" type="text" id="txtTelefono" value="<?php echo ($telefono) ? $telefono : ''; ?>" name="txtTelefono" oninput="restrict(this);">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Calle: *</label>
                                    <input class="form-control calle" type="text" id="txtCalle" value="<?php echo ($calle) ? $calle : ''; ?>" name="txtCalle">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Número: *</label>
                                    <input type="text" id="txtNumero" name="txtNumero" value="<?php echo ($numero) ? $numero : ''; ?>" class="form-control height-auto número">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Colonia: *</label>
                                    <input class="form-control colonia" type="text" id="txtColonia" value="<?php echo ($colonia) ? $colonia : ''; ?>" name="txtColonia" maxlength="10">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>CP: *</label>
                                    <input class="form-control código-postal" type="text" id="txtCp" value="<?php echo ($cp) ? $cp : ''; ?>" name="txtCp" maxlength="4" oninput="restrict(this);">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Status: *</label>
                                    <select name="txtStatus" id="txtStatus" class="form-control status">
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
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Frame Maps: </label>
                                    <input type="text" id="txtFrame" name="txtFrame" value="<?php echo ($frame) ? $frame : '0'; ?>" class="form-control height-auto maps">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Link Facebook: </label>
                                    <input class="form-control  height-auto Link" type="text" id="txtLink" value="<?php echo ($link) ? $link : '0'; ?>" name="txtLink">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Correo: </label>
                                    <input class="form-control  height-auto correo" type="text" id="txtCorreo" value="<?php echo ($correo) ? $correo : '0'; ?>" name="txtCorreo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Estado: *</label>
                                    <select class='form-control estado' name="txtEstado" id="txtEstado">

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
                                    <select class='form-control municipio' id="txtMunicipio" name="txtMunicipio">
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
                                    <select class='form-control localidad' id="txtLocalidad" name="txtLocalidad">
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
                            <div class="col-12">
                                <a class="btn btn-link togglemas">Más información</a>
                            </div>
                        </div>

                        <div class="row panelMasInfo">
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Presentacion">Presentación</label>
                                    <textarea class="form-control presentacion" name="txtPresentacion" rows="10" cols="50"><?php echo ($presentacion) ? $presentacion : ''; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <input type="hidden" name="txtId" id="txtId" value="<?php echo $id_sucursal; ?>">
                                <button type="submit" class="btn " data-bgcolor="#00b489" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 180, 137);"><i class="fa fa-save"></i> Guardar</button>
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
                                                            <td class="table-plus"><?= $value['idSL'] ?></td>
                                                            <td><?= $value['nombreLoca'] . " " . $value['nombreMun'] ?></td>

                                                            <td><input type="text" name="txtPrecio" class="form-control txtPrecio" value="<?= $value['precio'] ?>" oninput="restrict(this);" ></td>
                                                            <td><button type="button" id="<?= $value['idSL'] ?>" class="btn btnPrecioLoca" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-edit"></i>Editar</button></t>

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

    <div class="modal fade" id="modal_horarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Horario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $idSucursalHex = null;

                    if ($idSucursal_Horario) {
                        $mostrar_modal_horario = 1;

                        $idSucursalHex =  bin2hex($encrypter->encrypt($idSucursal_Horario["idSucursal"]));
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                            <div class="card card-box">
                                <div class="text-center">
                                    <img class="card-img-top" src="<?= base_url("public/Admin/img/generales/iconPlus.png") ?>" alt="Card image cap" style="max-width: 50%; margin:15px;">
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url("admin/accion_horarios") ?>" enctype="multipart/form-data" id="frm_horario">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Día:</label>
                                                    <select name="txtDia" class="form-control Día">
                                                        <option value="0" selected></option>
                                                        <?php

                                                        foreach ($datos_dias as $keydias => $valuedias) { ?>
                                                            <option value="<?= $valuedias ?>"><?= $keydias ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>De Hora:</label>
                                                    <select name="txtDeHora" class="form-control De-Hora">
                                                        <option value="0"></option>
                                                        <?php
                                                        for ($i = 0; $i < 23; $i++) {
                                                            $value1 = 0;
                                                            if ($i < 10) {
                                                                $value1 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            } else {
                                                                $value1 = $i;
                                                            }
                                                        ?>
                                                            <option value="<?= $value1 ?>"><?= $value1 ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Mns:</label>
                                                    <select name="txtDeHoraMns" class="form-control De-Hora-Mns">
                                                        <?php

                                                        for ($i = 0; $i < 60; $i++) {
                                                            $value2 = 0;
                                                            if ($i < 10) {
                                                                $value2 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            } else {
                                                                $value2 = $i;
                                                            }
                                                        ?>
                                                            <option value="<?= $value2 ?>"><?= $value2 ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Hasta Hora:</label>
                                                    <select name="txtHastaHora" class="form-control Hora-Hasta">
                                                        <?php

                                                        for ($i = 0; $i < 24; $i++) {
                                                            $value3 = 0;
                                                            if ($i < 10) {
                                                                $value3 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            } else {
                                                                $value3 = $i;
                                                            }
                                                        ?>
                                                            <option value="<?= $value3 ?>"><?= $value3 ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Mns:</label>
                                                    <select name="txtHastaHoraMns" class="form-control Hora-Hasta-Mns">
                                                        <?php

                                                        for ($i = 0; $i < 60; $i++) {
                                                            $value4 = 0;
                                                            if ($i < 10) {
                                                                $value4 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            } else {
                                                                $value4 = $i;
                                                            }
                                                        ?>
                                                            <option value="<?= $value4 ?>"><?= $value4 ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status:</label>
                                                    <select name="txtStatus" class="form-control status">
                                                        <option value="0"></option>
                                                        <?php if ($lista_status) { ?>
                                                            <?php foreach ($lista_status as $key => $value5) { ?>
                                                                <option value="<?php echo $value5['id']; ?>"><?php echo $value5['status']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <div class="form-group">
                                                    <input type="hidden" value="<?= $idSucursalHex ?>" name="idSucursalHex">
                                                    <button type="submit" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-save"></i>Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <?php


                        if ($idSucursal_Horario) {
                            $mostrar_modal_horario = 1;


                            $idSucursalHex =  bin2hex($encrypter->encrypt($idSucursal_Horario["idSucursal"]));


                            if ($lista_horarios) {  ?>

                                <?php

                                foreach ($lista_horarios as $key => $value) {
                                    $dia = $value['dia'];
                                    $horade = $value['horade'];
                                    $horademns = $value['horademns'];
                                    $horahasta = $value['horahasta'];
                                    $horahastams = $value['horahastamns'];
                                    $status = $value['status'];
                                    $idHorario = bin2hex($encrypter->encrypt($value["id"]));


                                ?>

                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                                        <div class="card card-box">
                                            <div class="text-center">
                                                <img class="card-img-top" src="<?= base_url("public/Admin/img/sucursales/clock.png") ?>" alt="Card image cap" style="max-width: 50%; margin:15px;">
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="<?php echo base_url("admin/accion_horarios") ?>" enctype="multipart/form-data" id="frm_horarios">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Día:</label>
                                                                <select name="txtDia" class="form-control Día">
                                                                    <option value="0"></option>
                                                                    <?php

                                                                    foreach ($datos_dias as $keydias => $valuedias) { ?>
                                                                        <option value="<?= $valuedias ?>" <?php echo ($valuedias == $dia) ? ' selected="selected"' : ''; ?>><?= $keydias ?></option>
                                                                    <?php } ?>


                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>De Hora:</label>
                                                                <select name="txtDeHora" class="form-control De-Hora">
                                                                    <option value="0"></option>
                                                                    <?php
                                                                    for ($i = 0; $i < 23; $i++) {
                                                                        $value1 = 0;
                                                                        if ($i < 10) {
                                                                            $value1 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                        } else {
                                                                            $value1 = $i;
                                                                        }
                                                                    ?>
                                                                        <option value="<?= $value1 ?>" <?php echo ($value1 ==  $horade) ? ' selected="selected"' : ''; ?>><?= $value1 ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Mns:</label>
                                                                <select name="txtDeHoraMns" class="form-control De-Hora-Mns">
                                                                    <?php

                                                                    for ($i = 0; $i < 60; $i++) {
                                                                        $value = 0;
                                                                        if ($i < 10) {
                                                                            $value = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                        } else {
                                                                            $value = $i;
                                                                        }
                                                                    ?>
                                                                        <option value="<?= $value ?>" <?php echo ($value ==  $horademns) ? ' selected="selected"' : ''; ?>><?= $value ?></option>
                                                                    <?php } ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Hasta Hora:</label>
                                                                <select name="txtHastaHora" class="form-control Hasta-Hora">
                                                                    <?php

                                                                    for ($i = 0; $i < 24; $i++) {
                                                                        $value1 = 0;
                                                                        if ($i < 10) {
                                                                            $value1 = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                        } else {
                                                                            $value1 = $i;
                                                                        }


                                                                    ?>
                                                                        <option value="<?= $value1 ?>" <?php echo ($value1 ==  $horahasta) ? ' selected="selected"' : ''; ?>><?= $value1 ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Mns:</label>
                                                                <select name="txtHastaHoraMns" class="form-control Hasta-Hora-Mns">
                                                                    <?php

                                                                    for ($i = 0; $i < 60; $i++) {
                                                                        $value = 0;
                                                                        if ($i < 10) {
                                                                            $value = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                                        } else {
                                                                            $value = $i;
                                                                        }
                                                                    ?>
                                                                        <option value="<?= $value ?>" <?php echo ($value ==  $horahastams) ? ' selected="selected"' : ''; ?>><?= $value ?></option>
                                                                    <?php } ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Status:</label>
                                                                <select name="txtStatus" class="form-control Status">
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
                                                        <div class="col-12 text-center">
                                                            <div class="form-group">
                                                                <input type="hidden" value="<?= $idSucursalHex ?>" name="idSucursalHex">
                                                                <input type="hidden" value="<?= $idHorario ?>" name="txtId">
                                                                <button type="submit" class="btn" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-save"></i>Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(function() {


        var idSucursal = <?php echo ($mostrar_modal == 1) ? $mostrar_modal : '"0"'; ?>;
        if (idSucursal == '1' || localStorage.getItem("opcionBtn") === '1') {
            localStorage.removeItem("opcionBtn");
            $("#modal_sucursales").modal('show');

        }
        var idSucursal_localidad = <?php echo ($mostrar_modal_localidad == 1) ? $mostrar_modal_localidad : '"0"'; ?>;
        if (idSucursal_localidad == '1') {
            $("#modal_localidades").modal('show');
        }

        var idSucursal_horario = <?php echo ($mostrar_modal_horario == 1) ? $mostrar_modal_horario : '"0"'; ?>;
        if (idSucursal_horario == '1') {
            $("#modal_horarios").modal('show');
        }

        $(".btn_add_sucursal").click(function() {
            if (idSucursal == '1') {
                localStorage.setItem("opcionBtn", "1");
                window.location.href = "<?php echo base_url("admin/sucursales"); ?>";
            }
        });

        $("#frm_sucursal").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_sucursal")) {
                if (validacionSelect("frm_sucursal")) {
                    if (validacionTextArea("frm_sucursal")) {
                        valid = true;
                    }
                }
            }

            if (valid) this.submit();
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
            

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url("admin/accion_registrar_localidades") ?>",
                dataType: 'json',
                data: {
                    precio: $(this).closest('tbody').find('input').val(),
                    idSucursal_localidad: $(this).attr("id")
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

        $(".togglemas").click(function() {
            $(".panelMasInfo").animate({
                width: "toggle"
            });
        });


        $("#frm_horario").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_horario")) {
                if (validacionSelect("frm_horario")) {
                    valid = true;
                }
            }
            if (valid) this.submit();
        });

        $("#frm_horarios").submit(function(e) {
            e.preventDefault();

            var valid = false;

            if (validacionInput("frm_horarios")) {
                if (validacionSelect("frm_horarios")) {
                    valid = true;
                }
            }
            if (valid) this.submit();
        });

    });
</script>