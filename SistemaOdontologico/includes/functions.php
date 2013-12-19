<?php

//require_once 'config.php'; //config vars
$db_hostname = 'localhost';
$db_database = 'bdsistemaodontologico';
$db_username = 'root';
$db_password = '';

//TEMP!!! para las funciones de cada uno
require_once 'diego.php';
require_once 'mathias.php';
require_once 'johel.php';
require_once 'laura.php';
require_once 'marco.php';

/* Init */
$db_server = db_init(); //Verifica e inicia la conexion a la db
check_user();

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

	$result = mysql_query( null_replace( $query ), $db_server );
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

function check_user(){
	session_start();
	if( defined('PAGE') && PAGE == 'login' ){
		if( isset( $_SESSION['idUsuario'] ) && ! empty( $_SESSION['idUsuario'] ) ){
			header('Location: inicio.php');
			exit();
		}
	}
	else {
		if( ! isset( $_SESSION['idUsuario'] ) || empty( $_SESSION['idUsuario'] ) ){
			header('Location: login.php');
			exit();
		}
		$_SESSION['userinfo'] = mysql_fetch_assoc( get_user_by_id( $_SESSION['idUsuario'] ) );
		$_SESSION['roleinfo'] = get_array_roles( $_SESSION['userinfo']['idRol'] );
		if( ! defined('PAGE') && ! isset( $_POST['ajax-call'] ) ){
			echo "Falta definir el PAGE"; //TMP!!!
			//header('Location: inicio.php');
			//exit();
		}
		if( ( ( defined('PAGE') && PAGE != 'inicio' && PAGE != 'select' && PAGE != 'perfil' ) && ! isset( $_POST['ajax-call'] )  )
			&& ! check_permission( PAGE ) ){
			echo "Revisar el PAGE con los permisos del rol actual<br />"; //TMP!!!
			echo "Page actual: " . PAGE; //TMP!!!
			//header('Location: 404.php');
			//exit();
		}
	}
}

function check_permission( $permissions ){
	if( ! is_array( $permissions ) ){
		$permissions = array( $permissions );
	}
	foreach ($permissions as $permission) {
		if( isset( $_SESSION["roleinfo"][$permission] ) && $_SESSION["roleinfo"][$permission] ){
			return true;
		}
	}
	return false;
}

function js_redirect( $url, $delay = 0 ){
	echo "<script>SO.utils.redirect('$url', '$delay');</script>";
}

