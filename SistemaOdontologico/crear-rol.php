<?php
	define('PAGE','consultar-roles');
	define('TITLE','Consultar Roles');
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
				<h3>Citas</h3>
				<label for="registrarCita">Registrar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarCita" id="registrarCita" />
				<label for="editarCita">Editar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="editarCita" id="editarCita" />
				<label for="eliminarCita">Eliminar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarCita" id="eliminarCita" />
				<label for="consultarCita">Consultar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCita" id="consultarCita" />
				<label for="ingresarSeccionCitas">Ingresar a la Sección de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionCitas" id="ingresarSeccionCitas" />
			</section>
			<section class="chk-group-column">
				<h3>Bitácoras</h3>
				<label for="registrarBitacora">Registrar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarBitacora" id="registrarBitacora" />
				<label for="editarBitacora">Editar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="editarBitacora" id="editarBitacora" />
				<label for="eliminarBitacora">Eliminar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarBitacora" id="eliminarBitacora" />
				<label for="consultarBitacora">Consultar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacora" id="consultarBitacora" />
				<label for="consultarBitacoraPropia">Consultar bitácora propia</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoraPropia" id="consultarBitacoraPropia" />
				<label for="ingresarSeccionBitacoras">Ingresar a la Sección de bitácoras</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionBitacoras" id="ingresarSeccionBitacoras" />
			</section>
			<section class="chk-group-column">
				<h3>Usuarios</h3>
				<label for="registrarUsuario">Registrar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarUsuario" id="registrarUsuario" />
				<label for="editarUsuario">Editar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuario" id="editarUsuario" />
				<label for="eliminarUsuario">Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarUsuario" id="eliminarUsuario" />
				<label for="consultarUsuario">Consultar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuario" id="consultarUsuario" />
				<label for="consultarUsuarioPaciente">Consultar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuarioPaciente" id="consultarUsuarioPaciente" />
				<label for="crearUsuarioPaciente">Crear usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="crearUsuarioPaciente" id="crearUsuarioPaciente" />
				<label for="editarUsuarioPaciente">Editar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuarioPaciente" id="editarUsuarioPaciente" />
				<label for="ingresarSeccionUsuarios">Ingresar a la Sección de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionUsuarios" id="ingresarSeccionUsuarios" />
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
				<label for="ingresarSeccionOdontogramas">Ingresar a la Sección de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionOdontogramas" id="ingresarSeccionOdontogramas" />
			</section>
			<section class="chk-group-column">
				<h3>Facturación</h3>
				<label for="registrarFactura">Registrar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarFactura" id="registrarFactura" />
				<label for="editarFactura">Editar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="editarFactura" id="editarFactura" />
				<label for="eliminarFactura">Eliminar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarFactura" id="eliminarFactura" />
				<label for="consultarFacturas">Consultar facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarFacturas" id="consultarFacturas" />
				<label for="ingresarSeccionFacturas">Ingresar a la Sección de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionFacturas" id="ingresarSeccionFacturas" />
			</section>
			<section class="chk-group-column">
				<h3>Procedimientos</h3>
				<label for="registrarProcedimiento">Registrar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarProcedimiento" id="registrarProcedimiento" />
				<label for="editarProcedimiento">Editar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="editarProcedimiento" id="editarProcedimiento" />
				<label for="eliminarProcedimiento">Eliminar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarProcedimiento" id="eliminarProcedimiento" />
				<label for="consultarProcedimiento">Consultar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarProcedimiento" id="consultarProcedimiento" />
				<label for="ingresarSeccionProcedimientos">Ingresar a la Sección de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionProcedimientos" id="ingresarSeccionProcedimientos" />
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
				<label for="editarInformacion">Editar información</label>
				<input type="checkbox" name="chk-permissions[]" value="editarInformacion" id="editarInformacion" />
				<label for="ingresarSeccionConfiguracion">Ingresar a la configuración</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionConfiguracion" id="ingresarSeccionConfiguracion" />
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