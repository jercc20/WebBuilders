<?php
	if( $_POST ){
		define('PAGE','crear-procedimiento'); //mismo nombre de la pagina del formulario
		require_once 'functions.php';

		/* Ejemplo */
		//print_r( $_POST ); //Para ver que lleva el POST, luego se quita
		$name = ( isset( $_POST['txt_name'] ) ) ? $_POST['txt_name'] : '';
		$cost = ( isset( $_POST['txt_cost'] ) ) ? $_POST['txt_cost'] : '';
		$description = ( isset( $_POST['txt_description'] ) ) ? $_POST['txt_description'] : '';

		$query = "INSERT INTO tbprocedimientos VALUES" . "('NULL','$name', '$cost', '$description')";
		//echo $query; //Para ver como queda el query, luego se quita

		//Opcion 1
		//echo do_query( $query );

		//Opcion 2, con redirect
		
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'El procedimiento se ha creado exitosamente.';
			js_redirect('consultar-procedimientos.php', 2500);
		}
		

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>