<?php
	if( $_POST ){
		define('PAGE','crear-odontograma');
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


		$query = "INSERT INTO tbusuarios VALUES" . "('NULL','$userId ','$username', '$userlastname', '$userlastname2')";

		$query = "INSERT INTO tbodontogramas VALUES" . "('NULL','$dentistId','date')";
	
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'El odontograma se ha creado exitosamente.';
			js_redirect('consultar-odontogramas.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>

