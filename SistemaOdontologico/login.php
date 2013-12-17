<?php
	define('PAGE','login');
	define('TITLE','Iniciar sesión');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
	$datos = datos_configuracion();

?>
	<?php if( ! empty( $datos['logo'] ) ) : ?>
		<img id="logo" src="<?php echo $datos['logo']; ?>" alt="Logo" />
	<?php endif; ?>
	<?php if( ! empty( $datos['direccion'] )
				|| ! empty( $datos['telefonos'] )
				|| ! empty( $datos['correoElectronico'] )
				|| ! empty( $datos['horario'] ) ) : ?>
	<div id="contact-box">
		<?php if( ! empty( $datos['direccion'] ) ) : ?>
			<p><i class="icon-inicio"></i><?php echo $datos['direccion']; ?></p>
		<?php endif; ?>
		<?php if( ! empty( $datos['telefonos'] ) ) : ?>
			<p><i class="icon-phone"></i><?php echo $datos['telefonos']; ?></p>
		<?php endif; ?>
		<?php if( ! empty( $datos['correoElectronico'] ) ) : ?>
			<p><i class="icon-mail"></i><?php echo $datos['correoElectronico']; ?></p>
		<?php endif; ?>
		<?php if( ! empty( $datos['horario'] ) ) : ?>
			<p><i class="icon-citas"></i><?php echo $datos['horario']; ?></p>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<div id="login-wrap">
		<h1>Iniciar sesión</h1>
		<form id="login-form" action="includes/check-login.php" method="post" class="clearfix">
			<input id="user-name" name="txt-user" type="text" placeholder="Número de identificación o Alias" required="required" />
			<input id="user-psw" name="psw-login" type="password" placeholder="Contraseña" required="required" />
			<input type="submit" value="Iniciar" />
		</form>
	</div>
<?php
	require_once 'includes/footer.php';
?>