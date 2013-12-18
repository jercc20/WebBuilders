<?php

function display_odontogramas_rows(){
	
	$query = "SELECT c.idOdontograma, u.nombre AS u_id, u.nombre AS o_id, u.primerApellido AS u_apellido, sum( abon.monto ) AS monto, max( abon.fecha ) AS fecha, 
						(SELECT count( idprocedimiento )
							FROM tbprocedimientosporodontograma AS a
							WHERE a.idOdontograma = c.idOdontograma
						) as idProcedimiento
					  FROM tbodontogramas AS c, tbusuarios AS u, tbfactura AS fac, tbabonos AS abon
					  WHERE u.idUsuario = c.idPaciente
						AND fac.idOdontograma = c.idOdontograma
						AND fac.idFactura = abon.idFactura
					  GROUP BY c.idOdontograma, u.nombre, u.nombre, u.primerApellido";
	}

function display_editar_odontograma_rows(){
	$editarOdontograma = get_editar_odontograma();

	//$fila = mysql_fetch_array($editarOdontograma);

	//$na = $fila['nombre'] . " " . $fila['primerApellido'];
	//$identificacion = $fila['identificacion'];

	//$nap = $fila['nombre'] . " " . $fila['primerApellido'];
	//$identificacionp = $fila['identificacion'];

	//echo "<label>Nombre del Odontologo</label>";
	//echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	//echo "<label>Identificación</label>";
	//echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";

	//echo "<label>Nombre del paciente</label>";
	//echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	//echo "<label>Identificación</label>";
	//echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

  function get_editar_odontograma(){
//	$id = ( isset( $_GET['idOdontograma'] ) ) ? $_GET['idOdontograma'] : '';
//	$query = "SELECT * FROM tbodontogramas WHERE idOdontograma = $id";
//	$result= do_query($query);
//	return $result;
 }


?>