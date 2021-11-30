<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
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

  <script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>

  <script src="<?php echo base_url("public/Admin/src/scripts/own.js") ?>"></script>


  <script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>

</head>

<body>

  <?php if (isset($_SESSION['respuesta'])) : ?>
    <script>
      Swal.fire({
        icon: '<?php echo $_SESSION['respuesta'][1] ?>',
        title: '',
        text: '<?php echo $_SESSION['respuesta'][0] ?>'
      });
    </script>
  <?php endif; ?>
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
                  <?php
                  if ($_SESSION["tipo_orden"] != null) { ?>

                    <li>|</li>
                    <li><i class="icon-copy ti-location-pin" aria-hidden="true"></i>Tipo de orden: <?= $_SESSION["tipo_orden"] ?> </li>
                  <?php } ?>
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

          <a href="<?php echo base_url("carrito") ?>" class="user_link">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
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

          <style>
            .newsletter-subscribe {
              color: #313437;
              background-color: #ffffff;
              margin: 30px;
            }

            .newsletter-subscribe .intro {
              font-size: 16px;
              max-width: 500px;
              margin: 0 auto 25px
            }

            .newsletter-subscribe .intro p {
              margin-bottom: 35px
            }

            .newsletter-subscribe form {
              justify-content: center
            }


            .newsletter {
              color: #0062cc !important
            }
          </style>

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