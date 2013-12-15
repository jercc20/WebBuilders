<?php
/*---------Consultar Procedimientos----------------- */
function display_procedimientos_rows(){
	$procedimientos = get_procedimientos();
	while ($fila = mysql_fetch_assoc($procedimientos)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"] . '</td>';
			echo '<td>' . $fila["Costo"]  . '</td>';
			echo '<td>' . $fila["descripcion"] . '</td>';
			echo '<td><a href="editar-procedimiento.php?idProcedimiento=' . $fila['idProcedimiento'] . '"><i class="icon-edit"></i></a><a href="#!?idProcedimiento=' . $fila['idProcedimiento'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_procedimientos(){
	$query = "SELECT * FROM tbprocedimientos";
	$result = do_query( $query );
	return $result;
}

/*-------------------Consultar Citas------------------ */

function display_citas_rows(){
	$citas = get_citas();
	while ($fila = mysql_fetch_assoc($citas)) {
		echo '<tr>';
			echo '<td>' . $fila["p_nombre"] . " " . $fila["p_apellido"] . '</td>';
			echo '<td>' . $fila["p_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " " . $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["tipoCita"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $fila["hora"] . ':' . $fila["minutos"] . '</td>';
			echo '<td>' . $fila["notas"] . '</td>';
			echo '<td><a href="editar-cita.php?idPaciente=' . $fila['idPaciente'] . '&idCita=' . $fila['idCita'] . '"><i class="icon-edit"></i></a><a href="#!?idCita=' . $fila['idCita'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_citas(){
	$query = "SELECT c.*, p.nombre AS p_nombre,
				o.nombre AS o_nombre,
				p.primerApellido AS p_apellido,
				o.primerApellido AS o_apellido,
				p.identificacion AS p_id
			FROM tbcitas AS c
			LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)
			LEFT JOIN tbusuarios AS o ON (o.idUsuario = c.idOdontologo)";
	$result = do_query( $query );
	return $result;
}

/*---------Seleccionar usuarios paciente----------------- */

function display_slt_patient_rows(){
	$redirect = ( isset( $_GET['url'] ) ) ? $_GET['url'] : '';
	$slt_patient = get_slt_patient();
	while ($fila = mysql_fetch_assoc($slt_patient)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"] . " " . $fila["primerApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td><a href="' . $redirect . '?id='. $fila["idUsuario"] .'"><i class="icon-correct"></i></a></td>';
		echo '</tr>';
	}
}

function get_slt_patient(){
	$query = "SELECT * FROM tbusuarios WHERE idRol = 2";
	$result = do_query( $query );
	return $result;
}

/*-----------Mostrar datos usuario - identificación crear cita----------------- */

function display_crear_cita_rows(){
	$crearCita = get_crear_cita();

	$fila = mysql_fetch_array($crearCita);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];
	$id_patient = $fila['idUsuario'];

	echo "<input type='hidden' name='id_patient' value='$id_patient' />";
	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_crear_cita(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

/*-----------Mostrar datos usuario - identificación editar cita----------------- */

function display_editar_cita_rows(){
	$editarCita = get_editar_cita();

	$fila = mysql_fetch_array($editarCita);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_editar_cita(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

/*-----------Mostrar datos editar cita----------------- */

function display_editar_cita_2_rows(){
	$editarCita_2 = get_editar_cita_2();

	$fila = mysql_fetch_array($editarCita_2);
	$date = $fila['fecha'];
	$hour = $fila['hora'];
	$minute = $fila['minutos'];
	$tipoCita = $fila['tipoCita'];
	$odontologo = $fila['idOdontologo'];
	$notes = $fila['notas'];
	$id_cita = $fila['idCita'];

	echo "<input type='hidden' name='id_cita' value='$id_cita' />";
	echo "<label for='txt-date'>Fecha</label>";
	echo "<input id='txt-date' class='datepicker' name='txt_date' type='text' required='required' placeholder='dd-mm-yyyy' pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d' value='$date' />";
	echo "<label for='hour'>Hora</label>";
		echo "<select id='hour' name='slt-hour' required='required' value='$hour'>";
			echo "<option value=''>--Seleccione la hora--</option>";
			for($i=0; $i<24; $i++ ){
				echo "<option value='$i'>$i</option>";
			}
		echo "</select>";
		echo "<select id='minute' name='slt-minute' required='required'>";
			echo "<option value=''>--Seleccione los minutos--</option>";
			for($i=0; $i<60; $i=$i+5 ){
				echo "<option value='$i'>$i</option>";
			}
		echo "</select>";
			echo "<label for='type'>Tipo de cita</label>";
			echo "<select id='type' name='slt-cita' required='required'>";
				echo "<option value=''>--Seleccione el tipo de cita--</option>";
				echo "<option value='Normal'>Normal</option>";
				echo "<option value='Emergencia'>Emergencia</option>";
				echo "</select>";
			echo "<label for='dentist-name'>Seleccione el odontologo</label>";
			
			menu_desplegable_usuarios(3,1,'slt-odontologo');
			
			echo "<label for='notes'>Notas</label>";
			echo "<textarea id='notes' name='txt-notes'>$notes</textarea>";
}

function get_editar_cita_2(){
	$idCita = ( isset( $_GET['idCita'] ) ) ? $_GET['idCita'] : '';
	$query = "SELECT * FROM tbcitas WHERE idCita = $idCita";

	$result = do_query( $query );
	return $result;
}

/*------------Crear cita----------------- */

function display_edit_procedure_rows(){
	$procedure = get_procedure();

	$fila = mysql_fetch_array($procedure);
	$nombre = $fila['nombre'];
	$costo = $fila['Costo'];
	$descripcion = $fila['descripcion'];
	$idProcedimiento = $fila['idProcedimiento'];

	echo "<input type='hidden' name='idProcedimiento' value='$idProcedimiento' />";
	echo "<label for='name'>Nombre del procedimiento</label>";
	echo "<input id='name' name='txt_name' type='text' required='required' pattern='[a-z A-Z 0-9]+' value='$nombre' />";
	echo "<label for='cost'>Costo del procedimiento</label>";
	echo "<input id='cost' name='txt_cost' type='text' required='required' pattern='[0-9]+' value='$costo' />";
	echo "<label for='notes'>Descripción</label>";
	echo "<textarea id='notes' name='txt_description'>$descripcion</textarea>";
}

function get_procedure(){
	$id = ( isset( $_GET['idProcedimiento'] ) ) ? $_GET['idProcedimiento'] : '';
	$query = "SELECT * FROM tbprocedimientos WHERE idProcedimiento = $id";

	$result = do_query( $query );
	return $result;
}

/*------------Menu desplegable odontologo----------------- */

function menu_desplegable_usuarios($id,$valor,$nombre){
	$query ="SELECT idUsuario, nombre, primerApellido, identificacion FROM tbusuarios WHERE idRol = $id";
	$result = do_query( $query );
	echo "<select name='$nombre'>";
	while ($fila=mysql_fetch_row($result)){
	if ($fila[0]==$valor){
		echo "<option selected value='$fila[0]'>$fila[1] $fila[2] $fila[3]</option>";
	}
	else{
		echo "<option value='$fila[0]'>$fila[1] $fila[2] $fila[3]</option>";
	}
  }
   echo "</select>";
};

?>