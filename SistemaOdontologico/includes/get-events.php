<?php
define('PAGE','consultarCalendario');
require_once 'functions.php';

 $json = array();

 $query = "SELECT c.*, p.nombre AS p_nombre,
				p.primerApellido AS p_apellido,
				p.identificacion AS p_id
			FROM tbcitas AS c
			LEFT JOIN tbusuarios AS p ON (p.idUsuario = c.idPaciente)";

 $result = do_query($query);

 $citas = array();
 
 foreach (mysql_fetch_assoc($result) AS $k => $item) {
 	$citas[$k]['title'] = $item['hora'] . ' ' . $item['p_nombre'];
 	$citas[$k]['start'] = '2013-12-03 00:00:00';
 	$citas[$k]['end'] = '2013-12-03 00:00:00';
 }
 echo json_encode($citas);

 global $db_server;
 mysql_close( $db_server );
 
?>