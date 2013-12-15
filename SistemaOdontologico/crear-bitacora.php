<?php
	define('PAGE','crear-bitacora'); //nombre de la pagina
	define('TITLE','Crear Bitacora'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array('datepicker') //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
	

?>
					<h1 class='ac'>Crear Bitácora</h1>
					<form class='form-add box-wrap clearfix' method='post' action='includes/insert-bitacora.php'>
						<section class='form-section fl'>

					<label for='txt-dentist-id'>Identificación del odontólogo</label>
					<input id='txt-dentist-id' name='txt-dentist-id' type='text'  pattern='|^[a-zA-Z0-9]*$|' required='required' />

					<label for='txt-dentist-name'>Nombre del odontólogo</label>
					<input id='txt-dentist-name' name='txt-dentist-name' type='text' required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' />

					<label for='txt-patient-id'>Identificación del paciente</label>
					<input id='txt-patient-id' name='txt-patient-id' type='text' pattern='|^[a-zA-Z0-9]*$|' required='required' />

					<label for='patient-name'>Nombre del paciente</label>
					<input id='patient-name' name='txt-patient-name' type='text' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' required='required' />

					<label for='txt-user-dob'>Fecha realizada</label>
					<input id='txt-user-dob' class='datepicker' name='txt-user-dob' type='text' required='required' placeholder='dd/mm/yyyy' pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d' />

					<label for='txt-asistentes'>Asistentes que participaron</label>
					<textarea id='txt-asistentes' name='txt-asistentes'></textarea>

				</section>
				<section class='form-section fr'>

					<input id='procedure-number' name='txt-procedure-number' type='hidden' value="1" />

					<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>

					<table id='table-procedures-added' class='cb'></table>
					<a href='#' id='delete-procedures' class='fr ar hide'>-Borrar procedimiento</a>

					<label for='txt-notes'>Notas</label>
					<textarea id='txt-notes' name='txt-notes'></textarea>
				</section>
					<div class='ac cb'>
						<input type="hidden" name="added" value="1" />
						<button class="form-cancel">Cancelar</button>
						<input type="reset" value="Limpiar" />
						<button type="submit">Guardar</button>
					</div>
			</form>
		<?php
	require_once 'includes/footer.php';
?>