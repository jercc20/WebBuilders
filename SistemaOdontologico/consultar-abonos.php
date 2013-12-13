<?php
	define('PAGE','consultar-abonos');
	define('TITLE','Consultar Abonos');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac"> Consultar Abonos </h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th data-field="txt-number">Número de Factura</th>
				<th data-field="txt-abono">Número de abono</th>
				<th data-field="txt-name-id">Nombre del Usuario</th>
				<th data-field="txt-user-id">Identificación</th>
				<th data-field="txt-user-dob">Fecha del Abono</th>
				<th data-field="txt-type">Monto del Abono</th>
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