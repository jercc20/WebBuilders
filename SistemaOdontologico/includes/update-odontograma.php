<?php
	if( $_POST ){
		define('PAGE','editar-odontograma');
		require_once 'functions.php';

		$dentistId = ( isset( $_POST['txt_dentist_id'] ) ) ? $_POST['txt_dentist_id'] : '';
		$dentistname = ( isset( $_POST['txt_dentist_name'] ) ) ? $_POST['txt_dentist_name'] : '';
		$dentistlastname = ( isset( $_POST['txt_dentist_lastname'] ) ) ? $_POST['txt_dentist_lastname'] : '';
		$dentistlastname2 = ( isset( $_POST['txt_dentist_lastname2'] ) ) ? $_POST['txt_dentist_lastname2'] : '';
		$date = ( isset( $_POST['txt-date-realized'] ) ) ? $_POST['txt-date-realized'] : '';
		$userId = ( isset( $_POST['txt_pacient_id'] ) ) ? $_POST['txt_pacient_id'] : '';
		$username = ( isset( $_POST['txt_pacient_name'] ) ) ? $_POST['txt_pacient_name'] : '';
		$userlastname = ( isset( $_POST['txt_pacient_lastname'] ) ) ? $_POST['txt_pacient_lastname'] : '';
		$userlastname2 = ( isset( $_POST['txt_pacient_lastname2'] ) ) ? $_POST['txt_pacient_lastname2'] : '';
		
		$query = "UPDATE tbusuarios SET nombre = '$username', primerApellido = '$userlastname', segundoApellido = '$userlastname2',";

		$query = "UPDATE tbodontogramas SET idOdontologo = '$dentistId', fecha = '$date'";


		if( ! empty( $_POST['txt-user-psw'] ) ){
			$userPsw = md5($_POST['txt-user-psw']);
			$query .= ", contrasenna = '$userPsw'";
		}
				
		$query .= " WHERE idUsuario = '$id'";
		echo do_query( $query );

		global $db_server;
		mysql_close( $db_server );
	}
?>