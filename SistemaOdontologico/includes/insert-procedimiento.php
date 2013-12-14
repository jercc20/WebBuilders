<?php
	if( $_POST ){
		define('PAGE','crear-procedimiento');
		require_once 'functions.php';

		$name = ( isset( $_POST['txt_name'] ) ) ? $_POST['txt_name'] : '';
		$cost = ( isset( $_POST['txt_cost'] ) ) ? $_POST['txt_cost'] : '';
		$description = ( isset( $_POST['txt_description'] ) ) ? $_POST['txt_description'] : '';

		$query = "INSERT INTO tbprocedimientos VALUES" . "('NULL','$name', '$cost', '$description')";
		
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'El procedimiento se ha creado exitosamente.';
			js_redirect('consultar-procedimientos.php', 2500);
		}

		global $db_server;
		mysql_close( $db_server );
	}
?>