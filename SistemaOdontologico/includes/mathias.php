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
						echo '<td><a href="#!?idBitacora=' . $fila['idBitacora'] . '"><i class="icon-edit"></i></a> <i class="icon-remove item-remove"></i></a></td>';
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
	$crearBitacora = get_crear_cita();

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
?>