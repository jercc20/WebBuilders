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
	?>
</head>
<body>
	<div id="wrapper">
		<nav id="nav-top">
			<ul id="main-menu" class="clearfix">
				<li id="menu-icon"></li>
				<li><a href="inicio.html">Inicio</a></li>
				<li ><a href="consultar-citas.html">Citas</a>
					<ul>
						<li class="hide"><a href="crear-cita.html">Crear cita</a></li>
						<li class="hide"><a href="editar-cita.html">Editar cita</a></li>
						<li><a href="consultar-calendario.html">Calendario</a></li>
					</ul>
				</li>
				<li><a href="consultar-odontogramas.html">Odontogramas</a>
					<ul>
						<li class="hide"><a href="crear-odontograma.html">Crear odontograma</a></li>
						<li class="hide"><a href="editar-odontograma.html">Editar odontograma</a></li>
					</ul>
				</li>
				<li><a href="consultar-bitacoras.html">Bitácoras</a>
					<ul>
						<li class="hide"><a href="crear-bitacora.html">Crear bitacora</a></li>
						<li class="hide"><a href="editar-bitacora.html">Editar Bitacora</a></li>
					</ul>
				</li>
				<li><a href="consultar-facturas.html">Facturación</a>
					<ul>
						<li><a href="consultar-abonos.html">Abonos</a></li>
						<li class="hide"><a href="crear-abono.html">Crear abono</a></li>
					</ul>
				</li>
				<li><a href="consultar-usuarios.html">Usuarios</a>
					<ul>
						<li class="hide"><a href="crear-usuario.html">Crear usuario</a></li>
						<li><a href="consultar-roles.html">Roles</a></li>
						<li class="hide"><a href="editar-usuario.html">Editar usuario</a></li>
						<li class="hide"><a href="crear-role.html">Crear role</a></li>
						<li class="hide"><a href="editar-role.html">Editar role</a></li>
					</ul>
				</li>
				<li><a href="#">Reportes</a>
					<ul>
						<li><a href="reporte-citas.html">Citas</a></li>
						<li><a href="reporte-odontogramas.html">Odontogramas</a></li>
						<li><a href="reporte-bitacoras.html">Bitácoras</a></li>
						<li><a href="reporte-facturacion.html">Facturación</a></li>
						<li><a href="reporte-usuarios.html">Usuarios</a></li>
						<li><a href="reporte-procedimientos.html">Procedimientos</a></li>
					</ul>
				</li>
				<li><a href="configuracion.html">Configuración</a>
					<ul>
						<li><a href="consultar-procedimiento.html">Procedimientos</a></li>
						<li class="hide"><a href="crear-procedimiento.html">Crear procedimiento</a></li>
						<li class="hide"><a href="editar-procedimiento.html">Editar procedimiento</a></li>
					</ul>
				</li>
				<li id="account">
					<a href="#">user</a>
					<i class="icon-user"></i>
					<i class="icon-arrow-down"></i>
					<ul>
						<li><a href="editar-perfil-usuario.html">Editar perfil</a></li>
						<li><a id="logout" href="#">Cerrar sesión</a></li>
					</ul>
				</li>
				<li id="username">MENU TMP</li>
			</ul>
		</nav>
		<div id="container">