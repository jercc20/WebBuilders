<?php
function display_procedimientos_rows(){
	$procedimientos = get_procedimientos();
	while ($fila = mysql_fetch_assoc($procedimientos)) {
		echo '<tr>';  
			echo '<td>' . $fila["nombre"] . '</td>';
			echo '<td>' . $fila["Costo"]  . '</td>';
			echo '<td>' . $fila["descripcion"] . '</td>';
			$id = $fila['idProcedimiento'];
			echo '<td><a href="editar-procedimiento.php?id='.$id.'"><i class="icon-edit"></i></a> <a href="#!?idProcedimiento=' . $id . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_procedimientos(){
	$query = "SELECT * FROM tbprocedimientos";
	$result = do_query( $query );
	return $result;
}
?>