<?php
$cart = \Config\Services::cart();
?>

<main class="page">
	<section class="shopping-cart dark">
		<div class="container">
			<div class="heading_container heading_center" style="padding:15px;">
				<h2>
					Carrito de compra
				</h2>
			</div>
			<div class="content">
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
														<div class="col-md-6 product-name">
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
															<input id="quantity"  type="number" value="<?= $value["qty"] ?>" class="form-control quantity-input <?= $value["id"] ?>" onkeypress="return isNumberKey(event);" min="1" max="9">
														</div>
														<div class="col-md-3 price">
															<span>$<?= $value["price"] ?></span>
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
					<div class="col-md-12 col-lg-4">
						<div class="summary">
							<h3>Resúmen</h3>
							<div class="summary-item"><span class="text">Subtotal</span><span class="price" id="labelSubPrice">$<?= $subTotal ?></span></div>
							<div class="summary-item"><span class="text">Total</span><span class="price" id="labelTotalPrice">$<?= $totalPrice ?></span></div>
							<a class="btn generalBackgroundColor btn-lg btn-block" href="<?php echo base_url("pasarela") ?>">Pasarela de Pago</a>
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
						}else{
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

		$(".textQty").find("#quantity").on('change',function() {
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
						}else{
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