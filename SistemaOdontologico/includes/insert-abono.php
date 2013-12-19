<?php
	if( $_POST ){
		define('PAGE','crearAbono');
		require_once 'functions.php';

		if( isset( $_POST['txt-bill-num'] ) && ! empty( $_POST['txt-bill-num'] )  ){
			$idBill = $_POST['txt-bill-num'];
		}
		else {
			echo "El id de la factura es requerido";
			exit();
		}
		$date = ( isset( $_POST['txt-date'] ) ) ? do_sql_date_format( $_POST['txt-date'] ) : '';
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