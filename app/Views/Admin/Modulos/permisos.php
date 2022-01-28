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

                    <div class="main-panel">

                        <div class="content-wrapper">

                            <div class="row ">

                                <div class="col-4 col-sm-6 col-md-4 offset-lg-4 grid-margin text-right">

                                    <div class="d-flex d-flex justify-content-end ">

                                        <div>

                                            <button type="button" style="display:none;" class="btn btn-primary btn-rounded btn-fw btn-icon-text btnNuevoDepartamento" data-toggle="modal" data-target="#accion_depa">

                                                <i class="ti-plus btn-icon-prepend"></i>

                                                Nuevo

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 " style="padding-left: 30px; padding-right:30px;">

                                    <div class="form-group">

                                        <label for="formGroupExampleInput">Usuario: *</label>

                                        <select class="form-control" name="txtUsuario" id="txtUsuario">
                                            <option value="0"></option>
                                            <?php if ($listas_usuarios) {
                                                foreach ($listas_usuarios as $key => $value) {
                                            ?>
                                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["usuario"]; ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row panelSubmenus">



                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    $("#txtUsuario").change(function() {

        if ($(this).val() !== "0") {
           
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>/admin/obtenerSubmenuUsuario",
                dataType: 'json',
                data: {
                    txtUsuario: $(this).val()
                },
                beforeSend: function() {
                    $(".panelLoading").fadeIn(1000);
                },
                success: function(data) {
                    console.log(data);

                    $(".panelSubmenus div").remove();

                    var check = "";

                    var idsub1, idsub2, nomsub;

                    var arreglo = [];

                    if (data.permiso != null) {


                        for (var i = 0; i < data.permiso.length; i++) {

                            idsub2 = data.permiso[i].id_submenu;
                        

                            arreglo.push(idsub2);

                        }

                    }



                    if (data.submenu != null) {

                        for (var i = 0; i < data.submenu.length; i++) {

                            idsub1 = data.submenu[i].id;


                            nomsub = data.submenu[i].nombre_submenu_web;

                            var found = arreglo.includes(idsub1);

                            if (found) {

                                $(".panelSubmenus").append('<div class="col-6 col-sm-6 col-md-4 col-lg-3"><div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><input type="checkbox" checked value="' + idsub1 + '" class="checkPermiso"></div></div><input type="text" value="' + nomsub + '" class="form-control" disabled></div></div>');

                            } else {

                                $(".panelSubmenus").append('<div class="col-6 col-sm-6 col-md-4 col-lg-3"><div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><input type="checkbox"  value="' + idsub1 + '" class="checkPermiso"></div></div><input type="text" value="' + nomsub + '" class="form-control" disabled></div></div>');

                            }

                        }
                    }
                    $(".panelLoading").fadeOut(1000);

                },

                error: function(request, status, error) {

                    alert(request.responseText + " " + error);
                    $(".panelLoading").fadeOut(1000);

                }

            });

        }
        else {

            $(".panelSubmenus div").remove();

        }


        $(document).delegate(".checkPermiso", "click", function(e) {
            e.stopImmediatePropagation();
            $(this).attr('checked', '');
            $(this).prop('disabled', true);
            var opciones;
            if ($(this).prop('checked')) {
                opciones = "1";
            } else {
                opciones = "2";
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/admin/accion_permiso",
                dataType: 'json',
                data: {
                    opcion: opciones,
                    idsubmenu: $(this).val(),
                    idusuario: $("#txtUsuario").val()
                },
                success: function(data) {
                    $(".checkPermiso").removeAttr('disabled');
                    Swal.fire({
                        icon: data[1],
                        title: '',
                        text: data[0]
                    });


                },
                error: function(request, status, error) {
                    $(".checkPermiso").removeAttr('disabled');
                    Swal.fire({
                        icon: "error",
                        title: '',
                        text: "Ocurrió un error interno"
                    });
                    console.log(request.responseText + " " + error);
                }
            });


        });



    });
</script>