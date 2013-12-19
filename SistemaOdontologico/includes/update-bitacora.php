<?php
	if( $_POST ){
		define('PAGE','editarBitacora');
		require_once 'functions.php';

		$idBitacora = ( isset( $_POST['txt-num-bitacora'] ) ) ? $_POST['txt-num-bitacora'] : '';
		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';

		$date = ( isset( $_POST['txt-user-dob'] ) ) ? $_POST['txt-user-dob'] : '';
		$dateSql = do_sql_date_format($date);

		$asistentes = ( isset( $_POST['txt-asistentes'] ) ) ? $_POST['txt-asistentes'] : NULL;
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : NULL;

		$query = "UPDATE tbbitacoras SET idOdontologo = '$dentistId' , fecha = '$dateSql', asistentes = '$asistentes', notas = '$notes'
		WHERE idBitacora = $idBitacora";

		echo do_query( $query );

		global $db_server;
		mysql_close( $db_server );
	}
?>