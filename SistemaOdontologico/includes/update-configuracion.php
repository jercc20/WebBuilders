<?php
if( $_POST ){
	define('PAGE','configuracion');
	require_once 'functions.php';

	$nombreSistema = ( isset( $_POST['txt-system-name'] ) ) ? $_POST['txt-system-name'] : '';
	$telefonos = ( isset( $_POST['txt-system-phone'] ) ) ? $_POST['txt-system-phone'] : '';
	$correoElectronico = ( isset( $_POST['txt-system-email'] ) ) ? $_POST['txt-system-email'] : '';
	$horario = ( isset( $_POST['txt-system-schedule'] ) ) ? $_POST['txt-system-schedule'] : '';
	$direccion = ( isset( $_POST['txt-system-address'] ) ) ? $_POST['txt-system-address'] : '';
	$numeroAsientos = ( isset( $_POST['numero-asientos'] ) ) ? $_POST['numero-asientos'] : '';

	$query = "UPDATE tbconfiguracion SET nombreSistema = '$nombreSistema', telefonos = '$telefonos', correoElectronico = '$correoElectronico', horario = '$horario', direccion = '$direccion', numeroAsientos = $numeroAsientos WHERE idConfiguracion = 1";

	$result = do_query( $query );
	if( $result == 1 ){
		echo 'Se actualizaron los datos del sistema existosamente';
		js_redirect('login.html', 800);
	}

	global $db_server;
	mysql_close( $db_server );
}
?>