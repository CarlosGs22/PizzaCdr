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

  <title> <?php echo $listas_especiales[0]["img3"] != null ? $listas_especiales[0]["img3"] : "Tienda" ?></title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/bootstrap.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/header.css") ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/font-awesome.min.css") ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/style.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/responsive.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/propios.css") ?>">

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
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
              <g>
                <g>
                  <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"></path>
                </g>
              </g>
              <g>
                <g>
                  <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z"></path>
                </g>
              </g>
              <g>
                <g>
                  <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z"></path>
                </g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
            </svg>
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

                  <form class="form-inline" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
                    <div class="form-group">
                      <h4>Entrega a domicilio</h4>
                    </div>
                    <div class="form-group mr-2">
                      <input type="text" class="form-control" name="txtCp" placeholder="CP" maxlength="5" required>
                    </div>
                    <button type="submit" id="btnBuscarLocalización" class="btn btn-primary mb-2">Buscar</button>
                  </form>
                </div>
                <div class="col-6">
                  <form class="form-inline" action="<?php echo base_url("/buscar_cobertura") ?>" accept-charset="UTF-8" method="post">
                    <div class="form-group">
                      <h4>Recoje en sucursal</h4>
                    </div>
                    <div class="form-group mr-2">
                      <select name="txtSucursal" id="txtSucursal" class="form-control">
                        <option value="0"></option>
                        <?php if ($lista_sucursales) { ?>
                          <?php foreach ($lista_sucursales as $key => $value) { ?>
                            <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] ==  $id_sucursal) ? ' selected="selected"' : ''; ?>><?php echo $value['nombre']; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                    <button type="submit" id="btnSeleccionarSucursal" class="btn btn-primary mb-2">Seleccionar</button>
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
  