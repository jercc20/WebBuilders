<?php
	define('PAGE','inicio');
	define('TITLE','Inicio');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Citas Próximas</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de cita</th>
				<th>Nombre del Paciente</th>
				<th>Fecha</th>
				<th>Hora</th>
			</tr>
		</thead>
		<tbody>
			<?php display_home_citas(); ?>
		</tbody>
	</table>
	<h1 class="ac">Procedimientos Atrasados</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de odontograma</th>
				<th>Nombre del Paciente</th>
				<th>Fecha</th>
				<th>Procedimiento</th>
			</tr>
		</thead>
		<tbody>
			<?php display_home_procedimientos(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>