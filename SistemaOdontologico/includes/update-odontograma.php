<?php
	if( $_POST ){
		define('PAGE','editarOdontograma');
		require_once 'functions.php';

		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$date = ( isset( $_POST['txt_date_realized'] ) ) ? do_sql_date_format( $_POST['txt_date_realized'] ) : '';
		$userId = ( isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';
		$idOdontograma = ( isset( $_POST['odontograma'] ) ) ? $_POST['odontograma'] : '';

		$query = "UPDATE tbodontogramas SET idOdontologo = '$dentistId', fecha = '$date', idPaciente = '$userId'  WHERE idOdontograma = $idOdontograma";

		$result = do_query($query);

		if ($result == 1) {
			echo "El odontograma se ha modificado exitosamente.";
		}

		/*---------*/

		global $db_server;
		mysql_close( $db_server );
	}
?>