<div class="xs-pd-20-10 pd-ltr-20">
	<div class="page-header">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="title">
					<?php
					$pieces = explode("/", uri_string());
					?>
					<h4><?php echo $pieces[1];  ?></h4>
				</div>
				<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb">

						<li class="breadcrumb-item"><a><?php echo $pieces[0]; ?></a></li>
						<li class="breadcrumb-item"><a><?php echo $pieces[1]; ?></a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Exportar datos</h4>
				</div>
				<div class="pb-20">
					<table class="table hover multiple-select-row data-table-export nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Id</th>
								<th>Nombres</th>
								<th>Apellido paterno</th>
								<th>Aepllido materno</th>
								<th>Télefono</th>
								<th>Creación</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($lista_clientes) {
								foreach ($lista_clientes as $key => $value) { ?>
									<tr>
										<td class="table-plus"><?=$value['id']?></td>
										<td><?=$value['nombres']?></td>
										<td><?=$value['apellido_paterno']?></td>
										<td><?=$value['apellido_materno']?> </td>
										<td><?=$value['telefono']?></td>
										<td><?=$value['cve_fecha']?></td>
									</tr>
							<?php }
							} ?>


						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

</div>