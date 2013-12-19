<?php
	if( $_POST ){
		define('PAGE','editarUsuarioPaciente');
		require_once 'functions.php';

		$id = ( isset( $_POST['idUsuario'] ) ) ? $_POST['idUsuario'] : '';
		$name = ( isset( $_POST['txt_name'] ) ) ? $_POST['txt_name'] : '';
		$lastname = ( isset( $_POST['txt_lastname'] ) ) ? $_POST['txt_lastname'] : '';
		$lastname2 = ( isset( $_POST['txt_lastname2'] ) && ! empty( $_POST['txt_lastname2'] ) ) ? $_POST['txt_lastname2'] : NULL;
		$userId = ( isset( $_POST['txt_user'] ) ) ? $_POST['txt_user'] : '';
		$housePhn = ( isset( $_POST['txt_phone'] ) ) ? $_POST['txt_phone'] : '';
		$CellPhn = ( isset( $_POST['txt_cellphone'] ) && ! empty( $_POST['txt_cellphone'] ) ) ? $_POST['txt_cellphone'] : 0;
		$email = ( isset( $_POST['txt_email'] ) ) ? $_POST['txt_email'] : '';
		$birth = ( isset( $_POST['txt_birthday'] ) ) ? $_POST['txt_birthday'] : '';
		$birthSql = do_sql_date_format($birth);
		$impmt = ( isset( $_POST['txt_impairment'] ) && ! empty( $_POST['txt_impairment'] ) ) ? $_POST['txt_impairment'] : 0;
		$role = ( isset( $_POST['slt-user-role'] ) ) ? $_POST['slt-user-role'] : '';
		$alergie  = ( isset( $_POST['txt-user-alergie'] ) && ! empty( $_POST['txt-user-alergie'] ) ) ? $_POST['txt-user-alergie'] : NULL;
		$UserAdrs = ( isset( $_POST['txt-user-adress'] ) && ! empty( $_POST['txt-user-adress'] ) ) ? $_POST['txt-user-adress'] : NULL;

		$query= "SELECT identificacion FROM tbusuarios WHERE idUsuario NOT IN('$id')
					AND identificacion = '$userId'";
		$result = do_query($query);
		if(mysql_num_rows($result) > 0){
			echo "La identificación/alias ya se encuentra en uso.";
			exit();
		}
		if(!$encontro){
			$query = "UPDATE tbusuarios SET nombre = '$name', primerApellido = '$lastname', segundoApellido = '$lastname2', identificacion = '$userId',
						 telefonoCasa = '$housePhn', telefonoCelular = '$CellPhn', correoElectronico = '$email', fechaNacimiento = '$birthSql', discapacidad = '$impmt',
						 idRol = '$role', alergias = '$alergie', domicilio = '$UserAdrs'";

			if( ! empty( $_POST['txt-user-psw'] ) ){
				$userPsw = md5($_POST['txt-user-psw']);
				$query .= ", contrasenna = '$userPsw'";
			}
			$query .= " WHERE idUsuario = '$id'";
			echo do_query( $query );
		}
		global $db_server;
		mysql_close( $db_server );
	}
?>