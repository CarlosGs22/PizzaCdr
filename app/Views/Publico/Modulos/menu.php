<?php
$encrypter = \Config\Services::encrypter();
?>
<section class="food_section">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
               <?php echo $lista_name_titulo != null ? $lista_name_titulo["nombre"] : "Menú" ?>
            </h2>
        </div>

        <div class="filters-content">
            <div class="row grid">
                <?php if ($lista_productos) {
                    $contMenu = 0;
                    foreach ($lista_productos as $key => $value) {

                ?>
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
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
                } ?>

            </div>
        </div>
        
        <div class="paginadordiv mt-30">
                        <?php
                        if ($pagina) {
                            echo $pagina;
                        }
                        ?>
                    </div>
       
    </div>
</section>

<!-- end food section -->