<?php
	define('PAGE','editar-procedimiento'); //nombre de la pagina
	define('TITLE','Editar procedimiento'); //titulo de la pagina
	$pageConfig = array(
		'actions' => array(), //array con las acciones adicionales de la pagina (editar, borrar, etc)php
		'plugins'=> array() //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Editar procedimiento</h1>
	<form id="proced-box" class="form-edit" method="post" action="editar-procedimiento.php">
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