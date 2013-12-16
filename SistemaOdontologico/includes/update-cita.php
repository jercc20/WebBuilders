<?php
	if( $_POST ){
		define('PAGE','');
		require_once 'functions.php';

		$id = ( isset( $_POST['id_cita'] ) ) ? $_POST['id_cita'] : '';
		$date = ( isset( $_POST['txt_date'] ) ) ? $_POST['txt_date'] : '';
		$hour = ( isset( $_POST['slt-hour'] ) ) ? $_POST['slt-hour'] : '';
		$minutes = ( isset( $_POST['slt-minute'] ) ) ? $_POST['slt-minute'] : '';
		
		$cita = ( isset( $_POST['slt-cita'] ) ) ? $_POST['slt-cita'] : '';
		$id_dentist = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : '';
		$date = str_replace('/', '-', $date);
		$date = date("Y-m-d",strtotime($date));

		$query = "UPDATE tbcitas SET fecha = '$date', hora = '$hour', tipoCita = '$cita', idOdontologo = '$id_dentist', notas = '$notes'
					WHERE idCita = '$id'";

		echo do_query( $query );

		global $db_server;
		mysql_close( $db_server );
	}
?>