<?php
	define('PAGE','login');
	define('TITLE','Iniciar sesión');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

?>
	<img id="logo" src="imgs/logo.png" alt="Logo" />
	<div id="contact-box">
		<?php configuracion_basica();?>
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