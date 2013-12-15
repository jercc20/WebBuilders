<?php
	define('PAGE','consultar-usuarios');
	define('TITLE','Consultar Usuarios');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Consultar Usuarios</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Nombre de Usuario</th>
				<th>Identificación</th>
				<th>Rol</th>
				<th>Teléfonos</th>
				<th>Correo</th>
				<th>Dirección</th>
				<th class="column-icons"></th>
			</tr>
		</thead>
		<tbody>
			<?php display_usuarios_pacientes_rows(); ?>
		</tbody>
	</table>
<?php
	require_once 'includes/footer.php';
?>