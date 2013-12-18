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

?>