<?php
	if( $_POST ){
		define('PAGE','crear-abono');
		require_once 'functions.php';

		if( isset( $_POST['txt-bill-num'] ) && ! empty( $_POST['txt-bill-num'] )  ){
			$idBill = $_POST['txt-bill-num'];
		}
		else {
			echo "El id de la factura es requerido";
			exit();
		}
		$date = ( isset( $_POST['txt-user-dob'] ) ) ? date( 'Y-m-d', strtotime( $_POST['txt-user-dob'] ) ) : '';
		$amount = ( isset( $_POST['txt-amount'] ) ) ? $_POST['txt-amount'] : '';
		$notes = ( isset( $_POST['notes'] ) ) ? $_POST['notes'] : '';

		$query = "INSERT INTO tbabonos VALUES (NULL, '$idBill', '$date', '$amount', '$notes')";

		$result = do_query( $query );
		if( $result == 1 ){
			echo 'El abono a sido guardado correctamente.';
			js_redirect('consultar-abonos.php', 2500);
		}

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>