<?php
	if( $_POST ){
		define('PAGE','crearOdontograma');
		require_once 'functions.php';

		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$date = ( isset( $_POST['txt_date_realized'] ) ) ? do_sql_date_format( $_POST['txt_date_realized'] ) : '';
		$dateSql = do_sql_date_format($date);
		$userId = ( isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';

		$query = "INSERT INTO tbodontogramas VALUES " . "(NULL, '$dentistId', '$dateSql', '$userId')";

		$result = do_query( $query );
		if( $result == 1 ){
			$idOdontograma = mysql_insert_id();

			foreach ($_POST['procedimientos'] as $key => $procedimiento) {

				$insertProcedimiento = "INSERT INTO tbprocedimientosporodontograma VALUES ($idOdontograma, $procedimiento, 0, NULL)";

				do_query( $insertProcedimiento );

			}
			echo 'El odontograma se ha creado exitosamente.';
			js_redirect('consultar-odontogramas.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>