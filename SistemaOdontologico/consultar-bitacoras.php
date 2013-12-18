<?php
	define('PAGE','consultarBitacoras'); 
	define('TITLE','Consultar Bitacoras'); 
	$pageConfig = array(
		'plugins'=> array('datatable') 
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Bitácoras</h1>
			<div id="add-bitacora" class="fr">
				<a href="select-usuario.php?url=crear-bitacora.php">+ Agregar Bitacora</a>
			</div>
			<table class="data-table display">
				<thead>
			        <tr>
			        	<th>Numero bitacora</th>
						<th>Nombre Usuario</th>
						<th>Identificación</th>
						<th>Nombre Odontólogo</th>
						<th>Fecha realizada</th>
						<th>Numero Procedimientos</th>
						<th class="column-icons"></th>
			        </tr>
			    </thead>
				<tbody>
					<?php display_bitacoras_rows(); ?>
				</tbody>
			</table>
<?php
	require_once 'includes/footer.php';
?>