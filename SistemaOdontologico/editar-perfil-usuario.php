<?php
	define('PAGE','perfil');
	define('TITLE','Editar el perfil del usuario');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

	$idUsuario = $_SESSION['idUsuario'];

	$tabla = get_perfil_user($idUsuario);
?>
	<h1 class="ac">Editar Perfil</h1>
	<form class="form-edit box-wrap clearfix" action="includes/update-perfil-usuario.php" method="post">
		<section class="form-section fl">
			<label for="user-id">Identificación</label>
			<input id="user-id" name="txt-user-id" type="text" readonly="readonly" <?php echo 'value="'. $tabla["identificacion"] .'"' ?> />
			<label for="user-name">Nombre</label>
			<input id="user-name" name="txt-user-name" type="text" required="required" <?php echo 'value="'. $tabla["nombre"] .'"' ?>  pattern="[A-Za-z]+" />
			<label for="user-lastname">Apellido</label>
			<input id="user-lastname" name="txt-user-lastname" type="text" required="required" <?php echo 'value="'. $tabla["primerApellido"] .'"' ?> />
			<label for="user-lastname2">Segundo apellido</label>
			<input id="user-lastname2" name="txt-user-lastname2" type="text" value="Campos" <?php if($tabla["segundoApellido"]) echo 'value="'. $tabla["segundoApellido"] .'"' ?>  />
			<label for="user-phone">Teléfono de la casa</label>
			<input id="user-phone" name="txt-user-phone" type="text" <?php echo 'value="'. $tabla["telefonoCasa"] .'"' ?> pattern="[\d]{8,10}" placeholder="22222222" />
			<label for="user-cellphone">Teléfono celular</label>
			<input id="user-cellphone" name="txt-user-cellphone" type="text" <?php if($tabla["telefonoCelular"]) echo 'value="'. $tabla["telefonoCelular"] .'"' ?> pattern="[0-9]{8,10}" placeholder="88888888" />
			<label for="user-email">Correo electrónico</label>
			<input id="user-email" name="txt-user-email" type="text" <?php echo 'value="'. $tabla["correoElectronico"] .'"' ?> />
			<label for="user-dob">Fecha de nacimiento</label>
			<input id="user-dob" name="txt-user-dob" type="text" required="required" placeholder="dd/mm/yyyy" class="datepicker" <?php echo 'value="'. $tabla["fechaNacimiento"] .'"' ?> />
		</section>
		<section class="form-section fr">
			<label for="user-psw">Contraseña actual</label>
			<input id="user-psw" name="psw-user" type="password" />
			<label for="user-pnew">Contraseña nueva</label>
			<input id="user-pnew" name="psw-user-pnew" type="password" />
			<label for="user-pnew2">Repetir contraseña nueva</label>
			<input id="user-pnew2" name="psw-user-pnew2" type="password" />
			<label for="user-address">Domicilio</label>
			<textarea id="user-address" name="txt-user-address"><?php echo $tabla["domicilio"] ?></textarea>
		</section>
		<section class="cb ac">
			<input type="submit" id="btnEnviar" value="Guardar" />
		</section>
	</form>
<?php
	require_once 'includes/footer.php';
?>
<script type="text/javascript">
document.getElementById('btnEnviar').addEventListener('click', validar);

	function validar (e){
		var txtContrasennaActual = document.getElementById('user-psw').value,
		txtContrasennaNueva = document.getElementById('user-pnew').value,
		txtContrasennaNueva2 = document.getElementById('user-pnew2').value;

		if (txtContrasennaNueva.length > 0) {
			alert('Entró a contraseña nueva');
			if (txtContrasennaActual.length > 0) {
				alert('Entró a contraseña actual');
				if (! (txtContrasennaNueva === txtContrasennaNueva2)) {
					alert('Entró a contraseña nueva 2 y no son iguales');
					SO.utils.showPopUp('Las contraseñas no son iguales');
					e.preventDefault();
				}
			}else{
				alert('Entró a contraseña actual, y no estaba');
				SO.utils.showPopUp('Debe ingresar la contraseña actual');
				e.preventDefault();
			}
		}
	}
</script>