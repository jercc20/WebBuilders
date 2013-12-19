<?php
	define('PAGE','consultarCalendario');
	define('TITLE','Consultar Calendario');
	$pageConfig = array(
		'plugins'=> array('calendar')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<div id='calendar'></div>
<?php
	require_once 'includes/footer.php';
?>