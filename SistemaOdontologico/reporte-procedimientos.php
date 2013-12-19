<?php
	define('PAGE','reporteProcedimientos');
	define('TITLE','Reporte Procedimientos');
	$pageConfig = array(
		'plugins'=> array('datatable', 'datepicker', 'print')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
		<h1 class="ac">Reportes de Procedimientos</h1>
		<a id="print" href="#"><i class="icon-print fr"></i></a>
			<table class="data-table display">
				<thead>
					<tr>
						<th>Nombre del Procedimiento</th>
						<th>Descripción del Procedimiento</th>
						<th>Costo</th>
					</tr>
				</thead>
				<tbody>
					 <?php display_reporte_procedimientos_rows(); ?>
				</tbody>
			</table>
<?php
	require_once 'includes/footer.php';
?>