<?php
	define('PAGE','consultar-roles'); //nombre de la pagina
	define('TITLE','Consultar Roles'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array() //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Crear rol</h1>
	<form class="form-add box-wrap clearfix" method="post" action="insert-crear-rol.php">
		<section class="form-section">
			<div class="third-side fl">
				<label>Nombre del Rol</label>
				<input type="text" name="txt-role-name" required="required" />
			</div>
			<div class="third-side fr ar">
				<a href="#" id="select-all-rol">Seleccionar todos</a> |
				<a href="#" id="unselect-all-rol">Quitar todos</a>
			</div>
			<section class="chk-group-column">
				<h3>Citas</h3>
				<label>Registrar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarCita" />
				<label>Editar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="editarCita" />
				<label>Eliminar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarCita" />
				<label>Consultar cita</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarCitas" />
				<label>Ingresar a la Sección de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionCitas" />
			</section>
			<section class="chk-group-column">
				<h3>Bitácoras</h3>
				<label>Registrar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarBitacora" />
				<label>Editar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="editarBitacora" />
				<label>Eliminar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarBitacora" />
				<label>Consultar bitácora</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoras" />
				<label>Consultar bitácora propia</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarBitacoraPropia" />
				<label>Ingresar a la Sección de bitacoras</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionBitacoras" />
			</section>
			<section class="chk-group-column">
				<h3>Usuarios</h3>
				<label>Registrar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarUsuario" />
				<label>Editar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuario" />
				<label>Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarUsuario" />
				<label>Consultar usuario</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuario" />
				<label>Consultar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarUsuarioPaciente" />
				<label>Crear usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="crearUsuarioPaciente" />
				<label>Editar usuario tipo paciente</label>
				<input type="checkbox" name="chk-permissions[]" value="editarUsuarioPaciente" />
				<label>Ingresar a la Sección de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionUsuarios" />
			</section>
			<section class="chk-group-column">
				<h3>Odontogramas</h3>
				<label>Registrar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarOdontograma" />
				<label>Editar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="editarOdontograma" />
				<label>Eliminar odontograma</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarOdontograma" />
				<label>Consultar odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarOdontogramas" />
				<label>Ingresar a la Sección de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionOdontogramas" />
			</section>
			<section class="chk-group-column">
				<h3>Facturación</h3>
				<label>Registrar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarFactura" />
				<label>Editar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="editarFactura" />
				<label>Eliminar factura</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarFactura" />
				<label>Consultar facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarFacturas" />
				<label>Ingresar a la Sección de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionFacturas" />
			</section>
			<section class="chk-group-column">
				<h3>Procedimientos</h3>
				<label>Registrar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="registrarProcedimiento" />
				<label>Editar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="editarProcedimiento" />
				<label>Eliminar usario</label>
				<input type="checkbox" name="chk-permissions[]" value="eliminarProcedimiento" />
				<label>Consultar procedimiento</label>
				<input type="checkbox" name="chk-permissions[]" value="consultarProcedimiento" />
				<label>Ingresar a la Sección de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionProcedimientos" />
			</section>
			<section class="chk-group-column">
				<h3>Reportes</h3>
				<label>Reporte de citas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteCitas" />
				<label>Reporte de odontogramas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteOdontogramas" />
				<label>Reporte de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteFacturacion" />
				<label>Reporte de usuarios</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteUsuarios" />
				<label>Reporte de procedimientos</label>
				<input type="checkbox" name="chk-permissions[]" value="reporteProcedimientos" />
			</section>
			<section class="chk-group-column">
				<h3>Configuración</h3>
				<label>Ingresar a la sección de facturas</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionFacturas" />
				<label>Editar información</label>
				<input type="checkbox" name="chk-permissions[]" value="editarInformacion" />
				<label>Ingresar a la configuración</label>
				<input type="checkbox" name="chk-permissions[]" value="ingresarSeccionConfiguracion" />
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