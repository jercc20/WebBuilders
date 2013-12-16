<?php
	if( $_POST ){
		define('PAGE','update-bitacora');
		require_once 'functions.php';

		//print_r( $_POST );

		
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';
		$asistentes = ( isset( $_POST['txt-asistentes'] ) ) ? $_POST['txt-asistentes'] : '';
		$date = ( isset( $_POST['txt-date'] ) ) ? $_POST['txt-date'] : '';
		$date = str_replace('/', '-', $date);
		$date = date("Y-m-d",strtotime($date));

		$query = "UPDATE tbbitacoras SET $date = 'txt-date', $asistentes = 'txt-asistentes', notas = '$notes'
					WHERE idBitacora = '$id'";

		echo do_query( $query );

		global $db_server;
		mysql_close( $db_server );
	}
?>