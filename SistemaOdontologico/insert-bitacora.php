<?php

	if( $_POST ){
		define('PAGE','crear-bitacora'); 
		require_once 'functions.php';

		/* Ejemplo */
		//print_r( $_POST ); //Para ver que lleva el POST, luego se quita
		$userId = ( isset( $_POST['slt-paciente'] ) ) ? $_POST['slt-paciente'] : '';
		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$birth = ( isset( $_POST['txt_date'] ) ) ? $_POST['txt_date'] : '';
		$asistentes = ( isset( $_POST['asistentes'] ) ) ? $_POST['asistentes'] : '';
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';

		$query = "INSERT INTO tbbitacoras VALUES" . "('NULL','$dentistId', '$userId', '$birth', '$asistentes', '$notes')";
		
		//echo $query; //Para ver como queda el query, luego se quita

		//Opcion 1
		//echo do_query( $query );

		//Opcion 2, con redirect
		
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'El procedimiento se ha creado exitosamente.';
			js_redirect('consultar-bitacoras.php', 2500);
		}
		

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?> 