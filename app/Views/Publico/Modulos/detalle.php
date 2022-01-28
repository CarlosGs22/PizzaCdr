<?php
$encrypter = \Config\Services::encrypter();
?>

<?php

if ($detalle_producto) {

    foreach ($detalle_producto as $key => $value) {
        $idProducto = $value["idProducto"];
        $nombreProducto = $value["nombre_producto"];
        $menu = $value["nombre_menu"];
        $precioProducto = $value["precioProducto"];
        $descripcion = $value["descripcion"];
        $total = $value["total_productol"];
        $idClasificacion = $value["idClasificacion"];
    }
}

?>


<div class="pd-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="slider" class="owl-carousel product-slider">
                    <?php
                    if ($lista_imagenes) {
                        foreach ($lista_imagenes as $key => $valueI) {
                    ?>
                            <div class="item text-center">
                                <img class="imgDetail" src="<?= base_url("public/Admin/img/productos/" . $valueI["imagen"]) ?>" />
                            </div>
                    <?php }
                    } ?>

                </div>
                <div id="thumb" class="owl-carousel product-thumb">
                    <?php
                    if ($lista_imagenes) {
                        foreach ($lista_imagenes as $key => $valueI) {
                    ?>
                            <div class="item">
                                <img style="width: 70%;" src="<?= base_url("public/Admin/img/productos/" . $valueI["imagen"]) ?>" />
                            </div>
                    <?php }
                    } ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="product-dtl">
                    <form action="<?= base_url("accion_carrito") ?>" method="POST">

                        <div class="product-info">
                            <div class="heading_container head_detail">

                                <h2>
                                    <?= $nombreProducto ?>
                                </h2>
                            </div>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" checked />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" checked />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <!--<span>3 Reviews</span>-->
                            </div>
                            <div class="product-price-discount"><span>$<?= $precioProducto != null ? $precioProducto : "0" ?></span>
                                <!--<span class="line-through">$29.00</span>-->
                            </div>
                        </div>
                        <p><?= $descripcion != null ? $descripcion : "" ?></p>
                        <div class="row">
                            <?php if ($idClasificacion == 1) { ?>
                                <div class="col-12 col-md-6">
                                    <h6><strong>Ingredientes</strong></h6>
                                    <ul class="list-group ingredienteLista">
                                        <?php
                                        if ($lista_menu_ingrediente) {

                                            foreach ($lista_menu_ingrediente as $key => $valueIn) {
                                        ?>
                                                <li class="list-item"><i class="icon-copy fa fa-caret-right mx-2"></i><?= $valueIn["ingredienteNombre"] ?></li>

                                        <?php }
                                        } ?>

                                    </ul>
                                </div>
                            <?php } ?>

                            <?php if ($total > 1) { ?>

                                <div class="col-12 col-md-6">
                                    <h6><strong>Personaliza tu orden</strong></h6>
                                    <div class="row">
                                        <?php for ($i = 0; $i < $total; $i++) {   ?>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Pizza <?= ($i + 1) ?></label>
                                                    <select name="prod_exis<?= ($i + 1) ?>" class="form-control">
                                                        <?php if ($listas_producto_existente) {
                                                        ?>
                                                            <?php foreach ($listas_producto_existente as $key => $value) {
                                                                $idValueProd = bin2hex($encrypter->encrypt($value["idProducto"])); ?>
                                                                <option value="<?= $idValueProd ?>"><?= $value["nombre_menu"] ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="product-count">
                            <label for="size">Cantidad</label>
                            <div class="row">
                                <div class="col-12 display-flex">
                                    <div class="qtyminus">-</div>
                                    <?php
                                    $idValueProduct = bin2hex($encrypter->encrypt($idProducto));
                                    ?>
                                    <input type="hidden" name="idProducto" value="<?= $idValueProduct;  ?>">
                                    <input type="text" name="qty" value="1" class="qty" maxlength="1" oninput="restrict(this);">
                                    <div class="qtyplus">+</div>
                                </div>
                                <input type="submit" class="round-black-btn" style="background: #ffbe33; border:none;" value="Añadir al pedido">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--<div class="product-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="review-heading">REVIEWS</div>
                    <p class="mb-20">There are no reviews yet.</p>
                    <form class="review-form">
                        <div class="form-group">
                            <label>Your rating</label>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your message</label>
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Name*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Email Id*">
                                </div>
                            </div>
                        </div>
                        <button class="round-black-btn">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>-->
</div>
</div>



<script>
    $(document).ready(function() {
        var slider = $("#slider");
        var thumb = $("#thumb");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;
        slider.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200
        }).on('changed.owl.carousel', syncPosition);
        thumb
            .on('initialized.owl.carousel', function() {
                thumb.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                item: 4,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage,
                navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            thumb
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumb.find('.owl-item.active').length - 1;
            var start = thumb.find('.owl-item.active').first().index();
            var end = thumb.find('.owl-item.active').last().index();
            if (current > end) {
                thumb.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                thumb.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                slider.data('owl.carousel').to(number, 100, true);
            }
        }
        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            slider.data('owl.carousel').to(number, 300, true);
        });


        $(".qtyminus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    $(".qty").val(parseInt(now) - 1);

                }

            }
        });

        $(".qtyplus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now) && parseInt(now) < 10) {
                $(".qty").val(parseInt(now) + 1);
            }
        });


    });
</script>