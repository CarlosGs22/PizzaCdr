<?php

use App\Models\Admin\Funciones;
use App\Models\Publico\Productos_modelo;

$encrypter = \Config\Services::encrypter();

$productos_modelo = new Productos_modelo();
$funciones = new Funciones();

$mostrarPanelError = 0;


?>

<?php if($lista_productos){ ?>
<div class="hero_are">

  <div class="shadow rounded carouse-main">
    <!-- Bootstrap carousel-->
    <div class="carousel slide w-100" id="carouselExampleIndicators" data-ride="carousel">

      <div class="carousel-inner w-100">
        <?php if ($lista_productos) {
          $active = "active";
          foreach ($lista_productos as $key => $value) {
            $lista["lista_ingredientes_tamanios"] = $productos_modelo->_obtenerIngredientesTamanio($value["idMenu"], $value["idTipoTamanio"]);

            $validarPorciones = $funciones->findTextByValueInArray($lista["lista_ingredientes_tamanios"], "0", "porcion");

            if (!empty($lista["lista_ingredientes_tamanios"])) {
              if ($validarPorciones == 0) {


                if ($value["slider"] == "1") {
        ?>
                  <div class="carousel-item <?= $active ?>">
                    <div class="media">
                      <section class="about_section layout_padding w-100 panel_section">
                        <div class="container  ">

                          <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="img-box">
                                <img src="<?php echo base_url("public/Admin/img/productos/" . $value["imagen_producto"]) ?>" alt="">
                              </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                              <div class="detail-box">
                                <div class="heading_container">
                                  <h2>
                                    <?= $value["nombre_menu"] ?>
                                  </h2>
                                </div>
                                <p>
                                  <?= $value["descripcion"] ?>
                                </p>

                                <?php
                                $link = bin2hex($encrypter->encrypt($value["idProducto"]));

                                ?>
                                <a href="<?php echo base_url("detalle/" .  $link) ?>">
                                  Ver Más
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>

                    </div>
                  </div>


        <?php $active = "";
                }
              }
            }
          }
        } ?>


      </div>


      <!-- Bootstrap controls [dots]-->
      <a class="carousel-control-prev width-auto" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="fa fa-angle-left text-lg" style="font-size: 60px; color: #ffbe33;"></i>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next width-auto" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="fa fa-angle-right text-lg" style="font-size: 60px; color: #ffbe33;"></i>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
  </div>
</div>


<section class="offer_section layout_padding-bottom">
  <div class="offer_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          Nuestras Promociones
        </h2>
      </div>
      <div class="row">
        <?php
        $cont = 0;
        foreach ($lista_productos as $key => $value) {
          $lista["lista_ingredientes_tamanios"] = $productos_modelo->_obtenerIngredientesTamanio($value["idMenu"], $value["idTipoTamanio"]);

          $validarPorciones = $funciones->findTextByValueInArray($lista["lista_ingredientes_tamanios"], "0", "porcion");

          if (!empty($lista["lista_ingredientes_tamanios"])) {
            if ($validarPorciones == 0) {

              if ($value["idClasificacion"] == 2) {
                if ($cont < 4) {
        ?>
                  <div class="col-sm-12 col-12 col-md-6 col-lg-6 mb-4">
                    <div class="box h-100">
                      <div class="img-box">
                        <img src="<?php echo base_url("public/Admin/img/productos/" . $value["imagen_producto"]) ?>" alt="">

                      </div>
                      <div class="detail-box">
                        <h5>
                          <?= $value["nombre_producto"]; ?>
                        </h5>
                        <h6>
                          <?= $value["precio_producto"]; ?>
                        </h6>
                        <?php
                        $link = bin2hex($encrypter->encrypt($value["idProducto"]));


                        ?>
                        <a class="iconCart" href="<?php echo base_url("detalle/" .  $link) ?>">
                          <i class="icon-copy fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>


                      </div>
                    </div>
                  </div>
        <?php $cont++;
                }
              }
            }
          }
        }
        ?>
      </div>

      <div class="food_section row" style="justify-content: center;">
        <div class="btn-box">
          <a href="<?php echo base_url("menu/promociones") ?>">
            Ver Mas
          </a>
        </div>

      </div>


    </div>
  </div>
</section>


<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Nuestro Menú
      </h2>
    </div>

    <!--<ul class="filters_menu">
      <li class="active" data-filter="*">All</li>
      <li data-filter=".burger">Burger</li>
      <li data-filter=".pizza">Pizza</li>
      <li data-filter=".pasta">Pasta</li>
      <li data-filter=".fries">Fries</li>
    </ul>-->

    <div class="filters-content">
      <div class="row grid">
        <?php if ($lista_productos) {
          $contMenu = 0;
          foreach ($lista_productos as $key => $value) {
            $lista["lista_ingredientes_tamanios"] = $productos_modelo->_obtenerIngredientesTamanio($value["idMenu"], $value["idTipoTamanio"]);

            $validarPorciones = $funciones->findTextByValueInArray($lista["lista_ingredientes_tamanios"], "0", "porcion");

            if (!empty($lista["lista_ingredientes_tamanios"])) {
              if ($validarPorciones == 0) {
                if ($value["idClasificacion"] == 1) {
                  if ($cont < 6) {
        ?>
                    <div class="col-sm-6 col-lg-4 all pizza m-2">
                      <div class="box h-100">
                        <div>
                          <div class="img-box">
                            <img src="<?php echo base_url("public/Admin/img/productos/" . $value["imagen_producto"]) ?>" alt="">
                          </div>
                          <div class="detail-box">
                            <h5>
                              <?= $value["nombre_producto"]; ?>
                            </h5>
                            <p class="txtDescripcion">
                              <?= $value["descripcion"]; ?>
                            </p>
                            <div class="options">
                              <h6>
                                <?= $value["precio_producto"]; ?>
                              </h6>
                              <?php
                              $link = bin2hex($encrypter->encrypt($value["idProducto"]));

                              ?>
                              <a class="iconCart" href="<?php echo base_url("detalle/" . $link) ?>">
                                <i class="icon-copy fa fa-shopping-cart" aria-hidden="true"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        <?php $contMenu++;
                  }
                }
              }
            }
          }
        } ?>

      </div>
    </div>
    <div class="btn-box">
      <a href="<?php echo base_url("menu/individuales") ?>">
        Ver Mas
      </a>
    </div>
  </div>
</section>


<?php  }else{ ?>
  <div class="page-404">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <!--BEGIN CONTENT-->
                <div class="inner-circle"><i class="fa fa-home"></i><span>500</span></div>
                <span class="inner-status">Sitio en mantenimiento</span>
                <span class="inner-detail">
                  Disculpa las demoras estamos resolviéndolo, en breve regresamos!
                </span>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <?php if ($listas_especiales) { ?>
            <img src="<?php echo base_url("public/Admin/img/especiales/" . $listas_especiales[0]["img1"]) ?>" alt="">
          <?php } ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Acerca de Nosotros
            </h2>
          </div>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
            in some form, by injected humour, or randomised words which don't look even slightly believable. If you
            are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
            the middle of text. All
          </p>
          <a href="<?= base_url("nosotros") ?>">
            Ver Más
          </a>
        </div>
      </div>
    </div>
  </div>
</section>