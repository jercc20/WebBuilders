<?php
	if( $_POST ){
		define('PAGE','crear-cita');
		require_once 'functions.php';

		$paciente = ( isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';
		$date = ( isset( $_POST['txt_date'] ) ) ? $_POST['txt_date'] : '';
		$dateSql = do_sql_date_format($date);
		$hour = ( isset( $_POST['slt-hour'] ) ) ? $_POST['slt-hour'] : '';
		$minutes = ( isset( $_POST['slt-minute'] ) ) ? $_POST['slt-minute'] : '';
		$time = do_sql_time_format( $hour, $minutes );
		$cita = ( isset( $_POST['slt-cita'] ) ) ? $_POST['slt-cita'] : '';
		$odontologo = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';

		$query = "INSERT INTO tbcitas VALUES ('NULL','$paciente', '$dateSql', '$time', '$cita', '$odontologo', '$notes')";
		
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'La cita se ha creado exitosamente.';
			js_redirect('consultar-citas.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>