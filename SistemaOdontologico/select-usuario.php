<?php
	define('PAGE','consultar-citas');
	define('TITLE','Consultar Citas');
	$pageConfig = array(
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
			<h1 class="ac">Seleccionar usuario</h1>
			<table class="data-table display">
				<thead>
					<tr>
						<th>Nombre del paciente</th>
						<th>Identificación</th>
						<th class="column-icons"></th>
					</tr>
				</thead>
				<tbody>
				<?php
					display_slt_patient_rows();
				?>
				</tbody>
			</table>
<?php
	require_once 'includes/footer.php';
?>