<?php
if( $_POST ){
	define('PAGE','editarInformacion');
	require_once 'functions.php';

	$logo = ( isset( $_POST['txt-system-logo'] ) ) ? $_POST['txt-system-logo'] : '';
	$baner = ( isset( $_POST['txt-system-banner'] ) ) ? $_POST['txt-system-banner'] : '';
	$telefonos = ( isset( $_POST['txt-system-phone'] ) ) ? $_POST['txt-system-phone'] : '';
	$correoElectronico = ( isset( $_POST['txt-system-email'] ) ) ? $_POST['txt-system-email'] : '';
	$horario = ( isset( $_POST['txt-system-schedule'] ) ) ? $_POST['txt-system-schedule'] : '';
	$direccion = ( isset( $_POST['txt-system-address'] ) ) ? $_POST['txt-system-address'] : '';
	$numeroAsientos = ( isset( $_POST['numero-asientos'] ) ) ? $_POST['numero-asientos'] : '';

	$query = "UPDATE tbconfiguracion SET logo = '$logo', baner = '$baner', telefonos = '$telefonos', correoElectronico = '$correoElectronico', horario = '$horario', direccion = '$direccion', numeroAsientos = $numeroAsientos WHERE idConfiguracion = 1";

	echo do_query( $query );

	global $db_server;
	mysql_close( $db_server );
}
?>