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
	<h1 class="ac">Crear Bitácora</h1>
			<form class="form-add box-wrap clearfix" action="includes/insert-bitacora.php" method="post">
				<section class="form-section fl">

					<input name="number-bitacora" type="hidden" />

					<label for="user-name">Seleccione el paciente</label>
					<?php
						menu_desplegable_usuarios(2,1,'slt-paciente');
					?>
					<label for="dentist-name">Seleccione el odontologo</label>
					<?php
						menu_desplegable_usuarios(3,1,'slt-odontologo');
					?>
					
					<label for="txt-date">Fecha realizada</label>
					<input id="txt-date" class="datepicker" name="txt-date" type="text" required="required" placeholder="dd/mm/yyyy" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />

					<label for="asistentes">Asistentes que participaron</label>
					<textarea id="asistentes" name="asistentes"></textarea>

				</section>
				<section class="form-section fr">
					

					<label for="procedimientos">Seleccionar Procedimiento</label>
					
					<?php
						//menu_desplegable($prueba3,1,'slt-procedimiento');
					?>

					<label for="notes">Notas</label>
					<textarea id="notes" name="txt-notes"></textarea>
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