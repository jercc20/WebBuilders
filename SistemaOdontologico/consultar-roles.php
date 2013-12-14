<?php
	define('PAGE','consultar-roles'); //nombre de la pagina
	define('TITLE','Consultar Roles'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array('datatable') //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Roles</h1>
	<a href="crear-rol.php" class="fr">+ Agregar Rol</a>
	<table class="data-table display">
	    <thead>
	        <tr>
	            <th data-field="txt-role-name">Rol</th>
	            <th class="column-icons"></th>
	        </tr>
	    </thead>
	    <tbody>
		<?php  display_roles_rows(); ?>
	    </tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>