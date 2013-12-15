<?php
	if( $_POST ){
		define('PAGE',''); //mismo nombre de la pagina del formulario
		require_once 'includes/functions.php';

		/* Ejemplo */

		$idRol = $_GET["id"];

		$nombreRol = ( isset( $_POST['txt-role-name'] ) ) ? $_POST['txt-role-name'] : '';
		$permisos = ( isset($_POST['chk-permissions'])) ? $_POST['chk-permissions'] : '';

		$query = "UPDATE tbroles (idRol, nombreRol) VALUES ($idRol, '$nombreRol')";

		$result = do_query( $query );
		if( $result == 1 ){
			echo 'Rol creado con exito';
			js_redirect('consultar-roles.php', 4000);
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>