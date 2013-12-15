<?php
	define('PAGE','reporte-bitacoras');
	define('TITLE','Reporte bitacoras');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datatable', 'datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
			<h1 class="ac">Reportes de Bitácoras</h1>
			<div>
				<button class="btn-ba">Búsqueda Avanzada</button>
				<a href="#"><i id="item-print" class="icon-print fr"></i></a>
			</div>
			<table class="data-table display">
				<thead>
					<tr>
						<th>Número de bitácora</th>
						<th>Nombre Usuario</th>
						<th>Identificación</th>
						<th>Nombre Odontólogo</th>
						<th>Fecha realizada</th>
						<th>Número de procedimientos</th>
					</tr>
				</thead>
				<tbody>
					 <?php display_reporte_bitacoras_rows(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php
	require_once 'includes/footer.php';
?>