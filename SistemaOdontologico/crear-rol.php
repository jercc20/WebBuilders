<?php
	define('PAGE','crearRol');
	define('TITLE','Crear Rol');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Crear rol</h1>
	<form class="form-add box-wrap clearfix" method="post" action="includes/insert-rol.php">
		<section class="form-section">
			<div class="third-side fl">
				<label for="nombre-rol">Nombre del Rol</label>
				<input id="nombre-rol" type="text" name="txt-role-name" required="required" />
			</div>
			<div class="third-side fr ar">
				<a href="#" id="select-all-rol">Seleccionar todos</a> |
				<a href="#" id="unselect-all-rol">Quitar todos</a>
			</div>
			<section class="chk-group-column">
				<h3>Inicio</h3>
				<label for="consultarRecordatorios">Consultar recordatorios</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarRecordatorios" id="consultarRecordatorios" />
			</section>
			<section class="chk-group-column">
				<h3>Citas</h3>
				<label for="registrarCita">Registrar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarCita" id="registrarCita" />
				<label for="editarCita">Editar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="editarCita" id="editarCita" />
				<label for="eliminarCita">Eliminar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarCita" id="eliminarCita" />
				<label for="consultarCitas">Consultar citas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCitas" id="consultarCitas" />
				<label for="consultarCalendario">Consultar calendario</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCalendario" id="consultarCalendario" />
			</section>
			<section class="chk-group-column">
				<h3>Odontogramas</h3>
				<label for="registrarOdontograma">Registrar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarOdontograma" id="registrarOdontograma" />
				<label for="editarOdontograma">Editar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="editarOdontograma" id="editarOdontograma" />
				<label for="eliminarOdontograma">Eliminar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarOdontograma" id="eliminarOdontograma" />
				<label for="consultarOdontogramas">Consultar odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarOdontogramas" id="consultarOdontogramas" />
			</section>
			<section class="chk-group-column">
				<h3>Bitácoras</h3>
				<label for="registrarBitacora">Registrar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarBitacora" id="registrarBitacora" />
				<label for="editarBitacora">Editar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="editarBitacora" id="editarBitacora" />
				<label for="eliminarBitacora">Eliminar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarBitacora" id="eliminarBitacora" />
				<label for="consultarBitacoras">Consultar bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoras" id="consultarBitacoras" />
				<label for="consultarBitacorasPropias">Consultar bitácoras propias</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacorasPropias" id="consultarBitacorasPropias" />
			</section>
			<section class="chk-group-column">
				<h3>Facturación</h3>
				<label for="registrarFactura">Registrar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarFactura" id="registrarFactura" />
				<label for="eliminarFactura">Eliminar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarFactura" id="eliminarFactura" />
				<label for="consultarFacturas">Consultar facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarFacturas" id="consultarFacturas" />
				<label for="consultarAbonos">Consultar abono</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarAbonos" id="consultarAbonos" />
				<label for="crearAbono">Registar abono</label>
				<input type="checkbox" name="chk-permissions[]" value="crearAbono" id="crearAbono" />
			</section>
			<section class="chk-group-column">
				<h3>Usuarios</h3>
				<label for="registrarUsuario">Registrar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarUsuario" id="registrarUsuario" />
				<label for="editarUsuario">Editar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuario" id="editarUsuario" />
				<label for="eliminarUsuario">Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarUsuario" id="eliminarUsuario" />
				<label for="consultarUsuarios">Consultar usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuarios" id="consultarUsuarios" />
				<label for="consultarUsuariosPacientes">Consultar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuariosPacientes" id="consultarUsuariosPacientes" />
				<label for="crearUsuarioPacientes">Crear usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="crearUsuarioPaciente" id="crearUsuarioPaciente" />
				<label for="editarUsuarioPaciente">Editar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuarioPaciente" id="editarUsuarioPaciente" />
			</section>
			<section class="chk-group-column">
				<h3>Roles</h3>
				<label for="crearRol">Registrar rol</label>
				<input type="checkbox" name="chk-permissions[]" value="crearRol" id="crearRol" />
				<label for="editarRol">Editar rol</label>
				<input type="checkbox" name="chk-permissions[]" value="editarRol" id="editarRol" />
				<label for="eliminarRol">Eliminar rol</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarRol" id="eliminarRol" />
				<label for="consultarRoles">Consultar roles</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarRoles" id="consultarRoles" />
			</section>
			<section class="chk-group-column">
				<h3>Reportes</h3>
				<label for="reporteCitas">Reporte de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteCitas" id="reporteCitas" />
				<label for="reporteOdontogramas">Reporte de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteOdontogramas" id="reporteOdontogramas" />
				<label for="reporteBitacoras">Reporte de bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteBitacoras" id="reporteBitacoras" />
				<label for="reporteFacturacion">Reporte de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteFacturacion" id="reporteFacturacion" />
				<label for="reporteUsuarios">Reporte de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteUsuarios" id="reporteUsuarios" />
				<label for="reporteProcedimientos">Reporte de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteProcedimientos" id="reporteProcedimientos" />
			</section>
			<section class="chk-group-column">
				<h3>Configuración</h3>
				<label for="editarInformacion">Editar la configuración del sistema</label>
				<input type="checkbox" name="chk-permissions[]" value="editarInformacion" id="editarInformacion" />
			</section>
			<section class="chk-group-column">
				<h3>Procedimientos</h3>
				<label for="registrarProcedimiento">Registrar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarProcedimiento" id="registrarProcedimiento" />
				<label for="editarProcedimiento">Editar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="editarProcedimiento" id="editarProcedimiento" />
				<label for="eliminarProcedimiento">Eliminar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarProcedimiento" id="eliminarProcedimiento" />
				<label for="consultarProcedimientos">Consultar procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarProcedimientos" id="consultarProcedimientos" />
			</section>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<button type="submit">Guardar</button>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>