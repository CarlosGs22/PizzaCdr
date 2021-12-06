<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="" type="">


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("public/Admin/vendors/images/apple-touch-icon.png") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("public/Admin/vendors/images/favicon-32x32.png") ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("public/Admin/vendors/images/favicon-16x16.png") ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/core.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/icon-font.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/style.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/responsive.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/propios.css") ?>">

    <script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/header.css") ?>">


    <style>
        .input-group {
            margin-bottom: 9px !important;
        }

        body {
            background-image: url('<?php echo base_url('public/Publico/images/pizza_login.jpg') ?>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position-y: center;
        }

        .pnlForm {
            background: #ffffffa6;
        }

        .login-wrap {
            height: calc(100% - 70px);
            overflow: auto;
            padding: 30px 0;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
            padding: 40px 20px;
            margin: 5px auto;
        }
    </style>

</head>


<body class="login-page">
    <?php if (isset($_SESSION['error'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: '',
                text: '<?= $_SESSION['error']; ?>'
            });
        </script>
    <?php unset($_SESSION['error']);
    endif; ?>

    <?php if ($lista_sucursal_info) {

        foreach ($lista_sucursal_info as $key => $value) {
    ?>
            <div id="header">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <ul>
                                    <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?= $value["telefono"]; ?></li>
                                    <li>|</li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $value["horario"]; ?></li>
                                    <li>|</li>
                                    <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?= $value["telefono"]; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    }

    ?>

    <header class="header_section headerPage">

        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="<?php echo base_url() ?>">
                <?php if ($listas_especiales) { ?>
                    <img style="width: 120px; height:100px;" src="<?php echo base_url("public/Admin/img/especiales/" . $listas_especiales[0]["img1"]) ?>" alt="">
                <?php } ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() ?>">Inicio <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>

                    <li class="nav-item" data-toggle="modal" data-target="#modal_tipos_dir">
                        <a class="nav-link">Ordenar / Recojer</a>
                    </li>
                </ul>
                <div class="user_option">

                    <a class="cart_link" href="#">
                        <i class="ti-plus"></i>
                    </a>
                    <a href="<?php echo base_url("login") ?>" class="user_link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <!--<a href="" class="order_online">
        Order Online
      </a>-->
                </div>
            </div>
        </nav>
    </header>


    <!--<div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </div>
    </div>-->

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">

                </div>
                <div class="col-md-6 col-lg-5 login-panel">
                    <div class="login-box box-shadow border-radius-10 pnlForm ">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Bienvenido</h2>
                        </div>
                        <form id="frmLogin" method="POST" action="<?php echo base_url("accion_login") ?>">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg Usuario" id="txtUsuarioLog" value="" name="txtUsuario" placeholder="Usuario">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg Contraseña" id="txtContraseniaLog" name="txtContrasenia" value="" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">

                                </div>
                                <div class="col-12 text-center">
                                    <div class="forgot-password"><a href="forgot-password.html">¿Olvidaste tu contraseña?</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-lg btn-block" type="submit" value="Iniciar sesión" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">ó</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-lg btn-block btn-block btnPaneles" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);" id="btnRegPanel">Registrarse</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 register-panel ">
                    <div class="login-box box-shadow border-radius-10 pnlForm">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Bienvenido</h2>
                        </div>
                        <form id="frmRegistro" method="POST" action="<?php echo base_url("admin/accion_usuarios_clientes") ?>">

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg Nombres" value="" name="txtNombre" placeholder="Nombres">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg Apellido-Paterno" value="" name="txtApe1" placeholder="Apellido paterno">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg Apellido-Materno" value="" name="txtApe2" placeholder="Apellido materno">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg Usuario" id="txtUsuarioReg" value="" name="txtUsuario" placeholder="Usuario">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg Contraseña" id="txtContraseniaReg" name="txtContrasenia" value="" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-lg btn-block" type="submit" value="Registrarse" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">ó</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-lg btn-block btn-block btnPaneles" data-bgcolor="#f46f30" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);" id="btnLogPanel">Iniciar sesión</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_tipos_dir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona tu tipo de entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="newsletter-subscribe">
                        <div class="container">
                            <div class="row">

                                <div class="col-6 border-right">

                                    <form id="frmSearch" class="form-inline" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
                                        <div class="form-group">
                                            <h4>Entrega a domicilio</h4>
                                        </div>
                                        <div class="form-group mr-2">
                                            <input type="text" class="form-control Código-Postal" name="txtCp" placeholder="CP" maxlength="5">
                                        </div>
                                        <input type="hidden" name="txtReg" value="32U3&#vUd">
                                        <button type="submit" id="btnBuscarLocalización" class="btn btnForm mb-2">Buscar</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form class="form-inline" id="frmChoose" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
                                        <div class="form-group">
                                            <h4>Recoje en sucursal</h4>
                                        </div>
                                        <div class="form-group mr-2">
                                            <select name="txtSucursal" id="txtSucursal" class="form-control Sucursal">
                                                <option value="0"></option>
                                                <?php if ($lista_sucursales) { ?>
                                                    <?php foreach ($lista_sucursales as $key => $value) { ?>
                                                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="txtReg" value="ZM8ByFx#">
                                        <button type="submit" id="btnSeleccionarSucursal" class="btn btnForm mb-2">Seleccionar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <script src="<?php echo base_url("public/Admin/vendors/scripts/script.min.js"); ?>"></script>
        <script src="<?php echo base_url("public/Admin/vendors/scripts/core.js") ?>"></script>
        <script src="<?php echo base_url("public/Admin/vendors/scripts/process.js"); ?>"></script>
        <script src="<?php echo base_url("public/Admin/vendors/scripts/layout-settings.js"); ?>"></script>
        <script src="<?php echo base_url("public/Publico/js/bootstrap.js") ?>"></script>
        <script src="<?php echo base_url("public/Admin/src/scripts/own.js"); ?>"></script>

        <script>
            $(function() {
                $('.register-panel').hide(); // hide it initially

                $(".btnPaneles").click(function() {

                    $(".register-panel, .login-panel").toggle();
                });


            });

            $("#frmLogin").submit(function(e) {
                e.preventDefault();

                var valid = false;

                if (validacionInput("frmLogin")) {
                    if (validacionSelect("frmLogin")) {
                        if (validarEmail($('#txtUsuarioLog').val())) {
                            valid = true;
                        }
                    }
                }

                if (valid) this.submit();
            });

            $("#frmRegistro").submit(function(e) {
                e.preventDefault();

                var valid = false;

                if (validacionInput("frmRegistro")) {
                    if (validacionSelect("frmRegistro")) {
                        if ($("#txtContraseniaReg").val().length > 8) {
                            if (validarEmail($('#txtUsuarioReg').val())) {
                                valid = true;
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '',
                                text: 'La contraseña debe de tener mas 7 caracteres',
                            });
                        }
                    }
                }

                if (valid) this.submit();
            });
        </script>

        <script>
            $(function() {
                $("#frmChoose").submit(function(e) {
                    e.preventDefault();

                    var valid = false;

                    if (validacionInput("frmChoose")) {
                        if (validacionSelect("frmChoose")) {
                            valid = true;
                        }
                    }

                    if (valid) this.submit();
                });

                $("#frmSearch").submit(function(e) {
                    e.preventDefault();

                    var valid = false;

                    if (validacionInput("frmSearch")) {
                        if (validacionSelect("frmSearch")) {
                            valid = true;
                        }
                    }

                    if (valid) this.submit();
                });

            });
        </script>


</body>

</html>