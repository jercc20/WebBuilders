<?php
/*---------Procedimientos----------------- */
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

/*-------------------Citas------------------ */

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
	$slt_patient = get_slt_patient();
	while ($fila = mysql_fetch_assoc($slt_patient)) {
		echo '<tr>';  
			echo '<td>' . $fila["nombre"] . " " . $fila["primerApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td><a href="crear-cita.php?id='. $fila["idUsuario"] .'"><i class="icon-edit"></i></a></td>';
		echo '</tr>';
	}
}

function get_slt_patient(){
	$query = "SELECT * FROM tbusuarios WHERE idRol = 2";
	$result = do_query( $query );
	return $result;
}

/*---------Ingresar comentario de funcion----------------- */

function display_crear_cita_rows(){
	$crearCita = get_crear_cita();

	$fila = mysql_fetch_array($crearCita);
	$nombre = $fila['nombre'];
	$apellido = $fila['primerApellido'];
	$na = $nombre . " " . $apellido;
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

?>