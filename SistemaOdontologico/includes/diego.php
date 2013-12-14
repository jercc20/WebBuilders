<?php

	function display_roles_rows(){

		$roles = get_roles();
		while( $row = mysql_fetch_assoc( $roles ) ){
			echo '<tr>'.
				'<td>' . $row['nombreRol'] . '</td>'.
				'<td><a href="#?id=' . $row['idRol'] . '><i class="icon-edit"></i></a> <a href="#!?idRol=' . $row['idRol'] . '"><i class="icon-remove item-remove"></i></a></td>'.
			'</tr>';
		}

	}

	function get_roles(){
		$query = "SELECT * FROM tbroles";
		$result = do_query( $query );
		return $result;
	}
?>