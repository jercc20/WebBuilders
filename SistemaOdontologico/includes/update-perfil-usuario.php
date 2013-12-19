<?php
	if( $_POST ){
		define('PAGE','perfil');
		require_once 'functions.php';

		$name = ( isset( $_POST['txt-user-name'] ) ) ? $_POST['txt-user-name'] : '';
		$lastname = ( isset( $_POST['txt-user-lastname'] ) ) ? $_POST['txt-user-lastname'] : '';
		$lastname2 = ( isset( $_POST['txt-user-lastname2'] ) ) ? $_POST['txt-user-lastname2'] : '';
		$userId = ( isset( $_POST['txt-user-id'] ) ) ? $_POST['txt-user-id'] : '';
		$housePhn = ( isset( $_POST['txt-user-phone'] ) ) ? $_POST['txt-user-phone'] : 'NULL';
		$CellPhn = ( isset( $_POST['txt-user-cellphone'] ) ) ? $_POST['txt-user-cellphone'] : 'NULL';
		$email = ( isset( $_POST['txt-user-email'] ) ) ? $_POST['txt-user-email'] : '';
		$birth = ( isset( $_POST['txt-user-dob'] ) ) ? $_POST['txt-user-dob'] : '';
		$birthSql = do_sql_date_format($birth);
		$domicilio = ( isset( $_POST['txt-user-address'] ) ) ? $_POST['txt-user-address'] : '';
		$alergias = ( isset( $_POST['txt-user-alergie'] ) ) ? $_POST['txt-user-alergie'] : '';
		$contrasennaNueva = ( isset( $_POST['psw-user-pnew'] ) ) ? md5($_POST['psw-user-pnew']) : '';

		$query = "UPDATE tbusuarios SET nombre = '$name', primerApellido = '$lastname', segundoApellido = '$lastname2', telefonoCasa = '$housePhn', telefonoCelular = '$CellPhn', correoElectronico = '$email', fechaNacimiento = '$birthSql', domicilio = '$domicilio', alergias = '$alergias'";

		if (! empty($_POST['psw-user'] ) ) {

			$contrasenna = md5($_POST['psw-user']);
			$query2 = "SELECT contrasenna FROM tbusuarios WHERE identificacion = '$userId'";
			$result = do_query($query2);
			$tabla = mysql_fetch_assoc($result);

			$contrasennaCom = $tabla['contrasenna'];

			if ( ! strcmp($contrasenna, $contrasennaCom)) {

				$query .= ", contrasenna = '$contrasennaNueva'";

			}else{
				echo 'Contraseña actual incorrecta';
				exit();
			}
		}

		$query .= " WHERE identificacion = '$userId'";

		$result = do_query( $query );
		if( $result == 1 ){
			echo 'Perfil modificado con exito';
			js_redirect('editar-perfil-usuario.php', 4000);
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>