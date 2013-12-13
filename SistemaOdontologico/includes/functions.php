<?php

require_once 'config.php'; //config vars

//TEMP!!! para las funciones de cada uno
require_once 'diego.php';
require_once 'mathias.php';
require_once 'johel.php';
require_once 'laura.php';
require_once 'marco.php';

/* Init */
$db_server = db_init(); //Verifica e inicia la conexion a la db
check_user();
$_POST = sanitize( $_POST ); //Clean POST
$_GET  = sanitize( $_GET ); //Clean GET
//$_SESSION['userinfo'] = get_user_info();

/* Functions */
function db_init(){
	global $db_hostname,
			$db_database,
			$db_username,
			$db_password;

	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if( !$db_server )
		die("No se pudo establecer conexión con MySQL: " . mysql_error());

	mysql_select_db($db_database)
		or die("No se puedo establecer conexión con la base de datos: ". mysql_error());

	return $db_server;
}

function do_query( $query ){
	global $db_server;

	$result = mysql_query( $query, $db_server );
	if( !$result )
		die("Falló el acceso a la BD: " . mysql_error());

	return $result;
}

function debug_query( $query_result ){
	echo '<pre>';
	while( $row = mysql_fetch_assoc( $query_result ) ){
		var_dump( $row );
	}
	echo '</pre>';
}

function cleanInput( $input ) {
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);

	return $output;
}

function sanitize( $input ) {
	if (is_array($input)) {
		foreach($input as $var=>$val) {
			$output[$var] = sanitize($val);
		}
	}
	else {
		if (get_magic_quotes_gpc()) {
			$input = stripslashes($input);
		}
		$input  = cleanInput($input);
	$output = mysql_real_escape_string($input);
	}

	return $output;
}

function check_user(){
	//verifica si el usuario esta logueado, sino lo envia a login
	//verifica si el usuario tiene permisos para ver la pagina, sino lo envia a 404
}

function get_user_info(){
	//return user info in array
}



?>