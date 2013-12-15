<?php
function display_bitacoras_rows(){

	$bitacoras = get_bitacoras();

	while ($fila = mysql_fetch_assoc($bitacoras)) {
					echo '<tr>';  
						echo '<td>' . $fila["idBitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . $fila["fecha"] . '</td>';
						echo '<td>' . $fila["procedimiento"] . '</td>';
						echo '<td><a href="editar-bitacora.php?idBitacora=' . $fila['idBitacora'] . '"><i class="icon-edit"></i></a><a href="#!?idCita=' . $fila['idCita'] . '"> <i class="icon-remove item-remove"></i></a></td>';
					echo '</tr>';
	}				
}

function get_bitacoras(){
	$query = "SELECT b.*, 
			u.nombre AS u_nombre, 
			o.nombre AS o_nombre, 
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbbitacoras AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";

	$result=do_query($query);
	return $result;
}
function display_crear_bitacora_rows(){
	$crearBitacora = get_crear_bitacora();

	$fila = mysql_fetch_array($crearBitacora);
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
function get_crear_bitacora(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}
function display_editar_bitacora_rows(){
	$editarBitacora = get_editar_bitacora();

	$fila = mysql_fetch_array($editarBitacora);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_editar_bitacora(){
	$id = ( isset( $_GET['idBitacora'] ) ) ? $_GET['idBitacora'] : '';
	$query = "SELECT * FROM tbbitacoras WHERE idBitacora = $id";

	$result = do_query( $query );
	return $result;
}
function display_reporte_bitacoras_rows(){
	$bitacoras = get_bitacoras();
	while( $fila = mysql_fetch_assoc($bitacoras) ){
		echo '<tr>';  
			echo '<td>' . $fila["idBitacora"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $fila["procedimiento"] . '</td>';
		echo '</tr>';
	}
}
/*
function get_bitacoras_custom(){
	$query = "SELECT * FROM tbbitacoras";
	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ||
			! empty( $_POST['txt-patient-lastname'] ) ){
			$query .= " JOIN tbodontogramas USING(idOdontograma)";
			$query .= " JOIN tbusuarios ON idPaciente = idUsuario";
		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
		if( ! empty( $_POST['txt-patient-lastname'] ) )
			$query .= " AND primerApellido LIKE ('%" . $_POST['txt-patient-lastname'] . "%')";
		if( ! empty( $_POST['txt-start-date'] ) && ! empty( $_POST['txt-end-date'] ) )
			$query .= " AND fecha BETWEEN '" . do_sql_date_format( $_POST['txt-start-date'] ) . "' AND '" . do_sql_date_format( $_POST['txt-end-date'] ) . "'";
		elseif( ! empty( $_POST['txt-start-date'] ) )
			$query .= " AND fecha >= '" . do_sql_date_format( $_POST['txt-start-date'] ) . "'";
		elseif( ! empty( $_POST['txt-end-date'] ) )
			$query .= " AND fecha <= '" . do_sql_date_format( $_POST['txt-end-date'] ) . "'";
	}
	$result = do_query( $query );

	return $result;
}
*/

 
?>