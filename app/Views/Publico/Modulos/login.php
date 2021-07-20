<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sistema web</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("public/Admin/vendors/images/apple-touch-icon.png") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("public/Admin/vendors/images/favicon-32x32.png") ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("public/Admin/vendors/images/favicon-16x16.png") ?>">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/core.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/icon-font.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/style.css") ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/usuarios.css") ?>">
    <script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>
    <script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>


<style>

.input-group{
    margin-bottom: 9px !important;
}

</style>

</head>

<body class="login-page">
    <?php if (isset($_SESSION['error'])) :?>
        <script>
            Swal.fire({
                icon: 'error',
                title: '',
                text: '<?= $_SESSION['error']; ?>'
            });
        </script>
    <?php unset($_SESSION['error']);
    endif; ?>


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
                    <img src="<?php echo base_url("public/Admin/vendors/images/login-page-img.png"); ?>" alt="">
                </div>
                <div class="col-md-6 col-lg-5 login-panel">
                    <div class="login-box bg-white box-shadow border-radius-10 ">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Bienvenido</h2>
                        </div>
                        <form id="frmLogin" method="POST" action="<?php echo base_url("accion_login") ?>">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" value="" name="txtUsuario" placeholder="Usuario">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="txtContrasenia" value="" placeholder="**********">
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
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Iniciar sesión">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">ó</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block btnPaneles" id="btnRegPanel">Registrarse</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 register-panel">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Bienvenido</h2>
                        </div>
                        <form id="frmRegistro" method="POST" action="<?php echo base_url("admin/accion_usuarios_clientes") ?>">

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" value="" name="txtNombre" placeholder="Nombres">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" value="" name="txtApe1" placeholder="Apellido paterno">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" value="" name="txtApe2" placeholder="Apellido materno">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" value="" name="txtUsuario" placeholder="Usuario">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="txtContrasenia" value="" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Registrarse">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">ó</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block btnPaneles" id="btnLogPanel">Iniciar sesión</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url("public/Admin/vendors/scripts/script.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/Admin/vendors/scripts/core.js") ?>"></script>
    <script src="<?php echo base_url("public/Admin/vendors/scripts/process.js"); ?>"></script>
    <script src="<?php echo base_url("public/Admin/vendors/scripts/layout-settings.js"); ?>"></script>


    <script>
        $(function() {
            $('.register-panel').hide(); // hide it initially

            $(".btnPaneles").click(function() {
              
                $(".register-panel, .login-panel").toggle();
            });


        });
    </script>
</body>

</html>