<?php
	define('PAGE','reporteUsuarios');
	define('TITLE','Reporte de usuarios');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable', 'print')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Reporte Usuarios</h1>
	<button id="btn-adv-search">Búsqueda Avanzada</button>
	<a id="print" href="#"><i class="icon-print fr"></i></a>
	<table id="my-table" class="data-table display">
		<thead>
			<tr>
				<th>Nombre de usuario</th>
				<th>Identificación</th>
				<th>Rol</th>
				<th>Teléfono</th>
				<th>Correo</th>
				<th>Dirección</th>
			</tr>
		</thead>
		<tbody>
			<?php display_reporte_usuarios_rows(); ?>
		</tbody>
	</table>
	<div id="popup-adv-search" class="hide">
		<form class="clearfix" action="" method="post">
			<section class="form-section ac">
				<label for="user-id">Identificación: </label>
				<input id="user-id" name="user-id" type="text" />
				<label for="user-name"> Nombre: </label>
				<input id="user-name" name="txt-user-name" type="text" />
				<label for="user-lastname">Primer apellido: </label>
				<input id="user-lastname" name="txt-user-lastname" type="text"/>
				<label for="user-rol">Rol: </label>
				<select id="user-rol" name="user-rol">
					<?php display_array_rol(); ?>
				</select>
			</section>
			<section>
				<div class="ac cb">
					<button class="item-accept">Aceptar</button>
					<button class="close">Cancelar</button>
				</div>
			</section>
		</form>
	</div>
<?php
	require_once 'includes/footer.php';
?>