<?php
	define('PAGE','editar-rol'); //nombre de la pagina
	define('TITLE','Editar rol'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array() //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
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
				<h3>Citas</h3>
				<label for="registrarCita">Registrar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarCita" id="registrarCita" <?php if ($tabla['registrarCita']) echo 'checked="checked"';?> />
				<label for="editarCita">Editar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="editarCita" id="editarCita" <?php if ($tabla['editarCita']) echo 'checked="checked"';?> />
				<label for="eliminarCita">Eliminar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarCita" id="eliminarCita" <?php if ($tabla['eliminarCita']) echo 'checked="checked"';?> />
				<label for="consultarCita">Consultar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCita" id="consultarCita" <?php if ($tabla['consultarCita']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionCitas">Ingresar a la Sección de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionCitas" id="ingresarSeccionCitas" <?php if ($tabla['ingresarSeccionCitas']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Bitácoras</h3>
				<label for="registrarBitacora">Registrar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarBitacora" id="registrarBitacora" <?php if ($tabla['registrarBitacora']) echo 'checked="checked"';?> />
				<label for="editarBitacora">Editar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="editarBitacora" id="editarBitacora" <?php if ($tabla['editarBitacora']) echo 'checked="checked"';?> />
				<label for="eliminarBitacora">Eliminar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarBitacora" id="eliminarBitacora" <?php if ($tabla['eliminarBitacora']) echo 'checked="checked"';?> />
				<label for="consultarBitacora">Consultar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacora" id="consultarBitacora" <?php if ($tabla['consultarBitacora']) echo 'checked="checked"';?> />
				<label for="consultarBitacoraPropia">Consultar bitácora propia</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoraPropia" id="consultarBitacoraPropia" <?php if ($tabla['consultarBitacoraPropia']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionBitacoras">Ingresar a la Sección de bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionBitacoras" id="ingresarSeccionBitacoras" <?php if ($tabla['ingresarSeccionBitacoras']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Usuarios</h3>
				<label for="registrarUsuario">Registrar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarUsuario" id="registrarUsuario" <?php if ($tabla['registrarUsuario']) echo 'checked="checked"';?> />
				<label for="editarUsuario">Editar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuario" id="editarUsuario" <?php if ($tabla['editarUsuario']) echo 'checked="checked"';?> />
				<label for="eliminarUsuario">Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarUsuario" id="eliminarUsuario" <?php if ($tabla['eliminarUsuario']) echo 'checked="checked"';?> />
				<label for="consultarUsuario">Consultar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuario" id="consultarUsuario" <?php if ($tabla['consultarUsuario']) echo 'checked="checked"';?> />
				<label for="consultarUsuarioPaciente">Consultar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuarioPaciente" id="consultarUsuarioPaciente" <?php if ($tabla['consultarUsuarioPaciente']) echo 'checked="checked"';?> />
				<label for="crearUsuarioPaciente">Crear usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="crearUsuarioPaciente" id="crearUsuarioPaciente" <?php if ($tabla['crearUsuarioPaciente']) echo 'checked="checked"';?> />
				<label for="editarUsuarioPaciente">Editar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuarioPaciente" id="editarUsuarioPaciente" <?php if ($tabla['editarUsuarioPaciente']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionUsuarios">Ingresar a la Sección de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionUsuarios" id="ingresarSeccionUsuarios" <?php if ($tabla['ingresarSeccionUsuarios']) echo 'checked="checked"';?> />
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
				<label for="ingresarSeccionOdontogramas">Ingresar a la Sección de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionOdontogramas" id="ingresarSeccionOdontogramas" <?php if ($tabla['ingresarSeccionOdontogramas']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Facturación</h3>
				<label for="registrarFactura">Registrar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarFactura" id="registrarFactura" <?php if ($tabla['registrarFactura']) echo 'checked="checked"';?> />
				<label for="editarFactura">Editar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="editarFactura" id="editarFactura" <?php if ($tabla['editarFactura']) echo 'checked="checked"';?> />
				<label for="eliminarFactura">Eliminar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarFactura" id="eliminarFactura" <?php if ($tabla['eliminarFactura']) echo 'checked="checked"';?> />
				<label for="consultarFacturas">Consultar facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarFacturas" id="consultarFacturas" <?php if ($tabla['consultarFacturas']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionFacturas">Ingresar a la Sección de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionFacturas" id="ingresarSeccionFacturas" <?php if ($tabla['ingresarSeccionFacturas']) echo 'checked="checked"';?> />
			</section>
			<section class="chk-group-column">
				<h3>Procedimientos</h3>
				<label for="registrarProcedimiento">Registrar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarProcedimiento" id="registrarProcedimiento" <?php if ($tabla['registrarProcedimiento']) echo 'checked="checked"';?> />
				<label for="editarProcedimiento">Editar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="editarProcedimiento" id="editarProcedimiento" <?php if ($tabla['editarProcedimiento']) echo 'checked="checked"';?> />
				<label for="eliminarProcedimiento">Eliminar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarProcedimiento" id="eliminarProcedimiento" <?php if ($tabla['eliminarProcedimiento']) echo 'checked="checked"';?> />
				<label for="consultarProcedimiento">Consultar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarProcedimiento" id="consultarProcedimiento" <?php if ($tabla['consultarProcedimiento']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionProcedimientos">Ingresar a la Sección de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionProcedimientos" id="ingresarSeccionProcedimientos" <?php if ($tabla['ingresarSeccionProcedimientos']) echo 'checked="checked"';?> />
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
				<h3>Configuración</h3>
				<label for="editarInformacion">Editar información del perfil</label>
				<input type="checkbox" name="chk-permissions[]" value="editarInformacion" id="editarInformacion" <?php if ($tabla['editarInformacion']) echo 'checked="checked"';?> />
				<label for="ingresarSeccionConfiguracion">Editar la configuración del sistema</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionConfiguracion" id="ingresarSeccionConfiguracion" <?php if ($tabla['ingresarSeccionConfiguracion']) echo 'checked="checked"';?> />
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