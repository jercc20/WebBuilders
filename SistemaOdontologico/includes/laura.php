<?php
function display_odontogramas_rows(){

	$odontogramas = get_odontogramas();

	while ($fila = mysql_fetch_assoc($odontogramas)) {
		$total = mysql_fetch_array( get_amount_odontograma( $fila['idOdontograma'] ) );
		$total = array_shift( $total );
		$numProcess = mysql_num_rows( get_procedimientos_odontograma( $fila['idOdontograma'] ) );
		echo '<tr>';
			echo '<td>' . $fila["idOdontograma"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $numProcess . '</td>';
			echo '<td>' . $total . '</td>';
			echo '<td><a href="editar-odontograma.php?idPaciente='  . $fila['idPaciente'] . '&idOdontograma=' . $fila['idOdontograma'] . '"><i class="icon-edit"></i></a><a href="#!?idOdontograma=' . $fila['idOdontograma'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_odontogramas(){
	$query = "SELECT b.*,
			u.nombre AS u_nombre,
			o.nombre AS o_nombre,
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbodontogramas AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";

	$result=do_query($query);
	return $result;
}
#################### CONSULTAR ODONTO ##########################################################################################
//function display_odontogramas_rows(){

	//$query = "SELECT c.idOdontograma, u.nombre AS u_id, u.nombre AS o_id, u.primerApellido AS u_apellido, sum( abon.monto ) AS monto, max( abon.fecha ) AS fecha,
						//(SELECT count( idprocedimiento )
							//FROM tbprocedimientosporodontograma AS a
							//WHERE a.idOdontograma = c.idOdontograma
						//) as idProcedimiento
					  //FROM tbodontogramas AS c, tbusuarios AS u, tbfactura AS fac, tbabonos AS abon
					  //WHERE u.idUsuario = c.idPaciente
						//AND fac.idOdontograma = c.idOdontograma
						//AND fac.idFactura = abon.idFactura
					 // GROUP BY c.idOdontograma, u.nombre, u.nombre, u.primerApellido";
	//}
######################## EDITAR ODONTO #########################################################################################


function display_editar_odontograma_rows(){
	$editarOdontograma = get_editar_odontograma();

	$fila = mysql_fetch_array($editarOdontograma);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text'  readonly='readonly' value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text'  readonly='readonly' value='$identificacion' />";
}

function get_editar_odontograma(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

##################### CREAR ODONTO #############################################################################################
function display_crear_odontograma(){
	$tabla = get_crear_odontograma();

	$fila = mysql_fetch_assoc($tabla);
	$nombre = $fila['nombre'];
	$apellido = $fila['primerApellido'];
	$na = $nombre . ' ' . $apellido;
	$identificacion = $fila['identificacion'];
	$id_patient = $fila['idUsuario'];

	echo "<input type='hidden' name='id_patient' value='$id_patient' />";
	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}
function get_crear_odontograma(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_add_procedimientos_popup() {

	$procedimientos = get_add_procedimientos_popup();
	if(mysql_num_rows($procedimientos) > 0){
		$i = 0;
		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';
				echo '<td>' . '<input type="checkbox" name="procedure" />' . '<input type="hidden" name="procedimientos['. $i .']" value="'. $fila["idProcedimiento"] .'" /></td>';
				echo '<td>' . $fila["nombre"] .'</td>';
				echo '<td>' . $fila["Costo"] .'</td>';
				echo '<td class="has-zone"><input type="text​" name="zona['. $i .']" placeholde​r="Zona" required="​required" /></td>';
			echo '</tr>';
			$i++;
		}

	}
}

function get_add_procedimientos_popup() {

	$query = "SELECT * FROM tbprocedimientos";

	$result = do_query( $query );

	return $result;
}

################################ REPORTES ######################################################################################

function display_reporte_citas_rows(){

	$citas = get_citas_custom();
	while ($fila = mysql_fetch_assoc($citas)) {
		echo '<tr>';
			echo '<td>' . $fila["p_nombre"] . " " . $fila["p_apellido"] . '</td>';
			echo '<td>' . $fila["p_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " " . $fila["o_apellido"] . '</td>';
			echo '<td>' . do_date_format( $fila["fecha"] ) . '</td>';
			echo '<td>' . do_time_format( $fila["hora"] ) . '</td>';
			echo '<td>' . $fila["notas"] . '</td>';
		echo '</tr>';
	}
}
function get_citas_custom(){
	$query = "SELECT c.*, p.nombre AS p_nombre,
				o.nombre AS o_nombre,
				p.primerApellido AS p_apellido,
				o.primerApellido AS o_apellido,
				p.identificacion AS p_id
					FROM tbcitas AS c
					LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = c.idOdontologo)";

	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ){

		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND p.identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND p.nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
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

################################################################################################################################

function display_reporte_procedimientos_rows(){

	$procedimiento = ( ! empty( $_POST ) ) ? get_procedimiento_custom() : get_procedimiento();
	while( $fila = mysql_fetch_assoc($procedimiento) ){

		echo '<tr>';
			echo '<td>' . $fila["idProcedimiento"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $fila["procedimiento"] . '</td>';
		echo '</tr>';

	}
}

function get_procedimiento_custom(){
	$query = "SELECT * FROM tbprocedimientos order by id";
	if( ! empty( $_POST ) ){
		$query .= " WHERE 1";

		if( ! empty( $_POST['user-id'] ) )
			$query .= " AND identificacion LIKE ('%" . $_POST['user-id'] . "%')";
		if( ! empty( $_POST['txt-user-name'] ) )
			$query .= " AND nombre LIKE ('%" . $_POST['txt-user-name'] . "%')";
		if( ! empty( $_POST['txt-user-lastname'] ) )
			$query .= " AND primerApellido LIKE ('%" . $_POST['txt-user-lastname'] . "%')";
		if ( ! empty( $_POST['user-rol'] ) && $_POST['user-rol'] !=0 )
			$query .= " AND idRol = " . $_POST['user-rol'] . "";
	}
	$result = do_query( $query );

	return $result;
}

function get_procedimiento(){
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

?>