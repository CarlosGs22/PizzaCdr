<?php
$cart = \Config\Services::cart();
?>

<style>
	body {
		background: #f5f5f5
	}

	.rounded {
		border-radius: 1rem
	}

	.nav-pills .nav-link {
		color: #555
	}

	.nav-pills .nav-link.active {
		color: white
	}

	input[type="radio"] {
		margin-right: 5px
	}

	.bold {
		font-weight: bold
	}

	body {
		color: #000;
		overflow-x: hidden;
		height: 100%;
		background-color: #f8f9fa;
		background-repeat: no-repeat
	}

	.cardPasarela {
		padding: 30px 25px 35px 50px;
		border-radius: 30px;
		box-shadow: 0px 4px 8px 0px #222831;
		margin-top: 50px;
		margin-bottom: 50px
	}

	.border-line {
		border-right: 1px solid #BDBDBD
	}

	.text-sm {
		font-size: 13px
	}

	.text-md {
		font-size: 18px
	}

	::placeholder {
		color: grey;
		opacity: 1
	}

	:-ms-input-placeholder {
		color: grey
	}

	::-ms-input-placeholder {
		color: grey
	}

	input {
		padding: 2px 0px;
		border: none;
		border-bottom: 1px solid lightgrey;
		margin-bottom: 5px;
		margin-top: 2px;
		box-sizing: border-box;
		color: #000;
		font-size: 16px;
		letter-spacing: 1px;
		font-weight: 500
	}

	input:focus {
		-moz-box-shadow: none !important;
		-webkit-box-shadow: none !important;
		box-shadow: none !important;
		border-bottom: 1px solid #EF5350;
		outline-width: 0
	}

	button:focus {
		-moz-box-shadow: none !important;
		-webkit-box-shadow: none !important;
		box-shadow: none !important;
		outline-width: 0
	}

	.btn-red {
		background-color: #ffbe33;
		color: #fff;
		padding: 8px 25px;
		border-radius: 50px;
		font-size: 18px;
		letter-spacing: 2px;
		border: 2px solid #fff
	}

	.btn-red:hover {
		box-shadow: 0 0 0 2px #222831
	}

	.btn-red:focus {
		box-shadow: 0 0 0 2px #EF5350 !important
	}

	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
		background-color: #EF5350
	}

	@media screen and (max-width: 575px) {
		.border-line {
			border-right: none;
			border-bottom: 1px solid #EEEEEE
		}
	}

	#btnPasarela {
		cursor: pointer;
	}
</style>

<main class="page">
	<section class="shopping-cart dark" id="seccion_cart">
		<div class="container">
			<div class="card cardPasarela">
				<div class="heading_container heading_center" style="padding:15px;">
					<h2>
						Carrito de compra
					</h2>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-8">
						<div class="items">
							<?php

							$totalPrice = 0;
							$subTotal = 0;


							if ($cart->totalItems() > 0) {
								foreach ($cart->contents() as $value) {
									$totalPrice += (int) $value["price"] * (int) $value["qty"];
									$subTotal += (int) $value["price"];

							?>
									<div class="product">
										<div class="row">
											<div class="col-md-3" style="align-self: center;">
												<img class="img-fluid mx-auto d-block image" src="<?= base_url("public/Admin/img/productos/" . $value["img"]) ?>" style="max-width: 100px;">
											</div>
											<div class="col-md-8">
												<div class="info">
													<div class="row">
														<div class="col-md-5 product-name">
															<div class="product-name">
																<a class="secundaryColor" href="#"><?= $value["name"]; ?></a>
																<div class="product-info">
																	<div>
																		<?php
																		$nombres = "";

																		if ($value["options"] != null) {
																			foreach ($value["options"] as $value2) {
																				foreach ($value2 as $value3) { ?>
																					<ul class="list-bullets">
																						<li class="mb-2"><?= $value3["nomProd"] ?></li>
																					</ul>
																		<?php }
																			}
																		} ?>



																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-3 quantity textQty">
															<label for="quantity">Cantidad:</label>
															<input id="quantity" type="number" value="<?= $value["qty"] ?>" class="form-control quantity-input <?= $value["id"] ?>" onkeypress="return isNumberKey(event);" min="1" max="9">
														</div>

														<div class="col-md-3 price">
															<span>$<?= $value["price"] ?></span>
														</div>

														<div class="col-md-1">
															<label for=""></label>
															<a href="<?= base_url("eliminarItem/" . $value["rowid"]) ?>"><i class="fa fa-trash" style="color: red;"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							<?php  }
							} ?>
						</div>
					</div>

					<?php

					$precioEnvio = 0;
					if ($lista_cobertura) {
						foreach ($lista_cobertura as $keyEnvio => $valueEnvio) {
							$precioEnvio = $valueEnvio["precio"];
							break;
						}
					}

					?>
					<div class="col-md-12 col-lg-4">
						<div class="summary">
							<h3>Resúmen</h3>
							<div class="summary-item"><span class="text">Subtotal</span><span class="price" id="labelSubPrice">$<?= $totalPrice ?></span></div>
							<?php
							if ($precioEnvio != 0) { ?>
								<div class="summary-item"><span class="text">Envío</span><span class="price" id="labelSubSend">$<?= $precioEnvio ?></span></div>
							<?php } else { ?>
								<div class="summary-item"><span class="text">Envío</span><span class="price" id="labelSubSend"><span class="badge badge-success">Gratis</span></span></div>
							<?php } ?>

							<div class="summary-item"><span class="text">Total</span><span class="price" id="labelTotalPrice">$<?= $totalPrice + $precioEnvio ?></span></div>
							<a href="<?= base_url("pasarela") ?>" class="btn generalBackgroundColor btn-lg btn-block">Pasarela de Pago</a>
							<a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url("") ?>">Seguir Comprando</a>
							<a class="btn btn-link btn-lg btn-block" href="<?php echo base_url("limpiar_carrito") ?>">Vaciar Carrito</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


