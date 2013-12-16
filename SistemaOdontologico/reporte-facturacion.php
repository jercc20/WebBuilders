<?php
	define('PAGE','reporte-facturas');
	define('TITLE','Reporte Facturas');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable', 'datepicker', 'print')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Reporte de Facturación</h1>
	<button id="btn-adv-search">Búsqueda Avanzada</button>
	<a id="print" href="#"><i class="icon-print fr"></i></a>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de Factura</th>
				<th>Nombre del Usuario</th>
				<th>Identificación</th>
				<th>Monto de la Factura</th>
				<th>Abonos Realizados</th>
				<th>Saldo de la Factura</th>
			</tr>
		</thead>
		<tbody>
			<?php display_reporte_facturas_rows(); ?>
		</tbody>
	</table>
	<div id="popup-adv-search" class="hide">
		<form class="clearfix" action="" method="post">
			<section class="form-section ac">
				<label for="patient-id">Identificación: </label>
				<input id="patient-id" name="txt-patient-id" type="text" />
				<label for="patient-name">Nombre del paciente: </label>
				<input id="patient-name" name="txt-patient-name" type="text" />
				<label for="patient-lastname">Apellido del paciente: </label>
				<input id="patient-lastname" name="txt-patient-lastname" type="text" />
				<label for="start-date">Fecha de inicio: </label>
				<input id="start-date" name="txt-start-date" type="text" placeholder="dd-mm-yyyy" class="datepicker" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />
				<label for="end-date">Fecha de fin: </label>
				<input id="end-date" name="txt-end-date" type="text" placeholder="dd-mm-yyyy" class="datepicker" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />
			</section>
			<section>
			<div class="ac cb">
				<button class="close">Cancelar</button>
				<button type="submit">Aceptar</button>
				</div>
			</section>
		</form>
	</div>
<?php
	require_once 'includes/footer.php';
?>