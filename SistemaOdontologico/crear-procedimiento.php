<?php
	define('PAGE','registrarProcedimiento');
	define('TITLE','Crear Procedimineto');
	$pageConfig = array(
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Crear procedimiento</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/insert-procedimiento.php" method="post">
		<section class="form-section">
			<label for="name">Nombre del procedimiento</label>
			<input id="name" name="txt_name" type="text" required="required" pattern="[a-z A-Z 0-9]+" />
			<label for="cost">Costo del procedimiento</label>
			<input id="cost" name="txt_cost" type="text" required="required" pattern="[0-9]+" />
			<label for="notes">Descripción</label>
			<textarea id="notes" name="txt_description"></textarea>
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