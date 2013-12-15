<?php
function display_usuarios_rows(){
	$usuarios = get_usuarios();
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

function get_usuarios(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)";
	$result = do_query( $query );
	return $result;
}

function display_usuarios_secretaria_rows(){
	$usuarios = get_usuarios_secretaria();
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

function get_usuarios_secretaria(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE r.idRol = 2 OR r.idRol = 3";
	$result = do_query( $query );
	return $result;
}

function display_usuarios_odontologo_rows(){
	$usuarios = get_usuarios_odontologo();
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

function get_usuarios_odontologo(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE r.idRol = 2";
	$result = do_query( $query );
	return $result;
}

function display_select_roles($nombre){
	$roles = get_roles_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
    	echo "<option value='$fila[0]'>$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles";
	$result = do_query( $query );
	return $result;
};

function display_select_paciente($nombre){
	$roles = get_roles_paciente_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
       	echo "<option value='$fila[0]'>$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_paciente_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles WHERE idRol = 2";
	$result = do_query( $query );
	return $result;
};

?>