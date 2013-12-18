<?php
define('PAGE','consultarCalendario');
require_once 'functions.php';

$query = "SELECT c.*, p.nombre AS p_nombre,
				p.primerApellido AS p_apellido,
				p.identificacion AS p_id
			FROM tbcitas AS c
			LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)";

$result = do_query($query);
$citas = array();
$k = 0;

while( $row = mysql_fetch_assoc( $result ) ){
	$citas[$k]['title'] = $row['hora'] . ' ' . $row['p_nombre'];
	$citas[$k]['start'] = $row['fecha'];
	$citas[$k]['end'] = $row['fecha'];
	$k++;
}
echo json_encode($citas);

global $db_server;
mysql_close( $db_server );

?>