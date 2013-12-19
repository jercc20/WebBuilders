<?php

function configuracion_basica(){

	$tabla = datos_configuracion();

	echo "<p><i class='icon-inicio'></i>".$tabla['direccion']."</p>" .
	"<p><i class='icon-phone'></i>".$tabla['telefonos']."</p>" .
	"<p><i class='icon-mail'></i>".$tabla['correoElectronico']."</p>" .
	"<p><i class='icon-citas'></i>".$tabla['horario']."</p>";
}

function display_roles_rows(){

	$roles = get_roles();
	while( $row = mysql_fetch_assoc( $roles ) ){
		if ($row['idRol'] <=4 && $row['idRol'] >=1) {
		echo '<tr>'.
			'<td>' . $row['nombreRol'] . '</td>'.
			'<td><a href="editar-rol.php?id=' . $row['idRol'] . '"><i class="icon-edit"></i></a></td>'.
		'</tr>';
		}else{
		echo '<tr>'.
			'<td>' . $row['nombreRol'] . '</td>'.
			'<td><a href="editar-rol.php?id=' . $row['idRol'] . '"><i class="icon-edit"></i></a> <a href="#!?idRol=' . $row['idRol'] . '"><i class="icon-remove item-remove"></i></a></td>'.
		'</tr>';
		}
	}
}

function display_reporte_usuarios_rows(){

	$usuarios = ( ! empty( $_POST ) ) ? get_usuarios_custom() : get_usuarios();

	while ( $row = mysql_fetch_assoc( $usuarios ) ) {

		if (isset($row['nombreRol'])) {
			$nombreRol = $row['nombreRol'];
		}else{
			$result = get_rol_usuario($row['idRol']);
			$tabla = mysql_fetch_assoc($result);

			$nombreRol = $tabla['nombreRol'];
		}

		echo '<tr>';
			echo '<td>' . $row["nombre"]." ".$row["primerApellido"]." ".$row["segundoApellido"] . '</td>';
			echo '<td>' . $row["identificacion"] . '</td>';
			echo '<td>' . $nombreRol . '</td>';
			echo '<td>' . $row["telefonoCasa"] .' / '.$row["telefonoCelular"]. '</td>';
			echo '<td>' . $row["correoElectronico"] . '</td>';
			echo '<td>' . $row["domicilio"] . '</td>';
		echo '</tr>';
	}
}

function get_usuarios_custom(){
	$query = "SELECT * FROM tbusuarios order by idRol";
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

function get_rol_usuario($pidRol){
	$query = "SELECT nombreRol FROM tbroles WHERE idRol = '$pidRol'";
	$result = do_query($query);

	return $result;
}

function display_array_rol(){
	$roles = get_roles();
	echo '<option value="0">Todos</option>';
	while ($fila = mysql_fetch_row($roles)){
	    	echo '<option value='. $fila["0"] .'>'. $fila["1"]. '</option>';
	}
}

function get_roles(){
	$query = "SELECT * FROM tbroles";
	$result = do_query( $query );
	return $result;
}

function get_array_roles($pidRol){
	$query = "SELECT * FROM tbroles WHERE idRol = '$pidRol'";
	$result = do_query($query);
	$tabla = mysql_fetch_assoc($result);
	return $tabla;
}

function datos_configuracion(){
	$query = "SELECT * FROM tbconfiguracion WHERE idConfiguracion = '1'";

	$result = do_query($query);

 	$tabla = mysql_fetch_assoc($result);

 	return $tabla;
}

function get_perfil_user($pidUsuario){
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = '$pidUsuario'";

	$result = do_query($query);

	$tabla = mysql_fetch_assoc($result);

	return $tabla;
}
?>