<?php
	define('PAGE','editar-bitacora.php'); //nombre de la pagina
	define('TITLE','Editar Bitacora'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array('datepicker') //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
<!-- html content -->
<	<h1 class="ac">Editar Bitácora</h1>
			<form class='form-edit box-wrap clearfix' action='consultar-bitacoras.html' method='get'>
				<section class="form-section fl">
					<label for='number-bitacora'>Número de bitácora</label>
					<input id='number-bitacora' name='number-bitacora' type='text' readonly='readoonly' requiered='required' />

					<label for='dentist-id'>Identificación del odontólogo</label>
					<input id='dentist-id' name="txt-dentist-id" type="text"  pattern='[a-zA-Z0-9]{8,9}' required='required' />

					<label for='dentist-name'>Nombre del odontólogo</label>
					<input id='dentist-name' name='txt-dentist-name' type='text'required='required' pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' />

					<label for='patient-id'>Identificación del paciente</label>
					<input id='patient-id' name='txt-patient-id' type='text'  pattern='[a-zA-Z0-9]{8,9}' required='required' />

					<label for='patient-name'>Nombre del paciente</label>
					<input id='patient-name' name='txt-patient-name' type='text'  pattern='|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|' required='required' />

					<label for='date'>Fecha realizada</label>
					<input id='date'class='datepicker' name='txt-date' type='text' required='required'  pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d' />

					<label for='asistentes'>Asistentes que participaron</label>
					<textarea id='asistentes' name='asistentes' ></textarea>

				</section>
				<section class='form-section fr'>

					<input id='txt-procedure-number' name='txt-procedure-number' type='hidden' value="1" />

					<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>

					<table class="cb" id="table-procedures-added">
						<tr>
							<td><input type="checkbox" value="amalgamas" name="procedure"></td>
							<td class="al procedure">Amalgamas</td>
							<td><input type="text" required="required" placeholder="Zona" value="Oclusal"></td>
						</tr>
					</table>

					<a href="#" id="delete-procedures" class="fr ar">-Borrar procedimiento</a>

					<label for='txt-notes'>Notas</label>
					<textarea id='txt-notes' name='txt-notes'></textarea>

				</section>
				<section class='cb ac'>
					<button class='form-cancel'>Cancelar</button>
					<button type='submit'>Guardar</button>
				</section>
			</form>
<?php
	require_once 'includes/footer.php';
?>