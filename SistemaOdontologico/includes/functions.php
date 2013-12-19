<?php

/* Config vars */
$db_hostname = 'localhost';
$db_database = 'bdsistemaodontologico';
$db_username = 'root';
$db_password = '';
/* --------------------------------------------- */


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
			header('Location: inicio.php');
			exit();
		}
		if( ( ( defined('PAGE') && PAGE != 'inicio' && PAGE != 'select' && PAGE != 'perfil' ) && ! isset( $_POST['ajax-call'] )  )
			&& ! check_permission( PAGE ) ){
			header('Location: 404.php');
			exit();
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

function display_reporte_odontogramas_rows(){

	$odontogramas = ( ! empty( $_POST ) ) ? get_odontograma_custom() : get_odontograma();
	while ($fila = mysql_fetch_assoc($odontogramas)) {
		$total = mysql_fetch_array( get_amount_odontograma( $fila['idOdontograma'] ) );
		$total = array_shift( $total );
		$numProcess = mysql_num_rows( get_procedimientos_odontograma( $fila['idOdontograma'] ) );
		echo '<tr>';
			echo '<td>' . $fila["idOdontograma"] . '</td>';
			echo '<td>' . $fila["nombre"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . do_date_format( $fila["fecha"] ) . '</td>';
			echo '<td>' . $numProcess . '</td>';
			echo '<td>' . $total . '</td>';
		echo '</tr>';
	}
}

function get_odontograma_custom(){
	$query = "SELECT * FROM tbodontogramas
			 JOIN tbusuarios ON idPaciente = idUsuario";
	if( ! empty( $_POST ) ){
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
		if( ! empty( $_POST['txt-num-odonto'] ) )
			$query .= " AND idOdontograma LIKE ('%" . $_POST['txt-num-odonto'] . "%')";
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

function get_odontograma(){
	$query = "SELECT *
			FROM tbodontogramas
			JOIN tbusuarios ON idPaciente = idUsuario";

	$result = do_query( $query );

	return $result;
}

function get_bitacora( $idBitacora ){
	$query =  "SELECT * FROM tbbitacoras WHERE idBitacora = $idBitacora";
	$result = do_query( $query );

	return $result;
}

/* ================================================================================= */
function configuracion_basica(){

	$tabla = datos_configuracion();

	echo "<p><i class='icon-inicio'></i>".$tabla['direccion']."</p>" .
	"<p><i class='icon-phone'></i>".$tabla['telefonos']."</p>" .
	"<p><i class='icon-mail'></i>".$tabla['correoElectronico']."</p>" .
	"<p><i class='icon-citas'></i>".$tabla['horario']."</p>";
}

function display_roles_rows(){

	$roles = get_roles();
	while( $row = mysql_fetch_assoc( $roles ) ){
		if ($row['idRol'] <=4 && $row['idRol'] >=1) {
		echo '<tr>'.
			'<td>' . $row['nombreRol'] . '</td>'.
			'<td><a href="editar-rol.php?id=' . $row['idRol'] . '"><i class="icon-edit"></i></a></td>'.
		'</tr>';
		}else{
		echo '<tr>'.
			'<td>' . $row['nombreRol'] . '</td>'.
			'<td><a href="editar-rol.php?id=' . $row['idRol'] . '"><i class="icon-edit"></i></a> <a href="#!?idRol=' . $row['idRol'] . '"><i class="icon-remove item-remove"></i></a></td>'.
		'</tr>';
		}
	}
}

function display_reporte_usuarios_rows(){

	$usuarios = ( ! empty( $_POST ) ) ? get_usuarios_custom() : get_usuarios();

	while ( $row = mysql_fetch_assoc( $usuarios ) ) {

		if (isset($row['nombreRol'])) {
			$nombreRol = $row['nombreRol'];
		}else{
			$result = get_rol_usuario($row['idRol']);
			$tabla = mysql_fetch_assoc($result);

			$nombreRol = $tabla['nombreRol'];
		}

		echo '<tr>';
			echo '<td>' . $row["nombre"]." ".$row["primerApellido"]." ".$row["segundoApellido"] . '</td>';
			echo '<td>' . $row["identificacion"] . '</td>';
			echo '<td>' . $nombreRol . '</td>';
			echo '<td>' . $row["telefonoCasa"] .' / '.$row["telefonoCelular"]. '</td>';
			echo '<td>' . $row["correoElectronico"] . '</td>';
			echo '<td>' . $row["domicilio"] . '</td>';
		echo '</tr>';
	}
}

function get_usuarios_custom(){
	$query = "SELECT * FROM tbusuarios order by idRol";
	if( ! empty( $_POST ) ){
		$query .= " WHERE 1";

		if( ! empty( $_POST['user-id'] ) )
			$query .= " AND identificacion LIKE ('%" . $_POST['user-id'] . "%')";
		if( ! empty( $_POST['txt-user-name'] ) )
			$query .= " AND nombre LIKE ('%" . $_POST['txt-user-name'] . "%')";
		if( ! empty( $_POST['txt-user-lastname'] ) )
			$query .= " AND primerApellido LIKE ('%" . $_POST['txt-user-lastname'] . "%')";
		if ( ! empty( $_POST['user-rol'] ) && $_POST['user-rol'] !=0 )
			$query .= " AND idRol = " . $_POST['user-rol'] . "";
	}
	$result = do_query( $query );

	return $result;
}

function get_rol_usuario($pidRol){
	$query = "SELECT nombreRol FROM tbroles WHERE idRol = '$pidRol'";
	$result = do_query($query);

	return $result;
}

function display_array_rol(){
	$roles = get_roles();
	echo '<option value="0">Todos</option>';
	while ($fila = mysql_fetch_row($roles)){
	    	echo '<option value='. $fila["0"] .'>'. $fila["1"]. '</option>';
	}
}

function get_roles(){
	$query = "SELECT * FROM tbroles";
	$result = do_query( $query );
	return $result;
}

function get_array_roles($pidRol){
	$query = "SELECT * FROM tbroles WHERE idRol = '$pidRol'";
	$result = do_query($query);
	$tabla = mysql_fetch_assoc($result);
	return $tabla;
}

function datos_configuracion(){
	$query = "SELECT * FROM tbconfiguracion WHERE idConfiguracion = '1'";

	$result = do_query($query);

 	$tabla = mysql_fetch_assoc($result);

 	return $tabla;
}

function get_perfil_user($pidUsuario){
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = '$pidUsuario'";

	$result = do_query($query);

	$tabla = mysql_fetch_assoc($result);

	return $tabla;
}

function display_editar_odontograma_procedimiento(){
	$odontograma = $_GET['idOdontograma'];

	$procedimientos = get_odontograma_procedimientos($odontograma);

		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';
				echo '<td>' . $fila["nombre"] .'</td>';
				echo '<td>' . $fila["costo"] .'</td>';
				echo '<td>' . $fila["zona"] .'</td>';
			echo '</tr>';
		}
}

function get_odontograma_procedimientos($pid){
	$query = "SELECT nombre, costo, zona
		FROM tbprocedimientosporodontograma AS pb,
		tbprocedimientos AS p
			WHERE pb.idOdontograma = '$pid'
			AND p.idProcedimiento = pb.idProcedimiento";

	$result=do_query($query);

	return $result;
}

function get_datos_odontograma(){
	$query = "SELECT * FROM tbodontogramas";

	$result = do_query($query);

	$datos = mysql_fetch_assoc($result);

	return $datos;
}
/* ================================================================================= */
function display_bitacoras_rows(){

	$bitacoras = get_bitacoras();

	while ($fila = mysql_fetch_assoc($bitacoras)){
					echo '<tr>';
						echo '<td>' . $fila["idBitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
						echo '<td><a href="editar-bitacora.php?idPaciente='  . $fila['idPaciente'] . '&idBitacora=' . $fila['idBitacora'] . '"><i class="icon-edit"></i></a><a href="#!?idBitacora=' . $fila['idBitacora'] . '"> <i class="icon-remove item-remove"></i></a></td>';
					echo '</tr>';
	}
}

function get_bitacoras(){
	$query = "SELECT b.*,
			u.nombre AS u_nombre,
			o.nombre AS o_nombre,
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbbitacoras AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";

	$result=do_query($query);
	return $result;
}

function display_crear_bitacora(){
	$crearBitacora = get_crear_bitacora();

	$fila = mysql_fetch_array($crearBitacora);
	$nombre = $fila['nombre'];
	$apellido = $fila['primerApellido'];
	$na = $nombre . " " . $apellido;
	$identificacion = $fila['identificacion'];
	$id_patient = $fila['idUsuario'];

	echo "<input type='hidden' name='id_patient' value='$id_patient' />";
	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}
function get_crear_bitacora(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_editar_bitacora(){
	$editarBitacora = get_editar_bitacora();

	$fila = mysql_fetch_array($editarBitacora);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text'  readonly='readonly' value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text'  readonly='readonly' value='$identificacion' />";
}

function get_editar_bitacora(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}


function display_reporte_bitacoras_rows(){

	$bitacoras = ( ! empty( $_POST ) ) ? get_bitacoras_custom() : get_bitacoras();
	while( $fila = mysql_fetch_assoc($bitacoras) ){

		echo '<tr>';
			echo '<td>' . $fila["idBitacora"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
		echo '</tr>';

	}
}

function get_bitacoras_custom(){
	$query = "SELECT b.*,
					u.nombre AS u_nombre,
					o.nombre AS o_nombre,
					o.primerApellido AS o_apellido,
					u.primerApellido AS u_apellido,
					u.identificacion AS u_id
							FROM tbbitacoras AS b
							LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
							LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";
	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ){

		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND u.identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND u.nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
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


function display_procedimientos_popup( $id ){

	$procedimientos = get_procedimientos_popup( $id );
	if(mysql_num_rows($procedimientos) > 0){
		$i = 0;
		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';
				echo '<td>' . '<input type="checkbox" name="procedure" />' . '<input type="hidden" name="procedimientos['. $i .']" value="'. $fila["idProcedimiento"] .'" />' . '<input type="hidden" name="idOdontograma['. $i .']" value="'. $fila["idOdontograma"] .'" />' . '</td>';
				echo '<td>' . $fila["nombre"] .'</td>';
			echo '</tr>';
			$i++;
		}

	}else{
		echo "El usuario no tiene procedimientos pendientes";
	}
}

function get_procedimientos_popup( $id ){

	$query = "SELECT * FROM tbodontogramas AS o,
 	tbprocedimientosporodontograma AS po,
 	tbprocedimientos AS p
		WHERE o.idPaciente = '$id'
 			AND po.idOdontograma = o.idOdontograma
 			AND p.idProcedimiento = po.idProcedimiento
 			AND po.realizado = '0'";

	$result = do_query( $query );

	return $result;
}

function display_bitacoras_rows_paciente(){

	$bitacoras = get_bitacoras_paciente();

	while ($fila = mysql_fetch_assoc($bitacoras)) {
					echo '<tr>';
						echo '<td>' . $fila["idBitacora"] . '</td>';
						echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
						echo '<td>' . $fila["u_id"] . '</td>';
						echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
						echo '<td>' . do_date_format($fila["fecha"]) . '</td>';
					echo '</tr>';
	}
}

function get_bitacoras_paciente(){

	$query = "SELECT b.*,
			u.nombre AS u_nombre,
			o.nombre AS o_nombre,
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbbitacoras AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)
					WHERE idPaciente = $_SESSION[idUsuario];";


	$result=do_query($query);
	return $result;
}

function display_procedimientos_editar( $id ){

	$procedimientos = get_procedimientos_editar( $id );

		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';
				echo '<td>' . $fila["nombre"] .'</td>';
			echo '</tr>';
		}
}

function get_procedimientos_editar( $id ){

	$query = "SELECT nombre
		FROM tbprocedimientosporbitacora AS pb,
		tbprocedimientos AS p
			WHERE pb.idBitacora = '$id'
			AND p.idProcedimiento = pb.idProcedimiento";

	$result = do_query( $query );
	return $result;
}
/* ================================================================================= */
function display_usuarios_rows(){
	$usuarios = get_usuarios();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .( ( isset( $fila["telefonoCelular"] ) && $fila["telefonoCelular"] != 0 ) ? ' / ' . $fila["telefonoCelular"] : '' ). '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			$id = $fila['idUsuario'];
			echo '<td><a href="editar-usuario.php?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-edit"></i></a><a href="#!?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_usuarios(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)";
	$result = do_query( $query );
	return $result;
}

function display_usuarios_secretaria_rows(){
	$usuarios = get_usuarios_secretaria();
	while ($fila = mysql_fetch_assoc($usuarios)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"]." ".$fila["primerApellido"]." ".$fila["segundoApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td>' . $fila["nombreRol"] . '</td>';
			echo '<td>' . $fila["telefonoCasa"] .( ( isset( $fila["telefonoCelular"] ) && $fila["telefonoCelular"] != 0 ) ? ' / ' . $fila["telefonoCelular"] : '' ). '</td>';
			echo '<td>' . $fila["correoElectronico"] . '</td>';
			echo '<td>' . $fila["domicilio"] . '</td>';
			if( check_permission( 'editarUsuarioPaciente' ) )
				echo '<td><a href="editar-usuario-paciente.php?idUsuario=' . $fila['idUsuario'] . '"><i class="icon-edit"></i></a></td>';
		echo '</tr>';
	}
}

function get_usuarios_secretaria(){
	$query = "SELECT  u.idUsuario, u.nombre , u.primerApellido, u.segundoApellido, u.identificacion, r.nombreRol, u.telefonoCasa,
						u.telefonoCelular, u.correoElectronico, u.domicilio
				FROM tbusuarios AS u
				LEFT JOIN tbroles AS r ON (r.idRol = u.idRol)
				WHERE r.idRol = 2";
	$result = do_query( $query );
	return $result;
}

function display_select_roles($nombre, $idRol = -1){
	$roles = get_roles_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
    	echo "<option value='$fila[0]'" . ( ( $fila[0] == $idRol ) ? ' selected="selected"' : '' ) . ">$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles";
	$result = do_query( $query );
	return $result;
};

function display_select_paciente($nombre){
	$roles = get_roles_paciente_select();
	echo "<select name='$nombre'>";
	while ($fila = mysql_fetch_row($roles)){
       	echo "<option value='$fila[0]'>$fila[1]</option>";
  	}
	echo "</select>";
};

function get_roles_paciente_select(){
	$query ="SELECT idRol, nombreRol FROM tbroles WHERE idRol = 2";
	$result = do_query($query);
	return $result;
};

function display_edit_usuarios_rows(){
	$usuarios = get_usuarios_update();

	$fila = mysql_fetch_assoc($usuarios);
	$idUsuario = $fila['idUsuario'];
	$name = $fila['nombre'];
	$lastname = $fila['primerApellido'];
	$lastname2 = $fila['segundoApellido'];
	$userId = $fila['identificacion'];
	$housePhn = $fila['telefonoCasa'];
	$CellPhn = ( $fila['telefonoCelular'] && $fila['telefonoCelular'] !=0 ) ? $fila['telefonoCelular'] : '';
	$email = $fila['correoElectronico'];
	$birth = $fila['fechaNacimiento'];
	$datepickerBirth = do_date_format($birth);
	$impmt = $fila['discapacidad'];
	$role = $fila['idRol'];
	$userPsw = $fila['contrasenna'];
	$alergie = $fila['alergias'];
	$UserAdrs = $fila['domicilio'];

		echo "<section class='form-section fl'>";
		echo "<input type='hidden' name='idUsuario' value='$idUsuario' />";
		echo "<label for='user-name'> Nombre</label>";
		echo "<input id='user-name' name='txt_name' type='text'  required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$name' />" ;
		echo "<label for='user-lastname'>Primer apellido</label>";
		echo "<input id='user-lastname' name='txt_lastname' required='required' type='text' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname'/>";
		echo "<label for='user-lastname2'> Segundo apellido</label>";
		echo "<input id='user-lastname2' name='txt_lastname2' type='text'  pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname2'/>";
		echo "<label for='user-id'> Identificación</label>";
		echo "<input id='user-id' name='txt_user'  type='text' value='$userId'/>";
		echo "<label for='user-phone'> Teléfono principal</label>";
		echo "<input id='user-phone' name='txt_phone' type='text' pattern='\d{8,10}' placeholder ='22222222' required='required' value='$housePhn'/>";
		echo "<label for='user-cellphone'> Teléfono secundario</label>";
		echo "<input id='user-cellphone' name='txt_cellphone' type='text' placeholder ='22222222' value='$CellPhn'/>";
		echo "<label for='user-email'> Correo electrónico</label>";
		echo "<input id='user-email' name='txt_email' type='email'  required='required' value='$email'/>";
		echo "<label for='user-birthday'> Fecha de nacimiento</label>";
		echo "<input id='user-birthday' name='txt_birthday' type='text'  required='required' pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d'
				placeholder ='dd/mm/yyyy' class='datepicker' value='$datepickerBirth' />";
		echo "</section>";
		echo "<section class='form-section fr'>";
		echo "<label for='user-impairment'>Discapacidad</label>";
		echo "<input type='checkbox' id='user-impairment'  name='txt_impairment' value='$impmt'/>";
		echo "<label for='user-role'>Rol</label>";
		display_select_roles('slt-user-role', $fila['idRol']);
		echo "<label for='user-psw'>Contraseña</label>";
		echo "<input id='user-psw' name='txt-user-psw' type='password' />";
		echo "<label for='user-cpsw'>Confirmar contraseña</label>";
		echo "<input id='user-cpsw' name='psw-user-pnew' type='password' />";
		echo "<label for='user-alergie'> Alergias</label>";
		echo "<textarea cols='10' rows='10' id='user-alergie' name='txt-user-alergie'>$alergie</textarea>";
		echo "<label for='user-adress'> Domicilio</label>";
		echo "<textarea cols='10' rows='10' id='user-adress' name='txt-user-adress' required='required'>$UserAdrs</textarea>";
		echo "</section>";
};

function display_edit_usuarios_paciente_rows(){
	$usuarios = get_usuarios_update();

	$fila = mysql_fetch_assoc($usuarios);
	$idUsuario = $fila['idUsuario'];
	$name = $fila['nombre'];
	$lastname = $fila['primerApellido'];
	$lastname2 = $fila['segundoApellido'];
	$userId = $fila['identificacion'];
	$housePhn = $fila['telefonoCasa'];
	$CellPhn = ( $fila['telefonoCelular'] && $fila['telefonoCelular'] !=0 ) ? $fila['telefonoCelular'] : '';
	$email = $fila['correoElectronico'];
	$birth = $fila['fechaNacimiento'];
	$datepickerBirth = do_date_format($birth);
	$impmt = $fila['discapacidad'];
	$role = $fila['idRol'];
	$userPsw = $fila['contrasenna'];
	$alergie = $fila['alergias'];
	$UserAdrs = $fila['domicilio'];

		echo "<section class='form-section fl'>";
		echo "<input type='hidden' name='idUsuario' value='$idUsuario' />";
		echo "<label for='user-name'> Nombre</label>";
		echo "<input id='user-name' name='txt_name' type='text'  required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$name' />" ;
		echo "<label for='user-lastname'>Primer apellido</label>";
		echo "<input id='user-lastname' name='txt_lastname' required='required' type='text' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname'/>";
		echo "<label for='user-lastname2'> Segundo apellido</label>";
		echo "<input id='user-lastname2' name='txt_lastname2' type='text'  pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' value='$lastname2'/>";
		echo "<label for='user-id'> Identificación</label>";
		echo "<input id='user-id' name='txt_user'  type='text' value='$userId'/>";
		echo "<label for='user-phone'>Teléfono principal</label>";
		echo "<input id='user-phone' name='txt_phone' type='text' pattern='\d{8,10}' placeholder ='22222222' required='required' value='$housePhn'/>";
		echo "<label for='user-cellphone'>Teléfono secundario</label>";
		echo "<input id='user-cellphone' name='txt_cellphone' type='text' placeholder ='22222222' value='$CellPhn'/>";
		echo "<label for='user-email'> Correo electrónico</label>";
		echo "<input id='user-email' name='txt_email' type='email'  required='required' value='$email'/>";
		echo "<label for='user-birthday'> Fecha de nacimiento</label>";
		echo "<input id='user-birthday' name='txt_birthday' type='text'  required='required' placeholder ='dd/mm/yyyy' pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d'
				class='datepicker' value='$datepickerBirth' />";
		echo "</section>";
		echo "<section class='form-section fr'>";
		echo "<label for='user-impairment'>Discapacidad</label>";
		echo "<input type='checkbox' id='user-impairment'  name='txt_impairment' value='$impmt'/>";
		echo "<label for='user-role'>Rol</label>";
		display_select_paciente('slt-user-role');
		echo "<label for='user-psw'>Contraseña</label>";
		echo "<input id='user-psw' name='txt-user-psw' type='password' />";
		echo "<label for='user-cpsw'>Confirmar contraseña</label>";
		echo "<input id='user-cpsw' name='psw-user-pnew' type='password' />";
		echo "<label for='user-alergie'> Alergias</label>";
		echo "<textarea cols='10' rows='10' id='user-alergie' name='txt-user-alergie' pattern='[A-Za-z]+ '>$alergie</textarea>";
		echo "<label for='user-adress'> Domicilio</label>";
		echo "<textarea cols='10' rows='10' id='user-adress' name='txt-user-adress' required='required'>$UserAdrs</textarea>";
		echo "</section>";
};

function get_usuarios_update(){
	$id = ( isset( $_GET['idUsuario'] ) ) ? $_GET['idUsuario'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";
	$result= do_query($query);
	return $result;
}
/* ================================================================================= */
function display_odontogramas_rows(){

	$odontogramas = get_odontogramas();

	while ($fila = mysql_fetch_assoc($odontogramas)) {
		$total = mysql_fetch_array( get_amount_odontograma( $fila['idOdontograma'] ) );
		$total = array_shift( $total );
		$numProcess = mysql_num_rows( get_procedimientos_odontograma( $fila['idOdontograma'] ) );
		echo '<tr>';
			echo '<td>' . $fila["idOdontograma"] . '</td>';
			echo '<td>' . $fila["u_nombre"] . " ".$fila["u_apellido"] . '</td>';
			echo '<td>' . $fila["u_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " ". $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["fecha"] . '</td>';
			echo '<td>' . $numProcess . '</td>';
			echo '<td>' . $total . '</td>';
			echo '<td><a href="editar-odontograma.php?idPaciente='  . $fila['idPaciente'] . '&idOdontograma=' . $fila['idOdontograma'] . '"><i class="icon-edit"></i></a><a href="#!?idOdontograma=' . $fila['idOdontograma'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_odontogramas(){
	$query = "SELECT b.*,
			u.nombre AS u_nombre,
			o.nombre AS o_nombre,
			o.primerApellido AS o_apellido,
			u.primerApellido AS u_apellido,
			u.identificacion AS u_id
					FROM tbodontogramas AS b
					LEFT JOIN tbusuarios AS u ON (u.idUsuario = b.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = b.idOdontologo)";

	$result=do_query($query);
	return $result;
}

function display_editar_odontograma_rows(){
	$editarOdontograma = get_editar_odontograma();

	$fila = mysql_fetch_array($editarOdontograma);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text'  readonly='readonly' value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text'  readonly='readonly' value='$identificacion' />";
}

function get_editar_odontograma(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_crear_odontograma(){
	$tabla = get_crear_odontograma();

	$fila = mysql_fetch_assoc($tabla);
	$nombre = $fila['nombre'];
	$apellido = $fila['primerApellido'];
	$na = $nombre . ' ' . $apellido;
	$identificacion = $fila['identificacion'];
	$id_patient = $fila['idUsuario'];

	echo "<input type='hidden' name='id_patient' value='$id_patient' />";
	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_crear_odontograma(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_add_procedimientos_popup() {

	$procedimientos = get_add_procedimientos_popup();
	if(mysql_num_rows($procedimientos) > 0){
		$i = 0;
		while ($fila = mysql_fetch_assoc($procedimientos)) {
			echo '<tr>';
				echo '<td>' . '<input type="checkbox" name="procedure" />' . '<input type="hidden" name="procedimientos['. $i .']" value="'. $fila["idProcedimiento"] .'" /></td>';
				echo '<td>' . $fila["nombre"] .'</td>';
				echo '<td>' . $fila["Costo"] .'</td>';
				echo '<td class="has-zone"><input type="text​" name="zona['. $i .']" placeholder="Zona" required="​required" /></td>';
			echo '</tr>';
			$i++;
		}

	}
}

function get_add_procedimientos_popup() {

	$query = "SELECT * FROM tbprocedimientos";

	$result = do_query( $query );

	return $result;
}

function display_reporte_citas_rows(){

	$citas = get_citas_custom();
	while ($fila = mysql_fetch_assoc($citas)) {
		echo '<tr>';
			echo '<td>' . $fila["p_nombre"] . " " . $fila["p_apellido"] . '</td>';
			echo '<td>' . $fila["p_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " " . $fila["o_apellido"] . '</td>';
			echo '<td>' . do_date_format( $fila["fecha"] ) . '</td>';
			echo '<td>' . do_time_format( $fila["hora"] ) . '</td>';
			echo '<td>' . $fila["notas"] . '</td>';
		echo '</tr>';
	}
}

function get_citas_custom(){
	$query = "SELECT c.*, p.nombre AS p_nombre,
				o.nombre AS o_nombre,
				p.primerApellido AS p_apellido,
				o.primerApellido AS o_apellido,
				p.identificacion AS p_id
					FROM tbcitas AS c
					LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)
					LEFT JOIN tbusuarios AS o ON (o.idUsuario = c.idOdontologo)";

	if( ! empty( $_POST ) ){
		if( ! empty( $_POST['txt-patient-id'] ) ||
			! empty( $_POST['txt-patient-name'] ) ){

		}
		$query .= " WHERE 1";
		if( ! empty( $_POST['txt-patient-id'] ) )
			$query .= " AND p.identificacion LIKE ('%" . $_POST['txt-patient-id'] . "%')";
		if( ! empty( $_POST['txt-patient-name'] ) )
			$query .= " AND p.nombre LIKE ('%" . $_POST['txt-patient-name'] . "%')";
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

function display_reporte_procedimientos_rows(){

	$procedimientos = get_procedimientos();
	while ($fila = mysql_fetch_assoc($procedimientos)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"] . '</td>';
			echo '<td>' . $fila["descripcion"] . '</td>';
			echo '<td>' . $fila["Costo"]  . '</td>';
		echo '</tr>';
	}
}
/* ================================================================================= */
function display_procedimientos_rows(){
	$procedimientos = get_procedimientos();
	while ($fila = mysql_fetch_assoc($procedimientos)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"] . '</td>';
			echo '<td>' . $fila["Costo"]  . '</td>';
			echo '<td>' . $fila["descripcion"] . '</td>';
			echo '<td><a href="editar-procedimiento.php?idProcedimiento=' . $fila['idProcedimiento'] . '"><i class="icon-edit"></i></a><a href="#!?idProcedimiento=' . $fila['idProcedimiento'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_procedimientos(){
	$query = "SELECT * FROM tbprocedimientos";
	$result = do_query( $query );
	return $result;
}


function display_citas_rows(){
	$citas = get_citas();
	while ($fila = mysql_fetch_assoc($citas)) {
		echo '<tr>';
			echo '<td>' . $fila["p_nombre"] . " " . $fila["p_apellido"] . '</td>';
			echo '<td>' . $fila["p_id"] . '</td>';
			echo '<td>' . $fila["o_nombre"] . " " . $fila["o_apellido"] . '</td>';
			echo '<td>' . $fila["tipoCita"] . '</td>';
			echo '<td>' . do_date_format( $fila["fecha"] ) . '</td>';
			echo '<td>' . do_time_format( $fila["hora"] ) . '</td>';
			echo '<td>' . $fila["notas"] . '</td>';
			echo '<td><a href="editar-cita.php?idPaciente=' . $fila['idPaciente'] . '&idCita=' . $fila['idCita'] . '"><i class="icon-edit"></i></a><a href="#!?idCita=' . $fila['idCita'] . '"><i class="icon-remove item-remove"></i></a></td>';
		echo '</tr>';
	}
}

function get_citas(){
	$query = "SELECT c.*, p.nombre AS p_nombre,
				o.nombre AS o_nombre,
				p.primerApellido AS p_apellido,
				o.primerApellido AS o_apellido,
				p.identificacion AS p_id
			FROM tbcitas AS c
			LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)
			LEFT JOIN tbusuarios AS o ON (o.idUsuario = c.idOdontologo)";
	$result = do_query( $query );
	return $result;
}

function display_slt_patient_rows(){
	$redirect = ( isset( $_GET['url'] ) ) ? $_GET['url'] : '';
	$slt_patient = get_slt_patient();
	while ($fila = mysql_fetch_assoc($slt_patient)) {
		echo '<tr>';
			echo '<td>' . $fila["nombre"] . " " . $fila["primerApellido"] . '</td>';
			echo '<td>' . $fila["identificacion"] . '</td>';
			echo '<td><a href="' . $redirect . '?id='. $fila["idUsuario"] .'"><i class="icon-correct"></i></a></td>';
		echo '</tr>';
	}
}

function get_slt_patient(){
	$query = "SELECT * FROM tbusuarios WHERE idRol = 2";
	$result = do_query( $query );
	return $result;
}

function display_crear_cita_rows(){
	$crearCita = get_crear_cita();

	$fila = mysql_fetch_array($crearCita);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];
	$id_patient = $fila['idUsuario'];

	echo "<input type='hidden' name='id_patient' value='$id_patient' />";
	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_crear_cita(){
	$id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_editar_cita_rows(){
	$editarCita = get_editar_cita();

	$fila = mysql_fetch_array($editarCita);
	$na = $fila['nombre'] . " " . $fila['primerApellido'];
	$identificacion = $fila['identificacion'];

	echo "<label>Nombre del paciente</label>";
	echo "<input type='text' name='txt-user-name' readonly value='$na' />";
	echo "<label>Identificación</label>";
	echo "<input type='text' name='txt-user-id' readonly value='$identificacion' />";
}

function get_editar_cita(){
	$id = ( isset( $_GET['idPaciente'] ) ) ? $_GET['idPaciente'] : '';
	$query = "SELECT * FROM tbusuarios WHERE idUsuario = $id";

	$result = do_query( $query );
	return $result;
}

function display_editar_cita_2_rows(){
	$editarCita_2 = get_editar_cita_2();

	$fila = mysql_fetch_array($editarCita_2);
	$date = do_date_format ( $fila['fecha'] );
	$hour = split_time( $fila['hora'] );
	$tipoCita = $fila['tipoCita'];
	$odontologo = $fila['idOdontologo'];
	$notes = $fila['notas'];
	$id_cita = $fila['idCita'];

	echo "<input type='hidden' name='id_cita' value='$id_cita' />";
	echo "<label for='txt-date'>Fecha</label>";
	echo "<input id='txt-date' class='datepicker' name='txt_date' type='text' required='required' placeholder='dd-mm-yyyy' value='$date' />";
	echo "<label for='hour'>Hora</label>";
		echo "<select id='hour' name='slt-hour' required='required'>";
			echo "<option value=''>--Seleccione la hora--</option>";
			for($i=00; $i<24; $i++ ){
				$selected = "";
				if($i == $hour[0])
					$selected = ' selected="selected"';
				echo "<option value='$i'".$selected.">$i</option>";
			}
		echo "</select>";
		echo "<select id='minute' name='slt-minute' required='required'>";
			echo "<option value=''>--Seleccione los minutos--</option>";
			for($i=00; $i<60; $i=$i+5 ){
				$selected = "";
				if($i == $hour[1])
					$selected = ' selected="selected"';
				echo "<option value='$i'".$selected.">$i</option>";
			}
		echo "</select>";
			echo "<label for='type'>Tipo de cita</label>";
			echo "<select id='type' name='slt-cita' required='required'>";
				echo "<option value=''>--Seleccione el tipo de cita--</option>";
				$selected = "";
				if($tipoCita === "Normal"){
					$selected = ' selected="selected"';
					echo "<option value='Normal'".$selected.">Normal</option>";
					echo "<option value='Emergencia'>Emergencia</option>";
				}else if($tipoCita === "Emergencia"){
					$selected = ' selected="selected"';
					echo "<option value='Emergencia'>Emergencia</option>";
					echo "<option value='Emergencia'".$selected.">Emergencia</option>";

				}
				echo "</select>";
			echo "<label for='dentist-name'>Seleccione el odontologo</label>";

			menu_desplegable_usuarios(3,1,'slt-odontologo');

			echo "<label for='notes'>Notas</label>";
			echo "<textarea id='notes' name='txt-notes'>$notes</textarea>";
}

function get_editar_cita_2(){
	$idCita = ( isset( $_GET['idCita'] ) ) ? $_GET['idCita'] : '';
	$query = "SELECT * FROM tbcitas WHERE idCita = $idCita";

	$result = do_query( $query );
	return $result;
}

function display_edit_procedure_rows(){
	$procedure = get_procedure();

	$fila = mysql_fetch_array($procedure);
	$nombre = $fila['nombre'];
	$costo = $fila['Costo'];
	$descripcion = $fila['descripcion'];
	$idProcedimiento = $fila['idProcedimiento'];

	echo "<input type='hidden' name='idProcedimiento' value='$idProcedimiento' />";
	echo "<label for='name'>Nombre del procedimiento</label>";
	echo "<input id='name' name='txt_name' type='text' required='required' pattern='[a-z A-Z 0-9]+' value='$nombre' />";
	echo "<label for='cost'>Costo del procedimiento</label>";
	echo "<input id='cost' name='txt_cost' type='text' required='required' pattern='[0-9]+' value='$costo' />";
	echo "<label for='notes'>Descripción</label>";
	echo "<textarea id='notes' name='txt_description'>$descripcion</textarea>";
}

function get_procedure(){
	$id = ( isset( $_GET['idProcedimiento'] ) ) ? $_GET['idProcedimiento'] : '';
	$query = "SELECT * FROM tbprocedimientos WHERE idProcedimiento = $id";

	$result = do_query( $query );
	return $result;
}

function menu_desplegable_usuarios($id,$valor,$nombre){
	$query ="SELECT idUsuario, nombre, primerApellido, identificacion FROM tbusuarios WHERE idRol = $id";
	$result = do_query( $query );
	echo "<select name='$nombre'>";
	while ($fila=mysql_fetch_row($result)){
	if ($fila[0]==$valor){
		echo "<option selected value='$fila[0]'>$fila[1] $fila[2] - $fila[3]</option>";
	}
	else{
		echo "<option value='$fila[0]'>$fila[1] $fila[2] - $fila[3]</option>";
	}
  }
   echo "</select>";
}

?>