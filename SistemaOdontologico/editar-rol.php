<?php
	define('PAGE','editarRol');
	define('TITLE','Editar rol');
	$pageConfig = array(
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

	$id = ( isset($_GET['id'] ) ) ? $_GET['id'] : '';
	$tabla = get_array_roles($id);
?>
	<h1 class="ac">Editar rol</h1>
	<form class="form-add box-wrap clearfix" method="post" action="includes/update-rol.php">
		<section class="form-section">
			<div class="third-side fl">
				<label for="nombre-rol">Nombre del Rol</label>
				<input id="nombre-rol" type="text" name="txt-role-name" required="required" readonly="readonly" value="<?php echo $tabla['nombreRol']; ?>" />
			</div>
			<div class="third-side fr ar">
				<a href="#" id="select-all-rol">Seleccionar todos</a> |
				<a href="#" id="unselect-all-rol">Quitar todos</a>
			</div>
			<section class="chk-group-column">
				<h3>Inicio</h3>
				<label for="consultarRecordatorios">Consultar recordatorios</label>
				<input type="checkbox" <?php if ($tabla['consultarRecordatorios']) echo 'checked="checked"';?>  name="chk-permissions[]" value="consultarRecordatorios" id="consultarRecordatorios" />
			</section>
			<section class="chk-group-column">
				<h3>Citas</h3>
				<label for="registrarCita">Registrar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarCita" id="registrarCita" <?php if ($tabla['registrarCita']) echo 'checked="checked"';?> />
				<label for="editarCita">Editar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="editarCita" id="editarCita" <?php if ($tabla['editarCita']) echo 'checked="checked"';?> />
				<label for="eliminarCita">Eliminar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarCita" id="eliminarCita" <?php if ($tabla['eliminarCita']) echo 'checked="checked"';?> />
				<label for="consultarCitas">Consultar citas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCitas" id="consultarCitas" <?php if ($tabla['consultarCitas']) echo 'checked="checked"';?> />
				<label for="consultarCalendario">Consultar calendario</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['consultarCalendario']) echo 'checked="checked"';?> value="consultarCalendario" id="consultarCalendario" />
			</section>
			<section class="chk-group-column">
				<h3>Odontogramas</h3>
				<label for="registrarOdontograma">Registrar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarOdontograma" id="registrarOdontograma" <?php if ($tabla['registrarOdontograma']) echo 'checked="checked"';?> />
				<label for="editarOdontograma">Editar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="editarOdontograma" id="editarOdontograma" <?php if ($tabla['editarOdontograma']) echo 'checked="checked"';?> />
				<label for="eliminarOdontograma">Eliminar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarOdontograma" id="eliminarOdontograma" <?php if ($tabla['eliminarOdontograma']) echo 'checked="checked"';?> />
				<label for="consultarOdontogramas">Consultar odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarOdontogramas" id="consultarOdontogramas" <?php if ($tabla['consultarOdontogramas']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Bitácoras</h3>
				<label for="registrarBitacora">Registrar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarBitacora" id="registrarBitacora" <?php if ($tabla['registrarBitacora']) echo 'checked="checked"';?> />
				<label for="editarBitacora">Editar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="editarBitacora" id="editarBitacora" <?php if ($tabla['editarBitacora']) echo 'checked="checked"';?> />
				<label for="eliminarBitacora">Eliminar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarBitacora" id="eliminarBitacora" <?php if ($tabla['eliminarBitacora']) echo 'checked="checked"';?> />
				<label for="consultarBitacoras">Consultar bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoras" id="consultarBitacoras" <?php if ($tabla['consultarBitacoras']) echo 'checked="checked"';?> />
				<label for="consultarBitacorasPropias">Consultar bitácoras propias</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacorasPropias" id="consultarBitacorasPropias" <?php if ($tabla['consultarBitacorasPropias']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Facturación</h3>
				<label for="registrarFactura">Registrar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarFactura" id="registrarFactura" <?php if ($tabla['registrarFactura']) echo 'checked="checked"';?> />
				<label for="eliminarFactura">Eliminar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarFactura" id="eliminarFactura" <?php if ($tabla['eliminarFactura']) echo 'checked="checked"';?> />
				<label for="consultarFacturas">Consultar facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarFacturas" id="consultarFacturas" <?php if ($tabla['consultarFacturas']) echo 'checked="checked"';?> />
				<label for="consultarAbonos">Consultar abonos</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['consultarAbonos']) echo 'checked="checked"';?>  value="consultarAbonos" id="consultarAbonos" />
				<label for="crearAbono">Registar abono</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['crearAbono']) echo 'checked="checked"';?>  value="crearAbono" id="crearAbono" />
			</section>
			<section class="chk-group-column">
				<h3>Usuarios</h3>
				<label for="registrarUsuario">Registrar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarUsuario" id="registrarUsuario" <?php if ($tabla['registrarUsuario']) echo 'checked="checked"';?> />
				<label for="editarUsuario">Editar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuario" id="editarUsuario" <?php if ($tabla['editarUsuario']) echo 'checked="checked"';?> />
				<label for="eliminarUsuario">Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarUsuario" id="eliminarUsuario" <?php if ($tabla['eliminarUsuario']) echo 'checked="checked"';?> />
				<label for="consultarUsuarios">Consultar usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuarios" id="consultarUsuarios" <?php if ($tabla['consultarUsuarios']) echo 'checked="checked"';?> />
				<label for="consultarUsuariosPacientes">Consultar usuarios tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuariosPacientes" id="consultarUsuariosPacientes" <?php if ($tabla['consultarUsuariosPacientes']) echo 'checked="checked"';?> />
				<label for="crearUsuarioPaciente">Registrar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="crearUsuarioPaciente" id="crearUsuarioPaciente" <?php if ($tabla['crearUsuarioPaciente']) echo 'checked="checked"';?> />
				<label for="editarUsuarioPaciente">Editar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuarioPaciente" id="editarUsuarioPaciente" <?php if ($tabla['editarUsuarioPaciente']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Roles</h3>
				<label for="crearRol">Registrar rol</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['crearRol']) echo 'checked="checked"';?> value="crearRol" id="crearRol" />
				<label for="editarRol">Editar rol</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['editarRol']) echo 'checked="checked"';?> value="editarRol" id="editarRol" />
				<label for="eliminarRol">Eliminar rol</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['eliminarRol']) echo 'checked="checked"';?> value="eliminarRol" id="eliminarRol" />
				<label for="consultarRoles">Consultar roles</label>
				<input type="checkbox" name="chk-permissions[]" <?php if ($tabla['consultarRoles']) echo 'checked="checked"';?> value="consultarRoles" id="consultarRoles" />
			</section>
			<section class="chk-group-column">
				<h3>Reportes</h3>
				<label for="reporteCitas">Reporte de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteCitas" id="reporteCitas" <?php if ($tabla['reporteCitas']) echo 'checked="checked"';?> />
				<label for="reporteOdontogramas">Reporte de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteOdontogramas" id="reporteOdontogramas" <?php if ($tabla['reporteOdontogramas']) echo 'checked="checked"';?> />
				<label for="reporteBitacoras">Reporte de bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteBitacoras" id="reporteBitacoras" <?php if ($tabla['reporteBitacoras']) echo 'checked="checked"';?> />
				<label for="reporteFacturacion">Reporte de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteFacturacion" id="reporteFacturacion" <?php if ($tabla['reporteFacturacion']) echo 'checked="checked"';?> />
				<label for="reporteUsuarios">Reporte de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteUsuarios" id="reporteUsuarios" <?php if ($tabla['reporteUsuarios']) echo 'checked="checked"';?> />
				<label for="reporteProcedimientos">Reporte de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteProcedimientos" id="reporteProcedimientos" <?php if ($tabla['reporteProcedimientos']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Procedimientos</h3>
				<label for="registrarProcedimiento">Registrar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarProcedimiento" id="registrarProcedimiento" <?php if ($tabla['registrarProcedimiento']) echo 'checked="checked"';?> />
				<label for="editarProcedimiento">Editar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="editarProcedimiento" id="editarProcedimiento" <?php if ($tabla['editarProcedimiento']) echo 'checked="checked"';?> />
				<label for="eliminarProcedimiento">Eliminar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarProcedimiento" id="eliminarProcedimiento" <?php if ($tabla['eliminarProcedimiento']) echo 'checked="checked"';?> />
				<label for="consultarProcedimientos">Consultar procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarProcedimientos" id="consultarProcedimientos" <?php if ($tabla['consultarProcedimientos']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Configuración</h3>
				<label for="editarInformacion">Editar la configuración del sistema</label>
				<input type="checkbox" name="chk-permissions[]" value="editarInformacion" id="editarInformacion" <?php if ($tabla['editarInformacion']) echo 'checked="checked"';?> />
			</section>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<button type="submit">Guardar</button>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>