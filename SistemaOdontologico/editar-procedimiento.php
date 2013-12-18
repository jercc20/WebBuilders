<?php
	define('PAGE','editarProcedimiento');
	define('TITLE','Editar Procedimiento');
	$pageConfig = array(
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Editar procedimiento</h1>
	<form id="proced-box" class="form-edit" action="includes/update-procedimiento.php" method="post">
		<section class="form-section">
			<?php
				display_edit_procedure_rows();
			?>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<button type="submit">Guardar</button>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>