<?php
	if( $_POST ){
		define('PAGE','registrarOdontograma');
		require_once 'functions.php';

		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$date = ( isset( $_POST['txt_date_realized'] ) ) ? do_sql_date_format( $_POST['txt_date_realized'] ) : '';
		$dateSql = do_sql_date_format($date);
		$userId = ( isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';
		$zona = ( isset( $_POST['zone'] ) ) ? $_POST['zone'] : '';

		print_r($zona);

		exit();

		$query = "INSERT INTO tbodontogramas VALUES" . "(NULL, '$dentistId', '$dateSql', '$userId')";

		if( isset($_POST['procedimientos']) ){

			$idOdontograma = mysql_insert_id();

			foreach ($_POST['procedimientos'] as $key => $procedimiento) {

				echo $zona[$key] . '-' . $procedimiento . ':';

				$insertProcedimiento = "INSERT INTO tbprocedimientosporodontograma VALUES ($idOdontograma, $procedimiento, 0, NULL)";

				//do_query( $insertProcedimiento );

			}

			exit();

			echo 'El odontograma se ha creado exitosamente.';
			js_redirect('consultar-odontogramas.php', 2500);
		}else{
			echo 'Debe seleccionar un procedimiento';
			exit();
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>