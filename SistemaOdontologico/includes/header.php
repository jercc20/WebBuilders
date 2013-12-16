<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nixie+One" />
	<link rel="stylesheet" href="css/icons.css" />
	<link rel="stylesheet" href="css/style.css" />
	<?php
		if( in_array( 'datatable', $pageConfig['plugins'] ) ):
			?>
			<link rel="stylesheet" href="css/data-table.css" />
			<link rel="stylesheet" href="css/jquery-ui-1.10.3.smoothness.custom.min.css" />
			<?php
		elseif( in_array( 'datepicker', $pageConfig['plugins'] ) ):
			?>
			<link rel="stylesheet" href="css/jquery-ui-1.10.3.smoothness.custom.min.css" />
			<?php
		endif;
		if( in_array( 'calendar', $pageConfig['plugins'] ) ):
			?>
			<link rel="stylesheet" href="css/fullcalendar.css" />
			<link href="css/fullcalendar-print.css"rel="stylesheet" media="print" />
			<?php
		endif;
		if( in_array( 'print', $pageConfig['plugins'] ) ):
			?>
			<link rel="stylesheet" href="css/print.css" />
			<?php
		endif;
	?>
</head>
<body>
	<div id="wrapper">
		<?php if( PAGE != 'login' ) : ?>
			<nav id="nav-top">
				<ul id="main-menu" class="clearfix">
					<li id="menu-icon"></li>
					<li><a href="inicio.php">Inicio</a></li>
					<li ><a href="consultar-citas.php">Citas</a>
						<ul>
							<li class="hide"><a href="crear-cita.php">Crear cita</a></li>
							<li class="hide"><a href="editar-cita.php">Editar cita</a></li>
							<li><a href="consultar-calendario.php">Calendario</a></li>
						</ul>
					</li>
					<li><a href="consultar-odontogramas.php">Odontogramas</a>
						<ul>
							<li class="hide"><a href="crear-odontograma.php">Crear odontograma</a></li>
							<li class="hide"><a href="editar-odontograma.php">Editar odontograma</a></li>
						</ul>
					</li>
					<li><a href="consultar-bitacoras.php">Bitácoras</a>
						<ul>
							<li class="hide"><a href="crear-bitacora.php">Crear bitacora</a></li>
							<li class="hide"><a href="editar-bitacora.php">Editar Bitacora</a></li>
						</ul>
					</li>
					<li><a href="consultar-facturas.php">Facturación</a>
						<ul>
							<li><a href="consultar-abonos.php">Abonos</a></li>
							<li class="hide"><a href="crear-abono.php">Crear abono</a></li>
						</ul>
					</li>
					<li><a href="consultar-usuarios.php">Usuarios</a>
						<ul>
							<li class="hide"><a href="crear-usuario.php">Crear usuario</a></li>
							<li><a href="consultar-roles.php">Roles</a></li>
							<li class="hide"><a href="editar-usuario.php">Editar usuario</a></li>
							<li class="hide"><a href="crear-role.php">Crear role</a></li>
							<li class="hide"><a href="editar-role.php">Editar role</a></li>
						</ul>
					</li>
					<li><a href="#">Reportes</a>
						<ul>
							<li><a href="reporte-citas.php">Citas</a></li>
							<li><a href="reporte-odontogramas.php">Odontogramas</a></li>
							<li><a href="reporte-bitacoras.php">Bitácoras</a></li>
							<li><a href="reporte-facturacion.php">Facturación</a></li>
							<li><a href="reporte-usuarios.php">Usuarios</a></li>
							<li><a href="reporte-procedimientos.php">Procedimientos</a></li>
						</ul>
					</li>
					<li><a href="configuracion.php">Configuración</a>
						<ul>
							<li><a href="consultar-procedimientos.php">Procedimientos</a></li>
							<li class="hide"><a href="crear-procedimiento.php">Crear procedimiento</a></li>
							<li class="hide"><a href="editar-procedimiento.php">Editar procedimiento</a></li>
						</ul>
					</li>
					<li id="account">
						<a href="#">user</a>
						<i class="icon-user"></i>
						<i class="icon-arrow-down"></i>
						<ul>
							<li><a href="editar-perfil-usuario.php">Editar perfil</a></li>
							<li><a id="logout" href="cerrar-sesion.php">Cerrar sesión</a></li>
						</ul>
					</li>
					<li id="username">MENU TMP</li>
				</ul>
			</nav>
		<?php endif; ?>
		<div id="container">