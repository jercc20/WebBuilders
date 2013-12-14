<?php
function display_bitacoras_rows(){
	$bitacoras = get_bitacoras();
	while ($fila = mysql_fetch_assoc($bitacoras)) {
					echo '<tr>';  
						echo '<td>' . $fila["id_bitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . $fila["fecha"] . '</td>';
						$id = $fila['idBitacora'];
						echo '<td><a href="editar-bitacora.php?id='.$id.'"><i class="icon-edit"></i></a> <a href="#!?idBitacora=' . $id . '"><i class="icon-remove item-remove"></i></a></td>';
						echo '</tr>';
	}
}
function get_bitacoras(){

	$query = "SELECT * FROM tbbitacoras";
	$result = do_query( $query );
	return $result;
}

function menu_desplegable_usuarios($id,$valor,$nombre){
	$query ="SELECT idUsuario, nombre, identificacion FROM tbusuarios WHERE idRol = $id";
	$result = do_query( $query );
	   echo "<select name='$nombre'>";
	   while ($fila=mysql_fetch_row($result)){
	     if ($fila[0]==$valor){
	       echo "<option selected value='$fila[0]'>$fila[1]  $fila[2]</option>";
	     }
	     else{
	       echo "<option value='$fila[0]'>$fila[1] $fila[2]</option>";
	     }
	  }
	   echo "</select>";
	};
?> 

