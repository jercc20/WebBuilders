<?php
	define('PAGE','registrarOdontograma');
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
			<label for="odontologo">Seleccione el odontólogo</label>
			<?php menu_desplegable_usuarios(3,1,'slt-odontologo'); ?>
			<label for="odontograma_date">Fecha de realización</label>
			<input id="odontograma_date" name="txt_date_realized" type="text" required="required" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" class="datepicker" />
			<?php display_crear_odontograma(); ?>
		</section>
		<section class="form-section fr">
			<label>Procedimientos</label><a href="#" class="add-procedure fr ar">+Agregar procedimiento</a>
			<table id='table-procedures-added' class='cb'></table>
			<a href='#' id='delete-procedures' class='fr ar hide'>-Borrar procedimiento</a>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<button type="submit">Guardar</button>
		</div>
	</form>
	<div id="popup-procedure" class="hide">
		<h2 class="ac">Procedimientos</h2>
		<div class="div-table ">
			<table class="table-procedures">
				<?php display_add_procedimientos_popup(); ?>
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