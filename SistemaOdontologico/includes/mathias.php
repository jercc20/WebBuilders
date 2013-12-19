<?php
function display_bitacoras_rows(){

	$bitacoras = get_bitacoras();

	while ($fila = mysql_fetch_assoc($bitacoras)){
					echo '<tr>';  
						echo '<td>' . $fila["idBitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
						echo '<td><a href="editar-bitacora.php?idPaciente='  . $fila['idPaciente'] . '&idBitacora=' . $fila['idBitacora'] . '"><i class="icon-edit"></i></a><a href="#!?idBitacora=' . $fila['idBitacora'] . '"> <i class="icon-remove item-remove"></i></a></td>';
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
########################Crear Bitacora#############################################################################

function display_crear_bitacora(){
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
########################Editar Bitacoras#############################################################################

function display_editar_bitacora(){
	$editarBitacora = get_editar_bitacora();

	$fila = mysql_fetch_array($editarBitacora);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text'  readonly='readonly' value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text'  readonly='readonly' value='$identificacion' />";
}

function get_editar_bitacora(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

#######################################################################################################################



########################Reporte Bitacoras#############################################################################

function display_reporte_bitacoras_rows(){

	$bitacoras = ( ! empty( $_POST ) ) ? get_bitacoras_custom() : get_bitacoras();
	while( $fila = mysql_fetch_assoc($bitacoras) ){

		echo '<tr>';  
			echo '<td>' . $fila["idBitacora"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
		echo '</tr>';

	}
}
##################################################################################################################################
function get_bitacoras_custom(){
	$query = "SELECT b.*, 
					u.nombre AS u_nombre, 
					o.nombre AS o_nombre, 
					o.primerApellido AS o_apellido,
					u.primerApellido AS u_apellido,
					u.identificacion AS u_id
							FROM tbbitacoras AS b
							LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
							LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";
	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ){
					
		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND u.identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND u.nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
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

##################################################################################################################################
function display_procedimientos_popup( $id ){

	$procedimientos = get_procedimientos_popup( $id );
	if(mysql_num_rows($procedimientos) > 0){
		$i = 0;
		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';  
				echo '<td>' . '<input type="checkbox" name="procedure" />' . '<input type="hidden" name="procedimientos['. $i .']" value="'. $fila["idProcedimiento"] .'" />' . '<input type="hidden" name="idOdontograma['. $i .']" value="'. $fila["idOdontograma"] .'" />' . '</td>';
				echo '<td>' . $fila["nombre"] .'</td>';
			echo '</tr>';
			$i++;
		}				
		
	}else{
		echo "El usuario no tiene procedimientos pendientes";
	}
}
##################################################################################################################################
function get_procedimientos_popup( $id ){

	$query = "SELECT * FROM tbodontogramas AS o,
 	tbprocedimientosporodontograma AS po,
 	tbprocedimientos AS p
		WHERE o.idPaciente = '$id'
 			AND po.idOdontograma = o.idOdontograma
 			AND p.idProcedimiento = po.idProcedimiento
 			AND po.realizado = '0'";

	$result = do_query( $query );

	return $result;
}
##################################################################################################################################
function display_bitacoras_rows_paciente(){

	$bitacoras = get_bitacoras_paciente();

	while ($fila = mysql_fetch_assoc($bitacoras)) {
					echo '<tr>';  
						echo '<td>' . $fila["idBitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
					echo '</tr>';
	}				
}
#################################################################################################################################
function get_bitacoras_paciente(){

	$query = "SELECT b.*, 
			u.nombre AS u_nombre, 
			o.nombre AS o_nombre, 
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbbitacoras AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)
					WHERE idPaciente = $_SESSION[idUsuario];";


	$result=do_query($query);
	return $result;
}

#################################################################################################################################
function display_procedimientos_editar( $id ){

	$procedimientos = get_procedimientos_editar( $id );
	
		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';  
				echo '<td>' . $fila["nombre"] .'</td>';
			echo '</tr>';
		}						
}

##################################################################################################################################
function get_procedimientos_editar( $id ){

	$query = "SELECT nombre
		FROM tbprocedimientosporbitacora AS pb,
		tbprocedimientos AS p
			WHERE pb.idBitacora = '$id'
			AND p.idProcedimiento = pb.idProcedimiento";

	$result = do_query( $query );
	return $result;
}
###################################################################################################################################