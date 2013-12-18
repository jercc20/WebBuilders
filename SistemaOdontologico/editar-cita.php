<?php
	define('PAGE','editarCita');
	define('TITLE','Editar Cita');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Editar Cita</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/update-cita.php" method="post">
		<section class="form-section">
			<?php 
				display_editar_cita_rows();
				display_editar_cita_2_rows();
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