function null_replace( $text ){
	$result = str_replace("'NULL'", "NULL", $text);
	return $result;
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

/* ---------------------- */

if( ! empty( $_POST ) && ! empty( $_POST ) )
	$_POST = sanitize( $_POST ); //Clean POST

if( isset( $_GET ) && ! empty( $_GET ) )
	$_GET = sanitize( $_GET ); //Clean GET

if( isset( $_POST['ajax-call'] ) && isset( $_POST['var'] ) ){
	switch ( $_POST['var'] ) {

		case 'idAbono': //Eliminar abono
			$abono = ( isset( $_POST['idAbono'] ) ) ? $_POST['idAbono'] : '';
			$query = "DELETE FROM tbabonos WHERE idAbono = '$abono'";
			echo do_query( $query );
			break;

		case 'idFactura': //Eliminar factura
			$factura = ( isset( $_POST['idFactura'] ) ) ? $_POST['idFactura'] : '';
			$query = "DELETE FROM tbfacturas WHERE idFactura = '$factura'";
			echo do_query( $query );
			break;

		case 'idUsuario': //Eliminar Usuario
			$usuario = ( isset( $_POST['idUsuario'] ) ) ? $_POST['idUsuario'] : '';
			if( $usuario == $_SESSION['idUsuario'] ){
				echo "No se puede borrar el usuario actual.";
				break;
			}
			$query = "DELETE FROM tbusuarios WHERE idUsuario = '$usuario'";
			echo do_query( $query );
			break;

		case 'idRol': //Eliminar rol
			$rol = ( isset( $_POST['idRol'] ) ) ? $_POST['idRol'] : '';
			if( $rol == $_SESSION['userinfo']['idRol'] ){
				echo "No se puede borrar el rol del usuario actual.";
				break;
			}
			$query = "DELETE FROM tbroles WHERE idRol = '$rol'";
			echo do_query( $query );
			break;

		case 'idProcedimiento': //Eliminar procedimiento
			$procedimiento = ( isset( $_POST['idProcedimiento'] ) ) ? $_POST['idProcedimiento'] : '';
			$query = "DELETE FROM tbprocedimientos WHERE idProcedimiento = '$procedimiento'";
			echo do_query( $query );
			break;

		case 'idCita': //Eliminar cita
			$cita = ( isset( $_POST['idCita'] ) ) ? $_POST['idCita'] : '';
			$query = "DELETE FROM tbcitas WHERE idCita = '$cita'";
			echo do_query( $query );
			break;

		case 'idBitacora': //Eliminar Bitacora
			$bitacora = ( isset( $_POST['idBitacora'] ) ) ? $_POST['idBitacora'] : '';
			$query = "DELETE FROM tbbitacoras WHERE idBitacora = '$bitacora'";
			echo do_query( $query );
			break;

		case 'idOdontograma': //Eliminar Odontograma
			$odontograma = ( isset( $_POST['idOdontograma'] ) ) ? $_POST['idOdontograma'] : '';
			$query = "DELETE FROM tbodontogramas WHERE idOdontograma = '$odontograma'";
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
				'<td>' . $row['idFactura'] . '</td>'.
				'<td>' . $row['idAbono'] . '</td>'.
				'<td>' . get_full_user_name( $user ) . '</td>'.
				'<td>' . $user['identificacion'] . '</td>'.
				'<td>' . do_date_format( $row['fecha'] ) . '</td>'.
				'<td>' . $row['monto'] . '</td>'.
				'<td><a href="#!?idAbono=' . $row['idAbono'] . '"><i class="icon-remove item-remove"></i></a></td>'.
			'</tr>';
	}
}

function get_abonos(){
	$query = "SELECT * FROM tbabonos";
	$result = do_query( $query );
	return $result;
}

function get_user_factura( $idFactura ){
	$query = "SELECT identificacion, nombre, primerApellido, segundoApellido
	FROM tbusuarios AS u, tbodontogramas AS o, tbfacturas AS f
	WHERE f.idFactura = '$idFactura'
		AND f.idOdontograma = o.idOdontograma
		AND o.idPaciente = u.idUsuario";
	$result = do_query( $query );

	return $result;
}

function get_full_user_name( $result_user ){
	$user = $result_user['nombre'];
	if( $result_user['primerApellido'] )
		$user .= ' ' . $result_user['primerApellido'];
	if( $result_user['segundoApellido'] )
		$user .= ' ' . $result_user['segundoApellido'];

	return $user;
}

function do_date_format( $date ){
	$result = date( "d-m-Y", strtotime( $date ) );
	return $result;
}

function do_sql_date_format( $date ){
	$result = date( 'Y-m-d', strtotime( $date ) );
	return $result;
}

function display_facturas_rows(){
	$facturas = get_facturas();
	while( $row = mysql_fetch_assoc( $facturas ) ){
		$user = mysql_fetch_assoc( get_user_factura( $row['idFactura'] ) );
		$total = mysql_fetch_array( get_amount_odontograma( $row['idOdontograma'] ) );
		$total = array_shift( $total );
		$numAbonos = mysql_num_rows( get_abonos_factura( $row['idFactura'] ) );
		$totalAbonos = mysql_fetch_array( get_total_abonos_factura( $row['idFactura'] ) );
		$totalAbonos = array_shift( $totalAbonos );
		echo '<tr>'.
				'<td>' . $row['idFactura'] . '</td>'.
				'<td>' . get_full_user_name( $user ) . '</td>'.
				'<td>' . $user['identificacion'] . '</td>'.
				'<td>' . $total . '</td>'.
				'<td>' . $numAbonos . '</td>'.
				'<td>' . do_minus( $total, $totalAbonos ) . '</td>'.
				'<td>'.
					'<a href="crear-abono.php?id-factura=' . $row['idFactura'] . '"><i class="icon-coin"></i></a>'.
					'<a href="#!?idFactura=' . $row['idFactura'] . '"><i class="icon-remove item-remove"></i></a>'.
				'</td>'.
			'</tr>';
	}
}

function get_facturas(){
	$query = "SELECT * FROM tbfacturas";
	$result = do_query( $query );
	return $result;
}

function get_amount_odontograma( $idOdontograma ){
	$query = "SELECT SUM(Costo) AS total
			FROM tbprocedimientosporodontograma AS po,
				tbprocedimientos AS p
			WHERE po.idOdontograma = '$idOdontograma'
				AND p.idProcedimiento = po.idProcedimiento";
	$result = do_query( $query );

	return $result;
}

function get_abonos_factura( $idFactura ){
	$query = "SELECT monto FROM tbabonos WHERE idFactura = '$idFactura'";
	$result = do_query( $query );
	return $result;
}

function get_procedimientos_odontograma( $idOdontograma ){
	$query = "SELECT * FROM tbprocedimientosporodontograma WHERE idOdontograma = '$idOdontograma'";
	$result = do_query( $query );
	return $result;
}

function get_total_abonos_factura( $idFactura ){
	$query = "SELECT SUM(monto) AS total FROM tbabonos WHERE idFactura = '$idFactura'";
	$result = do_query( $query );
	return $result;
}

function do_minus( $val1, $val2, $negative = false ){
	$result = $val1 - $val2;
	if( ! $negative && $result < 0 )
		$result = 0;

	return $result;
}

function display_home_citas(){
	$citas = get_next_citas();
	while( $row = mysql_fetch_assoc( $citas ) ){
		$user = mysql_fetch_assoc( get_user_by_id( $row['idPaciente'] ) );
		echo '<tr>'.
				'<td>' . $row['idCita'] . '</td>'.
				'<td>' . get_full_user_name( $user ) . '</td>'.
				'<td>' . do_date_format( $row['fecha'] ) . '</td>'.
				'<td>' . do_time_format( $row['hora'] ) . '</td>'.
			'</tr>';
	}
}

function get_next_citas(){
	$query = "SELECT idCita, idPaciente, fecha, hora
				FROM tbcitas
				WHERE fecha BETWEEN curdate() and curdate() + interval 2 day
				ORDER BY fecha";
	$result = do_query( $query );

	return $result;
}

function get_user_by_id( $id ){
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = '$id'";
	$result = do_query( $query );

	return $result;
}

function do_time_format( $time ){
	$result = date('h:i a', strtotime( $time ) );
	return $result;
}

function do_sql_time_format( $hour, $minutes ){
	$time = $hour . ':' . $minutes;
	$result = date('H:i', strtotime( $time ) );
	return $result;
}

function split_time( $time ){
	$time = date('G:i', strtotime( $time ) );
	$sec = explode(":", $time);
	if( $sec['1'] < 10 )
		$sec['1'] = substr($sec['1'], -1);

	return $sec;
}

function display_home_procedimientos(){
	$odontogramas = get_old_odontogramas();
	while( $row = mysql_fetch_assoc( $odontogramas ) ){
		$items = get_pending_proce_odonto( $row['idOdontograma'] );
		if( mysql_num_rows( $items ) > 0 ){
			$user = mysql_fetch_assoc( get_user_by_id( $row['idPaciente'] ) );
			while( $item = mysql_fetch_assoc( $items ) ){
				echo '<tr>'.
						'<td>' . $row['idOdontograma'] . '</td>'.
						'<td>' . get_full_user_name( $user ) . '</td>'.
						'<td>' . do_date_format( $row['fecha'] ) . '</td>'.
						'<td>' . $item['nombre'] . '</td>'.
					'</tr>';
			}
		}
	}
}

function get_old_odontogramas(){
	$query = "SELECT idOdontograma, idPaciente, fecha
				FROM tbodontogramas
				WHERE fecha <= ( curdate() - interval 6 month )
				ORDER BY fecha";
	$result = do_query( $query );

	return $result;
}

function get_pending_proce_odonto( $idOdontograma ){
	$query = "SELECT nombre
				FROM tbprocedimientosporodontograma AS po,
					tbprocedimientos AS p
				WHERE po.idOdontograma = '$idOdontograma'
					AND po.realizado = '0'
					AND p.idProcedimiento = po.idProcedimiento";
	$result = do_query( $query );

	return $result;
}

function display_reporte_facturas_rows(){
	$facturas = ( ! empty( $_POST ) ) ? get_facturas_custom() : get_facturas();
	while( $row = mysql_fetch_assoc( $facturas ) ){
		$user = mysql_fetch_assoc( get_user_factura( $row['idFactura'] ) );
		$total = mysql_fetch_array( get_amount_odontograma( $row['idOdontograma'] ) );
		$total = array_shift( $total );
		$numAbonos = mysql_num_rows( get_abonos_factura( $row['idFactura'] ) );
		$totalAbonos = mysql_fetch_array( get_total_abonos_factura( $row['idFactura'] ) );
		$totalAbonos = array_shift( $totalAbonos );
		echo '<tr>'.
				'<td>' . $row['idFactura'] . '</td>'.
				'<td>' . get_full_user_name( $user ) . '</td>'.
				'<td>' . $user['identificacion'] . '</td>'.
				'<td>' . $total . '</td>'.
				'<td>' . $numAbonos . '</td>'.
				'<td>' . do_minus( $total, $totalAbonos ) . '</td>'.
			'</tr>';
	}
}

function get_facturas_custom(){
	$query = "SELECT * FROM tbfacturas";
	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ||
			! empty( $_POST['txt-patient-lastname'] ) ){
			$query .= " JOIN tbodontogramas USING(idOdontograma)";
			$query .= " JOIN tbusuarios ON idPaciente = idUsuario";
		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
		if( ! empty( $_POST['txt-patient-lastname'] ) )
			$query .= " AND primerApellido LIKE ('%" . $_POST['txt-patient-lastname'] . "%')";
		if( ! empty( $_POST['txt-start-date'] ) && ! empty( $_POST['txt-end-date'] ) )
			$query .= " AND fecha BETWEEN '" . do_sql_date_format( $_POST['txt-start-date'] ) . "' AND '" . do_sql_date_format( $_POST['txt-end-date'] ) . "'";
		elseif( ! empty( $_POST['txt-start-date'] ) )
			$query .= " AND fecha >= '" . do_sql_date_format( $_POST['txt-start-date'] ) . "'";
		elseif( ! empty( $_POST['txt-end-date'] ) )
			$query .= " AND fecha <= '" . do_sql_date_format( $_POST['txt-end-date'] ) . "'";
	}
	$result = do_query( $query );

	return $result;
}

function get_banner(){
	$query = "SELECT banner FROM tbconfiguracion WHERE idConfiguracion = '1'";
	$result = do_query( $query );

	return $result;
}
function crear_factura( $idOdontograma ){
	$query = "INSERT INTO tbfacturas VALUES (NULL , '$idOdontograma')";
	$result = do_query( $query );

	return $result;
}
?>