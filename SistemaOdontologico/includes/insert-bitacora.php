<?php

	if( $_POST ){
		define('PAGE','crear-bitacora'); 
		require_once 'functions.php';

		/* Ejemplo */
		//print_r( $_POST ); //Para ver que lleva el POST, luego se quita
		
		//echo $query; //Para ver como queda el query, luego se quita
		
		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$patientId = (isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';
		$date = ( isset( $_POST['txt-user-dob'] ) ) ? do_sql_date_format( $_POST['txt-user-dob'] ) : '';
		$asistentes = ( isset( $_POST['txt-asistentes'] ) ) ? $_POST['txt-asistentes'] : '';
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';

		$query = "INSERT INTO tbbitacoras VALUES" . "(NULL, '$dentistId', '$patientId', '$date', '$asistentes', '$notes')";

		$result = do_query( $query );
		if( $result == 1 ){
			echo 'La bitacora se ha guardado correctamente.';
			js_redirect('consultar-bitacoras.php', 2500);
		}

		//Opcion 1
		//echo do_query( $query );

		//Opcion 2, con redirect

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?> 