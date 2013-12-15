<?php 
function display_usuarios_pacientes_rows(){
	$usuarios = get_usuarios_pacientes();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';  
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .' / '.$fila["telefonoCelular"]. '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			$id = $fila['idUsuario'];
			echo '<td><a href="#!?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_usuarios_pacientes(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa, 
						u.telefonoCelular, u.correoElectronico, u.domicilio 
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE u.idUsuario = 2";
	$result = do_query( $query );			
	return $result;
}
?>




