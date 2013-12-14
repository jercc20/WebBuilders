<?php
	if( $_POST ){
		define('PAGE','crear-cita'); //mismo nombre de la pagina del formulario
		require_once 'functions.php';

		/* Ejemplo */
		print_r( $_POST ); //Para ver que lleva el POST, luego se quita
		$date = ( isset( $_POST['txt_date'] ) ) ? $_POST['txt_date'] : '';
		$hour = ( isset( $_POST['slt-hour'] ) ) ? $_POST['slt-hour'] : '';
		$minute = ( isset( $_POST['slt-minute'] ) ) ? $_POST['slt-minute'] : '';
		$cita = ( isset( $_POST['slt-cita'] ) ) ? $_POST['slt-cita'] : '';
		$odontologo = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$notes = ( isset( $_POST['slt-notes'] ) ) ? $_POST['slt-notes'] : '';
		$date = str_replace('/', '-', $date);
		$date = date("Y-m-d",strtotime($date));

		$query = "INSERT INTO tbcitas VALUES" . "('NULL','$id', '$date', '$hour', '$minute', '$cita', '$id_dentist', '$notes')";
		echo $query; //Para ver como queda el query, luego se quita

		//Opcion 1
		//echo do_query( $query );

		//Opcion 2, con redirect
		
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'La cita se ha creado exitosamente.';
			js_redirect('consultar-citas.php', 2500);
		}
		

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>