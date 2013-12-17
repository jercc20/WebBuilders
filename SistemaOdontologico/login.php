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
	<img id="logo" src="<?php echo ( isset( $datos['logo'] ) ) ? $datos['logo'] : ''; ?>" alt="Logo" />
	<div id="contact-box">
		<p><i class="icon-inicio"></i><?php echo ( isset( $datos['direccion'] ) ) ? $datos['direccion'] : ''; ?></p>
		<p><i class="icon-phone"></i><?php echo ( isset( $datos['telefonos'] ) ) ? $datos['telefonos'] : ''; ?></p>
		<p><i class="icon-mail"></i><?php echo ( isset( $datos['correoElectronico'] ) ) ? $datos['correoElectronico'] : ''; ?></p>
		<p><i class="icon-citas"></i><?php echo ( isset( $datos['horario'] ) ) ? $datos['horario'] : ''; ?></p>
	</div>
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