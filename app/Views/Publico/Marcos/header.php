<?php
$encrypter = \Config\Services::encrypter();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?php echo $listas_especiales[0]["img2"] ?></title>
  <link rel="shortcut icon" href="<?php echo base_url("public/Admin/img/especiales/logo1.png") ?>" type="">

  <title> <?php echo $listas_especiales[0]["img3"] != null ? $listas_especiales[0]["img3"] : "Tienda" ?></title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/bootstrap.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/header.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/icon-font.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/font-awesome.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/style.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/responsive.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/propios.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/detail.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/productos.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/carrito.css") ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/carousel.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/carousel-theme.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/nosotros.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/micuenta.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/pasarela.css") ?>">


  <script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>

  <script src="<?php echo base_url("public/Admin/src/scripts/own.js") ?>"></script>

  <script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>

  <script src="<?php echo base_url("public/Publico/js/fontAwesome.js"); ?>"></script>

  <script src="https://js.stripe.com/v2/"></script>
  <script src="<?php echo base_url("public/Publico/js/stripe.js"); ?>"></script>



</head>

<body>

  <div class="loader"></div>

  <style>
    .loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('<?= base_url("public/Admin/img/especiales/loading.gif") ?>') 50% 50% no-repeat white;
    }
  </style>


  <script>
    $(function() {
      $(".loader")
        .delay(900).slideUp(700)
    });
  </script>

  <?php if (isset($_SESSION['respuesta'])) : ?>
    <script>
      Swal.fire({
        icon: '<?php echo $_SESSION['respuesta'][1] ?>',
        title: '',
        text: '<?php echo $_SESSION['respuesta'][0] ?>'
      });
    </script>
  <?php endif; ?>


  <?php if (isset($_SESSION['respuesta'][2])) {
    if ($lista_sucursales) { ?>
      <script>
        $(function() {
          $("#modal_horarios").modal("show");
        });
      </script>
  <?php }
  } ?>


  <?php if ($lista_sucursal_info) {


    $telefono = "";

    foreach ($lista_sucursal_info as  $value) {
      $telefono = $value["telefono"];
    }
  ?>
    <div id="header">
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <ul>
                <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?= $telefono; ?></li>
                <?php
                if ($_SESSION["tipo_orden"] != null) { ?>
                  <li>|</li>
                  <li><i class="icon-copy ti-location-pin" aria-hidden="true"></i>Tipo de orden: <Strong class="blink_me"><?= $_SESSION["tipo_orden"] . " " .  ($_SESSION["nombre_cobertura"] != null ? "(Desde " . $_SESSION["nombre_cobertura"] . ")" : "")  ?> </Strong> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>

  <header class="header_section headerPage">

    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="<?php echo base_url() ?>">
        <?php if ($listas_especiales) { ?>
          <img id="imgNavBar" src="<?php echo base_url("public/Admin/img/especiales/" . $listas_especiales[0]["img1"]) ?>" alt="">
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
            <a class="nav-link" href="<?= base_url("/nosotros") ?>">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("menu/individuales") ?>">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("menu/promociones") ?>">Promociones</a>
          </li>

          <li class="nav-item" data-toggle="modal" data-target="#modal_tipos_dir">
            <a class="nav-link">Ordenar / Recojer</a>
          </li>
        </ul>
        <div class="user_option">

          <a href="<?php echo base_url("carrito") ?>" class="user_link">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </a>

          <a href="<?php echo base_url("login") ?>" class="user_link">
            <i class="<?php echo session()->get("usuario_cliente") != null ? "fa fa-cog" : "fa fa-user" ?>" aria-hidden="true"></i>
          </a>
          <?php if (session()->get("usuario_cliente") != null) { ?>
            <a href="<?php echo base_url("salir") ?>" class="user_link">
              <i class="fa fa-user-times" aria-hidden="true"></i>
            </a>
          <?php } ?>
          <!--<a href="" class="order_online">
            Order Online
          </a>-->
        </div>
      </div>
    </nav>
  </header>

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

                  <form id="frmSearch" class="form text-center" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <h4>Entrega a domicilio</h4>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mr-2">
                          <input type="text" class="form-control Código-Postal" name="txtCp" placeholder="CP" maxlength="5">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <input type="hidden" name="txtReg" value="32U3&#vUd">
                        <button type="submit" id="btnBuscarLocalización" class="btn btnForm mb-2">Buscar</button>

                      </div>
                    </div>



                  </form>
                </div>
                <div class="col-6">
                  <form class="form text-center" id="frmChoose" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">


                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <h4>Recoje en sucursal</h4>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mr-2">
                          <select name="txtSucursal" id="txtSucursal" class="form-control Sucursal">
                            <option value="0"></option>
                            <?php if ($lista_sucursales) { ?>
                              <?php foreach ($lista_sucursales as $key => $value) {
                                $idValueSucursal = bin2hex($encrypter->encrypt($value["id"])); ?> ?>
                                <option value="<?= $idValueSucursal; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
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
  </div>

  <div class="modal fade" id="modal_horarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Horario de sucursal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div id="demo" class="carousel slide" data-ride="carousel">

                <?php
                if ($lista_sucursales) { ?>
                  <ul class="carousel-indicators">
                    <?php foreach ($lista_sucursales as $keys => $values) { ?>
                      <li data-target="#demo" data-slide-to="<?= $keys ?>" class="active"></li>
                    <?php  } ?>
                  </ul>
                <?php } ?>

                <div class="carousel-inner">
                  <?php
                  if ($lista_sucursales) {
                    foreach ($lista_sucursales as $key1 => $value1) { ?>
                      <div class="container demo-bg">

                        <div class="row">
                          <div class="col-12 col-sm-12 col-md-12 col-lg-8 text-center p-2" style="align-self: center;">
                            <h2><?= $value1["nombre"] ?></h2>
                            <img style="max-width: 40%; " src="<?= base_url("public/Admin/img/sucursales/" . $value1["imagen"]) ?>" alt="">
                          </div>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-2">

                            <div class="business-hours">
                              <h2 class="title">Horarios</h2>

                              <ul class="list-unstyled opening-hours">
                                <?php if ($lista_horarios) {
                                  foreach ($lista_horarios as $key2 => $value2) {
                                    if ($value2["id_sucursal"] == $value1["id"]) {
                                ?>
                                      <li><?= $value2["dia_espanol"] ?> <span class="pull-right"><?= $value2["horade"] . ":" . $value2["horademns"] . " a " . $value2["horahasta"] . ":" . $value2["horahastamns"] . " Hrs" ?></span></li>

                                <?php }
                                  }
                                } ?>
                              </ul>
                            </div>
                        <?php }
                    } ?>
                          </div>
                        </div>
                      </div>
                </div>


                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

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

  <style>
    .demo-bg {
      background: #f8f9fa;
    }

    .business-hours {
      background: #111419;
      padding: 40px 14px;
      margin-top: -15px;
      position: relative;
    }

    .business-hours:before {
      content: '';
      width: 23px;
      height: 23px;
      background: #111;
      position: absolute;
      top: 5px;
      left: -12px;
      transform: rotate(-45deg);
      z-index: -1;
    }

    .business-hours .title {
      font-size: 20px;
      color: #BBB;
      text-transform: uppercase;
      padding-left: 5px;
      border-left: 4px solid #ffac0c;
    }

    .business-hours li {
      color: #888;
      line-height: 30px;
      border-bottom: 1px solid #333;
    }

    .business-hours li:last-child {
      border-bottom: none;
    }

    .business-hours .opening-hours li.today {
      color: #ffac0c;
    }
  </style>