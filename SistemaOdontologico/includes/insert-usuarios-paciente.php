<?php
	if( $_POST ){
		define('PAGE','crearUsuarioPaciente');
		require_once 'functions.php';

		$name = ( isset( $_POST['txt-user-name'] ) ) ? $_POST['txt-user-name'] : '';
		$lastname = ( isset( $_POST['txt-user-lastname'] ) ) ? $_POST['txt-user-lastname'] : '';
		$lastname2 = ( isset( $_POST['txt-user-lastname2'] ) ) ? $_POST['txt-user-lastname2'] : '';
		$userId = ( isset( $_POST['txt-id-user'] ) ) ? $_POST['txt-id-user'] : '';
		$housePhn = ( isset( $_POST['txt-user-house-phone'] ) ) ? $_POST['txt-user-house-phone'] : '';
		$CellPhn = ( isset( $_POST['txt-user-cellphone'] ) ) ? $_POST['txt-user-cellphone'] : '';
		$email = ( isset( $_POST['txt-user-email'] ) ) ? $_POST['txt-user-email'] : '';
		$birth = ( isset( $_POST['txt-user-birthday'] ) ) ? do_sql_date_format( $_POST['txt-user-birthday'] ) : '';
		$impmt = ( isset( $_POST['txt-user-impairment'] ) ) ? $_POST['txt-user-impairment'] : '';
		$role = ( isset( $_POST['slt-user-role'] ) ) ? $_POST['slt-user-role'] : '';
		$userPsw = ( isset( $_POST['txt-user-psw'] ) ) ? md5( $_POST['txt-user-psw'] ) : '';
		$alergie = ( isset( $_POST['txt-user-alergie'] ) ) ? $_POST['txt-user-alergie'] : '';
		$UserAdrs = ( isset( $_POST['txt-user-adress'] ) ) ? $_POST['txt-user-adress'] : '';
		
		$query= "SELECT identificacion FROM tbusuarios WHERE identificacion = '$userId'"; 
		$result = do_query($query);
		if(mysql_num_rows($result) > 0){
			echo "La identificación/alias ya se encuentra en uso.";
			exit();
		}

		$query = "INSERT INTO tbusuarios VALUES" . "('NULL','$name', '$lastname', '$lastname2', '$userId ', '$housePhn', 
			      '$CellPhn', '$email', '$birth', '$impmt', '$role', '$userPsw', '$alergie', '$UserAdrs')";
		$result = do_query( $query );

		if( $result == 1 ){
			echo 'El usuario se ha creado exitosamente.';
			js_redirect('consultar-usuarios-pacientes.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>