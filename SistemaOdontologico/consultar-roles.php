<?php
	define('PAGE','consultar-roles');
	define('TITLE','Consultar Roles');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
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