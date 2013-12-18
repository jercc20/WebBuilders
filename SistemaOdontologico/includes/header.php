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
					<li><a href="inicio.php">Inicio</a>
					<?php if( check_permission( array('registrarCita', 'registrarBitacora', 'registrarOdontograma') ) ) : ?>
						<ul>
							<li class="hide"><a href="select-usuario.php">Seleccionar Usuario</a></li>
						</ul>
					<?php endif; ?>
					</li>
					<?php if( check_permission('consultarCitas') ) : ?>
						<li><a href="consultar-citas.php">Citas</a>
							<ul>
								<?php if( check_permission('registrarCita') ) : ?>
									<li class="hide"><a href="crear-cita.php">Crear cita</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarCita') ) : ?>
									<li class="hide"><a href="editar-cita.php">Editar cita</a></li>
								<?php endif; ?>
								<?php if( check_permission('consultarCalendario') ) : ?>
									<li><a href="consultar-calendario.php">Calendario</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php if( check_permission('consultarOdontogramas') ) : ?>
						<li><a href="consultar-odontogramas.php">Odontogramas</a>
							<ul>
								<?php if( check_permission('registrarOdontograma') ) : ?>
									<li class="hide"><a href="crear-odontograma.php">Crear odontograma</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarOdontograma') ) : ?>
									<li class="hide"><a href="editar-odontograma.php">Editar odontograma</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php if( check_permission('consultarBitacoras') ) : ?>
						<li><a href="consultar-bitacoras.php">Bitácoras</a>
							<ul>
								<?php if( check_permission('registrarBitacora') ) : ?>
									<li class="hide"><a href="crear-bitacora.php">Crear bitacora</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarBitacora') ) : ?>
									<li class="hide"><a href="editar-bitacora.php">Editar Bitacora</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php elseif( check_permission('consultarBitacorasPropias') ) : ?>
						<li><a href="consultar-bitacoras-propias.php">Bitácoras</a></li>
					<?php endif; ?>
					<?php if( check_permission('consultarFacturas') ) : ?>
						<li><a href="consultar-facturas.php">Facturación</a>
							<ul>
								<?php if( check_permission('consultarAbonos') ) : ?>
									<li><a href="consultar-abonos.php">Abonos</a></li>
								<?php endif; ?>
								<?php if( check_permission('crearAbono') ) : ?>
									<li class="hide"><a href="crear-abono.php">Crear abono</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php if( check_permission('consultarUsuarios') ) : ?>
						<li><a href="consultar-usuarios.php">Usuarios</a>
							<ul>
								<?php if( check_permission('registrarUsuario') ) : ?>
									<li class="hide"><a href="crear-usuario.php">Crear usuario</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarUsuario') ) : ?>
									<li class="hide"><a href="editar-usuario.php">Editar usuario</a></li>
								<?php endif; ?>
								<?php if( check_permission('consultarRoles') ) : ?>
									<li><a href="consultar-roles.php">Roles</a></li>
								<?php endif; ?>
								<?php if( check_permission('crearRol') ) : ?>
									<li class="hide"><a href="crear-rol.php">Crear rol</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarRol') ) : ?>
									<li class="hide"><a href="editar-rol.php">Editar role</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php elseif( check_permission('consultarUsuariosPacientes') ) : ?>
						<li><a href="consultar-usuarios-pacientes.php">Usuarios</a>
							<ul>
								<?php if( check_permission('registrarUsuarioPaciente') ) : ?>
									<li class="hide"><a href="crear-usuario-paciente.php">Crear usuario</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarUsuarioPaciente') ) : ?>
									<li class="hide"><a href="editar-usuario-paciente.php">Editar usuario</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php if( check_permission( array('reporteCitas', 'reporteOdontogramas', 'reporteBitacoras', 'reporteFacturacion', 'reporteUsuarios', 'reporteProcedimientos') ) ) : ?>
						<li><a href="#">Reportes</a>
							<ul>
								<?php if( check_permission('reporteCitas') ) : ?>
									<li><a href="reporte-citas.php">Citas</a></li>
								<?php endif; ?>
								<?php if( check_permission('reporteOdontogramas') ) : ?>
									<li><a href="reporte-odontogramas.php">Odontogramas</a></li>
								<?php endif; ?>
								<?php if( check_permission('reporteBitacoras') ) : ?>
									<li><a href="reporte-bitacoras.php">Bitácoras</a></li>
								<?php endif; ?>
								<?php if( check_permission('reporteFacturacion') ) : ?>
									<li><a href="reporte-facturacion.php">Facturación</a></li>
								<?php endif; ?>
								<?php if( check_permission('reporteUsuarios') ) : ?>
									<li><a href="reporte-usuarios.php">Usuarios</a></li>
								<?php endif; ?>
								<?php if( check_permission('reporteProcedimientos') ) : ?>
									<li><a href="reporte-procedimientos.php">Procedimientos</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<?php if( check_permission('editarInformacion') ) : ?>
						<li><a href="configuracion.php">Configuración</a>
							<ul>
								<?php if( check_permission('consultarProcedimientos') ) : ?>
									<li><a href="consultar-procedimientos.php">Procedimientos</a></li>
								<?php endif; ?>
								<?php if( check_permission('registrarProcedimiento') ) : ?>
									<li class="hide"><a href="crear-procedimiento.php">Crear procedimiento</a></li>
								<?php endif; ?>
								<?php if( check_permission('editarProcedimiento') ) : ?>
									<li class="hide"><a href="editar-procedimiento.php">Editar procedimiento</a></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endif; ?>
					<li id="account">
						<a href="#">user</a>
						<i class="icon-user"></i>
						<i class="icon-arrow-down"></i>
						<ul>
							<li><a href="editar-perfil-usuario.php">Editar perfil</a></li>
							<li><a id="logout" href="cerrar-sesion.php">Cerrar sesión</a></li>
						</ul>
					</li>
					<li id="username"><?php echo $_SESSION['userinfo']['nombre']; ?></li>
				</ul>
			</nav>
		<?php endif; ?>
		<div id="container">