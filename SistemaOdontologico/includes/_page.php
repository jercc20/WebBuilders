<?php
	define('PAGE',''); //nombre de la pagina
	define('TITLE',''); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array() //para incluir archivos de plugins (data-table, calendar, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
<!-- html content -->
<?php
	require_once 'includes/footer.php';
?>