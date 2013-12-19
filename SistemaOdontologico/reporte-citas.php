<?php
	define('PAGE','reporteCitas');
	define('TITLE','Reporte Citas');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable', 'datepicker', 'print')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
		<h1 class="ac">Reportes de Citas</h1>
			<div>
				<button id="btn-adv-search">Búsqueda Avanzada</button>
				<a id="print" href="#"><i class="icon-print fr"></i></a>
			</div>
			<table class="data-table display">
				<thead>
					<tr>
	                    <th>Nombre del paciente</th>
	                    <th>Identificación</th>
	                    <th>Nombre del Odontólogo</th>
	                    <th>Fecha</th>
	                    <th>Hora</th>
	                    <th>Notas</th>
					</tr>
				</thead>
				<tbody>
					 <?php display_reporte_citas_rows(); ?>
				</tbody>
			</table>
	<div id="popup-adv-search" class="hide">
		<form class="clearfix" action="" method="post">
			<section class="form-section">
				<label for="patient-id">Identificación del paciente: </label>
				<input id="patient-id" name="txt-patient-id" type="text" />
				<label for="patient-name">Nombre del paciente: </label>
				<input id="patient-name" name="txt-patient-name" type="text" />
				<label for="start-date">Fecha de inicio: </label>
				<input id="start-date" name="txt-start-date" type="text" placeholder="dd-mm-yyyy" class="datepicker" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />
				<label for="end-date">Fecha de fin: </label>
				<input id="end-date" name="txt-end-date" type="text" placeholder="dd-mm-yyyy" class="datepicker" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />
				<div class="ac cb">
					<button class="item-accept">Aceptar</button>
					<button class="close">Cancelar</button>
				</div>
			</section>
		</form>
	</div>
<?php
	require_once 'includes/footer.php';
?>