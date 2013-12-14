<?php
	define('PAGE','select-patient');
	define('TITLE','Seleccionar Paciente');
	$pageConfig = array(
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Seleccionar Paciente</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th data-field="txt-user-name">Nombre del paciente</th>
				<th data-field="txt-user-id">Identificación</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_slt_patient_rows() ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>