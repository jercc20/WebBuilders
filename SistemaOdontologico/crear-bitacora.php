<?php
	define('PAGE','registrarBitacora');
	define('TITLE','Crear Bitacora');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

		$idUsuario = ( isset( $_GET['id'] ) ) ? $_GET['id'] : '';
?>
		<h1 class='ac'>Crear Bitácora</h1>
			<form class='form-add box-wrap clearfix' method='post' action='includes/insert-bitacora.php'>
				<section class='form-section fl'>

					<label for="slt-odontologo">Seleccione el odontologo</label>
					<?php
						menu_desplegable_usuarios(3,1,'slt-odontologo');
					?>
					<?php
						display_crear_bitacora();
					?>

					<label for='txt-user-dob'>Fecha realizada</label>
					<input id='txt-user-dob' class='datepicker' name='txt-user-dob' type='text' required='required' placeholder='dd-mm-yyyy' pattern='(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d' />

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
					<div class="ac cb">
						<input type="hidden" name="idProcedimiento" />
						<button class="form-cancel">Cancelar</button>
						<input type="reset" value="Limpiar" />
						<button type="submit">Guardar</button>
					</div>
			</form>
					<div id="popup-procedure" class="hide">
						<h2 class="ac">Procedimientos</h2>
						<div class="div-table ">
							<table class="table-procedures">
								<?php display_procedimientos_popup($idUsuario); ?>
							</table>
						</div>
						<div>
							<button class="close btn-add btn-ac">Aceptar</button>
							<button class="close btn-ac">Cancelar</button>
						</div>
					</div>
<?php
	require_once 'includes/footer.php';
?>