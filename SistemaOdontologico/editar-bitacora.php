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
	<h1 class="ac">Editar Bitácora</h1>

			<form class="form-edit box-wrap clearfix" action="includes/update-bitacora.php" method="post">
				<section class="form-section fl">

					<label for="id-bitacora">Número de bitácora</label>
					<input id="id-bitacora" name="id-bitacora" type="text" <?php "value='$id'" ?> readonly = "readonly" requiered="required" />
					
					<label for="slt-odontologo">Seleccionar Odontologo</label>
					<?php
						menu_desplegable_usuarios(3,1,'slt-odontologo');
					?>
					<?php
						display_editar_bitacora_rows();
					?>
					<label for="date">Fecha realizada</label>
					<input id="date" class="datepicker" name="txt-date" type="text" required="required"  pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />

					<label for="txt-asistentes">Asistentes que participaron</label>
					<textarea id="txt-asistentes" name="txt-asistentes" ></textarea>

				</section>
				<section class="form-section fr">

					<input id="txt-procedure-number" name="txt-procedure-number" type="hidden" value="1" />

					<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>

					<table class="cb" id="table-procedures-added">
						<tr>
							<td><input type="checkbox" value="amalgamas" name="procedure"></td>
							<td class="al procedure">Amalgamas</td>
							<td><input type="text" required="required" placeholder="Zona" value="Oclusal"></td>
						</tr>
					</table>

					<a href="#" id="delete-procedures" class="fr ar">-Borrar procedimiento</a>

					<label for="txt-notes">Notas</label>
					<textarea id="txt-notes" name="txt-notes"></textarea>

				</section>
				<section class="cb ac">
					<button class="form-cancel">Cancelar</button>
					<button type="submit">Guardar</button>
				</section>
			</form>
<?php
	require_once 'includes/footer.php';
?>