<?php
	if( $_POST ){
		define('PAGE',''); //mismo nombre de la pagina del formulario
		require_once 'functions.php';

		/* Ejemplo */
		print_r( $_POST ); //Para ver que lleva el POST, luego se quita
		$idBill = ( isset( $_POST['id'] ) ) ? $_POST['id'] : '';

		$query = "INSERT INTO tabla VALUES (NULL, '$id')";
		echo $query; //Para ver como queda el query, luego se quita

		//Opcion 1
		//echo do_query( $query );

		//Opcion 2, con redirect
		/*
		$result = do_query( $query );
		if( $result == 1 ){
			echo 'Mensaje!';
			js_redirect('login.html', 800);
		}
		*/

		/* ---- */

		global $db_server;
		mysql_close( $db_server );
	}
?>