<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title><?php echo $listas_especiales[0]["img2"] ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("public/Admin/vendors/images/apple-touch-icon.png") ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("public/Admin/vendors/images/favicon-32x32.png") ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("public/Admin/vendors/images/favicon-16x16.png") ?>">

	<!-- Mobile Specific Metas -->
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
	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/Admin/vendors/styles/productos.css") ?>">
	
	<script src="<?php echo base_url("public/Admin/vendors/scripts/jquery-3.6.0.min.js") ?>"></script>
	<script src="<?php echo base_url("public/Admin/src/plugins/sweetalert2/sweetalert2.all.js"); ?>"></script>

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
			background: url('https://lkp.dispendik.surabaya.go.id/assets/loading.gif') 50% 50% no-repeat rgb(249, 249, 249);
		}
	</style>


	<script>
		$(function() {
			$(".loader").slideUp(1000);
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
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img class="h-100 w-100" src="<?php echo base_url("public/Admin/img/usuarios/" . session()->get('imagen') . "") ?>" alt="mi imagen">
						</span>
						<span class="user-name"><?php echo session()->get('usuario'); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
						<a class="dropdown-item" href="<?php echo base_url("salir"); ?>"><i class="dw dw-logout"></i> Salir</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
			
				<img src="<?php echo base_url("public/Admin/img/especiales/".$listas_especiales[0]["img1"]); ?>" alt="" class="dark-logo">
				<img src="<?php echo base_url("public/Admin/img/especiales/".$listas_especiales[0]["img1"]); ?>" alt="" class="light-logo">
		
			</a>
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