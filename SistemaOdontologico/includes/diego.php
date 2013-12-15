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
		echo '<tr>'.
			'<td>' . $row['nombreRol'] . '</td>'.
			'<td><a href="editar-rol.php?id=' . $row['idRol'] . '"><i class="icon-edit"></i></a> <a href="#!?idRol=' . $row['idRol'] . '"><i class="icon-remove item-remove"></i></a></td>'.
		'</tr>';
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
?>