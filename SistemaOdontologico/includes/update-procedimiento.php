<?php
	if( $_POST ){
		define('PAGE','editarProcedimiento');
		require_once 'functions.php';

		$id = ( isset( $_POST['idProcedimiento'] ) ) ? $_POST['idProcedimiento'] : '';
		$name = ( isset( $_POST['txt_name'] ) ) ? $_POST['txt_name'] : '';
		$cost = ( isset( $_POST['txt_cost'] ) ) ? $_POST['txt_cost'] : '';
		$description = ( isset( $_POST['txt_description'] ) ) ? $_POST['txt_description'] : NULL;

		$query = "UPDATE tbprocedimientos SET nombre = '$name', Costo = '$cost', descripcion = '$description' WHERE idProcedimiento = '$id'";
		echo do_query( $query );

		global $db_server;
		mysql_close( $db_server );
	}
?>