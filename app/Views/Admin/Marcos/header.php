<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title><?php echo $listas_especiales[0]["img2"] ?></title>

	<link rel="shortcut icon" href="<?php echo base_url("public/Admin/img/especiales/logo1.png") ?>" type="">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/core.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/icon-font.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/style.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/src/plugins/datatables/css/responsive.bootstrap4.min.css") ?> ">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/usuarios.css") ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/promociones.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/sucursales.css") ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Publico/css/detail.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/productos.css") ?>">

	<script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>
	<script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>

	<script src="<?php echo base_url("public/Admin/src/scripts/own.js") ?>"></script>

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


	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>

			<div class="header-search">
				<h1>Bienvenido <?php echo session()->get('nombre'); ?></h1>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="<?php echo base_url(""); ?>" data-toggle="right-sidebar">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
				</div>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown show">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
						<span class="user-icon">
							<img src="<?php echo base_url("public/Admin/img/especiales/logo1.jpg"); ?>" alt="">
						</span>
						<span class="user-name"><?php echo session()->get('usuario'); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" x-placement="bottom-end" style="position: absolute; transform: translate3d(4px, 62px, 0px); top: 0px; left: 0px; will-change: transform;">
						<a class="dropdown-item" href="<?php echo base_url("admin/micuenta"); ?>"><i class="dw dw-user1"></i> Perfil</a>
						<a class="dropdown-item" href="<?php echo base_url("salir"); ?>"><i class="dw dw-logout"></i> Salir</a>
					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">

			<div class="card" style="background: transparent;">
				<div class="card-header">
					<div class="profile_pic">
						<img src="<?php echo base_url("public/Admin/img/usuarios/" . session()->get('imagen') . "") ?>">
					</div>
				</div>
				<div class="card-bodyNav">
					<div class="d-lfex justify-content-center flex-column">
						<div class="name_container">
							<div class="name"><?php echo session()->get('nombre'); ?></div>
						</div>
						<div class="address">Sucursal: <?php echo session()->get('nombre_sucursal'); ?></div>
					</div>


				</div>

			</div>

			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<?php if ($listas_submenu_web) {
						foreach ($listas_submenu_web as $lista => $value) {
					?>
							<li class="dropdown">
								<a href="<?php echo base_url($value['url_submenu_web']) ?>" class="dropdown-toggle">
									<span class="micon <?php echo $value['icono_submenu_web'] ?> "></span><span class="mtext"><?php echo $value['nombre_submenu_web']; ?></span>
								</a>
							</li>
					<?php }
					} ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>


	<div class="main-container">

		<?php if (isset($_SESSION['respuesta'])) : ?>
			<script>
				Swal.fire({
					icon: '<?php echo $_SESSION['respuesta'][1] ?>',
					title: '',
					text: '<?php echo $_SESSION['respuesta'][0] ?>'
				});
			</script>
		<?php endif; ?>

		<style>
			.card-header {
				background-image: url('<?php echo base_url("public/Admin/img/especiales/" . $listas_especiales[0]["img1"]); ?>') !important;
				padding: 0 !important;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				height: 150px;
				position: relative;
				display: flex;
				justify-content: center;
				text-align: center;
				background-position-y: -65px;
			}

			.profile_pic {
				position: absolute;
				bottom: -60px;
				height: 112px;
				width: 112px;
				padding: 5px;
				border: 2px solid #f39c12;
				border-radius: 50%;
			}

			.card-bodyNav {
				padding-top: 55px !important;
			}

			.profile_pic img {
				height: 100px;
				width: 100px;
				border-radius: 50%;
			}

			.name_container {
				display: flex;
				justify-content: center;

			}

			.name {
				font-size: 20px;
				font-weight: 700;
				color: white;
				position: relative;
			}

			.follow {
				padding-top: 20px;
				display: flex;
				justify-content: center;
			}

			.follow_btn {
				background: rgb(244, 111, 48);

				color: #fff;
				border-radius: 12px;
				cursor: pointer;
			}

			.address {
				display: flex;
				justify-content: center;
				font-size: 12px;
				color: white;
			}
		</style>