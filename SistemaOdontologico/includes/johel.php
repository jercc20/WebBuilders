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
?>
<?php 
	if( isset( $_POST['ajax-call'] ) && isset( $_POST['var'] ) ){
	switch ( $_POST['var'] ) {

		case 'idUsuario': //Eliminar Usuario
			$usuario = ( isset( $_POST['idUsuario'] ) ) ? $_POST['idUsuario'] : '';
			$query = "DELETE FROM tbusuario WHERE idUsuario = '$usuario'";
			echo do_query( $query );
			break;

	}
}
?>
