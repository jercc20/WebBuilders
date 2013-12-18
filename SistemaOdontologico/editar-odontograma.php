<?php
	define('PAGE','editar-odontograma');
	define('TITLE','Editar Odontograma');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
	require_once 'includes/laura.php';
?>
	<h1 class="ac">Editar Odontograma</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/update-odontograma.php" method="post">
		<section class="form-section fl">
				<label for="odontologo-id">Identificación del odontólogo</label>
				<input id="odontologo-id" name="txt-dentist-id" type="text"
				value="" />
				<label for="odontologo-name">Nombre del odontólogo</label>
				<input id="odontologo-name" name="txt-dentist-name" type="text" required="required" pattern="[A-Za-z]+" value="" />
				<label for="odontologo-lastname">Primer apellido</label>
				<input id="odontologo-lastname" name="txt-dentist-lastname" type="text" required="required" value="" />
				<label for="odontologo-lastname2">Segundo apellido</label>
				<input id="odontologo-lastname2" name="txt-odontologo-lastname2" type="text" />
				<label for="odontograma-date">Fecha de realización</label>
				<input id="odontograma-date" name="txt-date-realized" type="text" required="required" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" class="datepicker" />
				<label for="paciente-id">Identificación del paciente</label>
				<input id="paciente-id" name="txt-pacient-id" type="text" value="" />
				<label for="paciente-name">Nombre del paciente</label>
				<input id="paciente-name" name="txt-pacient-name" type="text" required="required" pattern="[A-Za-z]+" value="" />
				<label for="paciente-lastname">Primer apellido</label>
				<input id="paciente-lastname" name="txt-pacient-lastname" type="text" required="required" value="" />
				<label for="paciente-lastname2">Segundo apellido</label>
				<input id="paciente-lastname2" name="txt-paciente-lastname2" type="text" />
		</section>
			<section class="form-section fr">
				<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>

				<table class="cb odonto-table" id="table-procedures-added">
					<tr>
						<td><input type="checkbox" value="amalgamas" name="procedure"></td>
						<td class="al procedure">Amalgamas</td>
						<td class="al procedure"></td>
						<td><input type="text" required="required" placeholder="Zona"></td>
					</tr>
				</table>

				<a href="#" id="delete-procedures" class="fr ar">-Borrar procedimiento</a>
			</section>
		
			<div id="popup-procedure" class="hide">
				<p>Procedimientos</p>
			</div>	
						
		<section class="form-section">
			<?php 
				display_editar_odontograma_rows();
			 ?>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<input type="submit" value = "Guardar"/>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>