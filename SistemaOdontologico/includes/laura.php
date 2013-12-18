<?php
function display_odontogramas_rows(){

	$odontogramas = get_odontogramas();

	while ($fila = mysql_fetch_assoc($odontogramas)) {
					echo '<tr>';
						echo '<td>' . $fila["idOdontograma"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . $fila["fecha"] . '</td>';
						echo '<td>' . $fila["procedimiento"] . '</td>';
						echo '<td><a href="editar-odontograma.php?idPaciente='  . $fila['idPaciente'] . '&idBitacora=' . $fila['idBitacora'] . '"><i class="icon-edit"></i></a><a href="#!?idBitacora=' . $fila['idBitacora'] . '"> <i class="icon-remove item-remove"></i></a></td>';
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
				echo '<td>' . '<input type="checkbox" name="procedure" />' . '<input type="hidden" name="procedimientos['. $i .']" value="'. $fila["idProcedimiento"] .'" />';
				echo '<td>' . $fila["nombre"] .'</td>';
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

	$citas = ( ! empty( $_POST ) ) ? get_citas_custom() : get_citas();
	while( $fila = mysql_fetch_assoc($citas) ){

		echo '<tr>';
			echo '<td>' . $fila["idCita"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $fila["procedimiento"] . '</td>';
		echo '</tr>';

	}
}

?>