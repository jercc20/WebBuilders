<?php
	define('PAGE','editarOdontograma');
	define('TITLE','Editar Odontograma');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

	$idOdontograma = $_GET['idOdontograma'];

	$datos = get_datos_odontograma();

	$idPaciente = $_GET['idPaciente'];
?>
	<h1 class="ac">Editar Odontograma</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/update-odontograma.php" method="post">
		<input type="hidden" <?php echo 'value="'.$idOdontograma.'"';?> name="odontograma" />
		<section class="form-section fl">
			<input type="hidden" <?php echo 'value="'.$idPaciente.'"';?> name="id_patient" />
			<?php display_editar_odontograma_rows();?>
			<label for="odontologo">Seleccione el odontólogo</label>
			<?php menu_desplegable_usuarios(3,1,'slt-odontologo'); ?>
			<label for="odontograma_date">Fecha de realización</label>
			<input id="odontograma_date" name="txt_date_realized" placeholder="dd-mm-yyyy" <?php if(isset($datos['fecha'])) echo "value='". do_date_format($datos['fecha']) ."'"; ?> type="text" required="required" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" class="datepicker" />
		</section>
		<section class="form-section fr">
			<label>Procedimientos</label><a href="#" class="add-procedure fr ar">Ver procedimientos</a>
		</section>
		<div id="popup-procedure" class="hide">
			<h2 class="ac">Procedimientos</h2>
			<div class="div-table ">
				<table class="table-procedures">
					<?php display_editar_odontograma_procedimiento(); ?>
				</table>
			</div>
			<div>
				<button class="close btn-add btn-ac">Aceptar</button>
			</div>
		</div>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<input type="submit" value = "Guardar"/>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>