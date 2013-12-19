<?php

	if( $_POST ){
		define('PAGE','registrarBitacora');
		require_once 'functions.php';

		if(empty($_POST['procedimientos'])){
			echo "Debe agregar almenos un procedimiento";
			exit();
		}

		$dentistId = ( isset( $_POST['slt-odontologo'] ) ) ? $_POST['slt-odontologo'] : '';
		$patientId = (isset( $_POST['id_patient'] ) ) ? $_POST['id_patient'] : '';
		$date = ( isset( $_POST['txt-user-dob'] ) ) ? $_POST['txt-user-dob'] : '';
		$dateSql = do_sql_date_format($date);
		$asistentes = ( isset( $_POST['txt-asistentes'] ) ) ? $_POST['txt-asistentes'] : NULL;
		$notes = ( isset( $_POST['txt-notes'] ) ) ? $_POST['txt-notes'] : NULL;

		$query = "INSERT INTO tbbitacoras VALUES" . "(NULL, '$dentistId', '$patientId', '$dateSql', '$asistentes', '$notes')";

		$result = do_query( $query );

		if( $result == 1 ){
			$idBitacora = mysql_insert_id();
			$idOdontograma = $_POST['idOdontograma'];
			foreach ($_POST['procedimientos'] as $key => $procedimiento) {

				$insertProcedimiento = "INSERT INTO tbprocedimientosporbitacora VALUES('$idBitacora', '$procedimiento')";
				$updateProcedimiento = "UPDATE tbprocedimientosporodontograma SET realizado = '1' WHERE idOdontograma = '$idOdontograma[$key]' AND idProcedimiento = '$procedimiento'";
				do_query( $insertProcedimiento );
				do_query( $updateProcedimiento );
			}
			echo 'La bitacora se ha guardado correctamente.';
			js_redirect('consultar-bitacoras.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>