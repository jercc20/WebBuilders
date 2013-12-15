<?php
	define('PAGE','reporte-bitacoras');
	define('TITLE','Reporte bitacoras');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable', 'datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
			<h1 class="ac">Reportes de Bitácoras</h1>
			<div>
				<button class="btn-ba">Búsqueda Avanzada</button>
				<a href="#"><i id="item-print" class="icon-print fr"></i></a>
			</div>
			<table class="data-table display">
				<thead>
					<tr>
						<th>Número de bitácora</th>
						<th>Nombre Usuario</th>
						<th>Identificación</th>
						<th>Nombre Odontólogo</th>
						<th>Fecha realizada</th>
						<th>Número de procedimientos</th>
					</tr>
				</thead>
				<tbody>
					 <?php display_reporte_bitacoras_rows(); ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="popup-up" class="hide">
		<form class="clearfix" action="" method="post">
			<section class="form-section">
				<label for="dentist-name">Nombre del odontólogo: </label>
				<input id="dentist-name" name="txt-dentist-name" type="text" />
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
<?php
	require_once 'includes/footer.php';
?>