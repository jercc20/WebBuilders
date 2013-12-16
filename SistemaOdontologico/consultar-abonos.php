<?php
	define('PAGE','consultarAbonos');
	define('TITLE','Consultar Abonos');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Abonos</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de Factura</th>
				<th>Número de abono</th>
				<th>Nombre del Usuario</th>
				<th>Identificación</th>
				<th>Fecha del Abono</th>
				<th>Monto del Abono</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_abonos_rows(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>