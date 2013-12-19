<?php
	define('PAGE','consultarBitacorasPropias'); 
	define('TITLE','Consultar Bitacoras'); 
	$pageConfig = array(
		'plugins'=> array('datatable') 
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Bitácoras</h1>
			<div id="add-bitacora" class="fr">
			</div>
			<table class="data-table display">
				<thead>
			        <tr>
			        	<th>Numero bitacora</th>
						<th>Nombre Usuario</th>
						<th>Identificación</th>
						<th>Nombre Odontólogo</th>
						<th>Fecha realizada</th>
						<th class="column-icons"></th>
			        </tr>
			    </thead>
				<tbody>
					<?php display_bitacoras_rows_paciente(); ?>
				</tbody>
			</table>
	<div id="popup-view" class="hide">
		<div>
			<table id="my-table" class="al">
				<?php
					display_procedimientos_editar($idBitacora);
				?>
			</table>
		</div>
	</div>
<?php
	require_once 'includes/footer.php';
?>