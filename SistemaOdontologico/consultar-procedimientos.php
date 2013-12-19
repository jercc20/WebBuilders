<?php
	define('PAGE','consultarProcedimientos');
	define('TITLE','Consultar Procedimientos');
	$pageConfig = array(
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Procedimientos</h1>
	<div id="add-bitacora" class="fr">
		<a href="crear-procedimiento.php">+ Agregar procedimiento</a>
	</div>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Nombre del procedimiento</th>
				<th>Costo del procedimiento</th>
				<th>Descripción</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_procedimientos_rows(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>