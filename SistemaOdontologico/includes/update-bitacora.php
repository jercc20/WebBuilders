<?php
	if( $_POST ){
		define('PAGE','editar-bitacora');
		require_once 'functions.php';

		//print_r( $_POST );
		
		$id = ( isset( $_POST['txt-num-bitacora'] ) ) ? $_POST['txt-num-bitacora'] : '';
		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$date = ( isset( $_POST['txt-user-dob'] ) ) ? do_sql_date_format( $_POST['txt-user-dob'] ) : '';
		$asistentes = ( isset( $_POST['txt-asistentes'] ) ) ? $_POST['txt-asistentes'] : '';
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';
		$date = str_replace('/', '-', $date);
		$date = date("Y-m-d",strtotime($date));

		$query = "UPDATE tbbitacoras SET idOdontologo = '$dentistId' , fecha = '$date' , asistentes = '$asistentes', notas = '$notes'
					WHERE idBitacora = '$id'";

		

		echo do_query( $query );
		global $db_server;
		mysql_close( $db_server );
	}
?>