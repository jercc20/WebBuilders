<?php
	if( $_POST ){
		define('PAGE','login');
		require_once 'functions.php';

		$identificacion = ( isset( $_POST['txt-user'] ) ) ? $_POST['txt-user'] : '';
		$contrasenna = ( isset( $_POST['psw-login'] ) ) ? md5( $_POST['psw-login'] ) : '';

		$query = "SELECT idUsuario, nombre, idRol FROM tbusuarios WHERE identificacion = '$identificacion' AND contrasenna = '$contrasenna'";

		$result = do_query( $query );
		if( mysql_num_rows($result) == 1 ){

			$tabla = mysql_fetch_assoc($result);

			$_SESSION['idUsuario'] = $tabla['idUsuario'];

			echo 'Iniciando sesión...';
			js_redirect('inicio.php', 2500);
		}else{
			echo 'Usuario o contraseña incorrectas';
			exit();
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>