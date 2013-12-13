<?php
	define('PAGE','consultar-facturas');
	define('TITLE','Consultar Facturas');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Facturas</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de Factura</th>
				<th>Nombre del Usuario</th>
				<th>Identificación</th>
				<th>Monto de la Factura</th>
				<th>Abonos Realizados</th>
				<th>Saldo de la Factura</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_facturas_rows(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>