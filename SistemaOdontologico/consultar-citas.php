<?php
	define('PAGE','consultar-citas');
	define('TITLE','Consultar Citas');
	$pageConfig = array(
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Citas</h1>
	<div id="add-bitacora" class="fr">
		<a href="crear-cita.php">+ Agregar cita</a>
	</div>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Nombre del paciente</th>
				<th>Identificación</th>
				<th>Nombre del odontólogo</th>
				<th>Cita</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Notas</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_citas_rows(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>