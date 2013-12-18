<?php
	define('PAGE','crearOdontograma');
	define('TITLE','Crear Odontograma');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

	$idOdontograma = ( isset( $_GET['id-odontograma'] ) ) ? $_GET['id-odontograma'] : '';
?>
	<h1 class="ac">Crear Odontograma</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/insert-odontogramas.php" method="post">
		<section class="form-section fl">
						<label for="odontologo_id">Identificación del odontólogo</label>
						<input id="odontologo_id" name="txt_dentist_id" type="text" required="required"/>
						<label for="odontologo_name">Nombre del odontólogo</label>
						<input id="odontologo_name" name="txt_dentist_name" type="text" required="required" pattern="[A-Za-z]+" />
						<label for="odontologo_lastname">Primer apellido</label>
						<input id="odontologo_lastname" name="txt_dentist_lastname" type="text" required="required" />
						<label for="odontologo_lastname2">Segundo apellido</label>
						<input id="odontologo_lastname2" name="txt_odontologo_lastname2" type="text" />
						<label for="odontograma_date">Fecha de realización</label>
						<input id="odontograma_date" name="txt_date_realized" type="text" required="required" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" class="datepicker" />
						<label for="paciente_id">Identificación del paciente</label>
						<input id="paciente_id" name="txt_pacient_id" type="text" required="required"/>
						<label for="paciente_name">Nombre del paciente</label>
						<input id="paciente_name" name="txt_pacient_name" type="text" required="required" pattern="[A-Za-z]+" />
						<label for="paciente_lastname">Primer apellido</label>
						<input id="paciente_lastname" name="txt_pacient_lastname" type="text" required="required" />
						<label for="paciente_lastname2">Segundo apellido</label>
						<input id="paciente_lastname2" name="txt_paciente_lastname2" type="text" />
					</section>
					<section class="form-section fr">
						<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>

						<table id="table-procedures-added" class="cb odonto-table"></table>
						<a href="#" id="delete-procedures" class="fr ar hide">-Borrar procedimiento</a>
					</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<button type="submit">Guardar</button>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>