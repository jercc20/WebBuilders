<?php
	define('PAGE','inicio');
	define('TITLE','Inicio');
	$pageConfig = array(
		'plugins'=> array('datatable')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

?>
	<?php
		if( check_permission('consultarRecordatorios') ) :
	?>
	<h1 class="ac">Citas Próximas</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de cita</th>
				<th>Nombre del Paciente</th>
				<th>Fecha</th>
				<th>Hora</th>
			</tr>
		</thead>
		<tbody>
			<?php display_home_citas(); ?>
		</tbody>
	</table>
	<h1 class="ac">Procedimientos Atrasados</h1>
	<table class="data-table display">
		<thead>
			<tr>
				<th>Número de odontograma</th>
				<th>Nombre del Paciente</th>
				<th>Fecha</th>
				<th>Procedimiento</th>
			</tr>
		</thead>
		<tbody>
			<?php display_home_procedimientos(); ?>
		</tbody>
	</table>
	<?php else :
		$banner = mysql_fetch_assoc( get_banner() );
	?>
		<h1 class="ac">Bienvenido, <?php echo $_SESSION['userinfo']['nombre']; ?></h1>
		<?php if( ! empty( $banner ) ) : ?>
			<div class="ac">
				<img id="banner" src="<?php echo $banner['banner']; ?>" alt="Baner" />
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php
	require_once 'includes/footer.php';
?>