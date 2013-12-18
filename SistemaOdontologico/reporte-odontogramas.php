<?php
	define('PAGE','reporte-odontogramas'); //nombre de la pagina
	define('TITLE','Reporte de Odontogramas'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array('datatable') //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Reporte Odontogramas</h1>
	<button id="btn-adv-search">Búsqueda Avanzada</button>
	<a id="print" href="#"><i class="icon-print fr"></i></a>
	<table id="my-table" class="data-table display">
		<thead>
			<tr>
				<th>Número de odontograma</th>
				<th>Nombre del paciente</th>
				<th>Identificación</th>
				<th>Nombre del odontólogo</th>
				<th>Fecha realizada</th>
				<th>Número de procedimientos</th>
				<th>Costo total</th>
			</tr>		
		</thead>
		<tbody>
	       
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