</main>


<script>
	$(function() {

		$("#btnPasarela").click(function() {
			$('html, body').animate({
				scrollTop: $("#seccion_pasarela").offset().top
			}, 2000);
		});


		$(".textQty").find("#quantity").blur(function() {

			if (isNumeric($(this).val()) && parseInt(this.value) > 0) {
				$.ajax({
					type: "GET",
					url: "<?= base_url() ?>/accion_cantidad",
					data: {
						id: $(this).attr('class').split(' ').pop(),
						qty: $(this).val()
					},
					dataType: "JSON",
					success: function(data) {
						if (data[0] == 200) {
							$("#labelSubPrice").text("$" + data[1]);
							$("#labelTotalPrice").text("$" + data[2]);
						} else {
							Swal.fire({
								icon: 'error',
								title: '',
								text: 'Ocurrió un error interno'
							});
						}
					},
					error: function(request, status, error) {
						Swal.fire({
							icon: 'error',
							title: '',
							text: 'Ocurrió un error interno'
						});
					}
				});
			}
		});

		$(".textQty").find("#quantity").on('change', function() {

			if (isNumeric($(this).val()) && parseInt(this.value) > 0) {
				$.ajax({
					type: "GET",
					url: "<?= base_url() ?>/accion_cantidad",
					data: {
						id: $(this).attr('class').split(' ').pop(),
						qty: $(this).val()
					},
					dataType: "JSON",
					success: function(data) {
						if (data[0] == 200) {
							var total = 0;

							if (isNumeric($("#labelSubSend").text().replace("$", ""))) {
								total = parseFloat(data[2]) + parseFloat($("#labelSubSend").text().replace("$", ""));
							} else {
								total = data[2];
							}



							$("#labelSubPrice").text("$" + data[2]);
							$("#labelTotalPrice").text("$" + total);
						} else {
							Swal.fire({
								icon: 'error',
								title: '',
								text: 'Ocurrió un error interno'
							});
						}
					},
					error: function(request, status, error) {
						Swal.fire({
							icon: 'error',
							title: '',
							text: 'Ocurrió un error interno'
						});
					}
				});
			}
		});

	});
</script>



<style>
	.bg-gradient {
		background: #C9D6FF;
		background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);
		background: linear-gradient(to right, #E2E2E2, #C9D6FF);
	}

	ul li {
		margin-bottom: 1.4rem;
	}

	.pricing-divider {
		border-radius: 20px;
		background: #C64545;
		padding: 1em 0 4em;
		position: relative;
	}

	.blue .pricing-divider {
		background: #2D5772;
	}

	.green .pricing-divider {
		background: #1AA85C;
	}

	.red b {
		color: #C64545
	}

	.blue b {
		color: #2D5772
	}

	.green b {
		color: #1AA85C
	}

	.pricing-divider-img {
		position: absolute;
		bottom: -2px;
		left: 0;
		width: 100%;
		height: 80px;
	}

	.deco-layer {
		-webkit-transition: -webkit-transform 0.5s;
		transition: transform 0.5s;
	}

	.btn-custom {
		background: #C64545;
		color: #fff;
		border-radius: 20px
	}

	.img-float {
		width: 50px;
		position: absolute;
		top: -3.5rem;
		right: 1rem
	}

	.princing-item {
		transition: all 150ms ease-out;
	}

	.princing-item:hover {
		transform: scale(1.05);
	}

	.princing-item:hover .deco-layer--1 {
		-webkit-transform: translate3d(15px, 0, 0);
		transform: translate3d(15px, 0, 0);
	}

	.princing-item:hover .deco-layer--2 {
		-webkit-transform: translate3d(-15px, 0, 0);
		transform: translate3d(-15px, 0, 0);
	}
</style>