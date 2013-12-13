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

function js_redirect( $url, $delay = 0 ){
	echo "<script>SO.utils.redirect('$url', '$delay');</script>";
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
	$output = array();

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

/* ---------------------- */

if( isset( $_POST ) )
	$_POST = sanitize( $_POST ); //Clean POST

if( isset( $_GET ) )
	$_GET = sanitize( $_GET ); //Clean GET

if( isset( $_POST['ajax-call'] ) && isset( $_POST['var'] ) ){
	switch ( $_POST['var'] ) {
		case 'idAbono': //Eliminar abono
			$abono = ( isset( $_POST['idAbono'] ) ) ? $_POST['idAbono'] : '';
			$query = "DELETE FROM tbabonos WHERE idAbono = '$abono'";
			echo do_query( $query );
			break;
	}
}


/* ---------------------- */

function display_abonos_rows(){
	$abonos = get_abonos();
	while( $row = mysql_fetch_assoc( $abonos ) ){
		$user = mysql_fetch_assoc( get_user_factura( $row['idFactura'] ) );
		echo '<tr>'.
				'<td>'.$row['idFactura'].'</td>'.
				'<td>'.$row['idAbono'].'</td>'.
				'<td>'.$user['nombre'].'</td>'.
				'<td>'.$user['identificacion'].'</td>'.
				'<td>'.$row['fecha'].'</td>'.
				'<td>'.$row['monto'].'</td>'.
				'<td><a href="#!?idAbono='.$row['idAbono'].'"><i class="icon-remove item-remove"></i></a></td>'.
			'</tr>';
	}
}

function get_abonos(){
	$query = "SELECT * FROM tbabonos";
	$result = do_query( $query );
	return $result;
}

function get_user_factura( $idFactura ){
	$query = "SELECT identificacion, nombre
	FROM tbusuarios AS u, tbodontogramas AS o, tbfacturas AS f
	WHERE f.idFactura = '$idFactura'
		AND f.idOdontograma = o.idOdontograma
		AND o.idPaciente = u.idUsuario";
	$result = do_query( $query );
	return $result;
}


?>