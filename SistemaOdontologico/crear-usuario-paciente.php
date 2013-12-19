<?php
	define('PAGE','crearUsuarioPaciente');
	define('TITLE','Crear Usuario');
	$pageConfig = array(
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Crear Usuario</h1>
		<form id="proced-box" class="form-edit box-wrap" action="includes/insert-usuarios-paciente.php" method="post">
			<section class="form-section fl">
				<label for="user-name"> Nombre</label>
				<input id="user-name" name="txt-user-name" type="text"  required="required" pattern="|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|" />
				<label for="user-lastname">Primer apellido</label>
				<input id="user-lastname" name="txt-user-lastname" required="required" type="text"  pattern="|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|"/>
				<label for="user-lastname2"> Segundo apellido</label>
				<input id="user-lastname2" name="txt-user-lastname2" type="text" pattern="|^[a-zA-Z ñÑáéíóúüÁÉÍÓÚç]*$|" />
				<label for="user-id"> Identificación o alias</label>
				<input id="user-id" title="Esta sera su infomacion para ingresar sesion" name="txt-id-user"  type="text"  required="required" pattern="[a-zA-Z0-9]+" />
				<label for="user-phone"> Teléfono principal</label>
				<input id="user-phone" name="txt-user-house-phone" type="text" pattern="\d{8,10}" required="required" />
				<label for="user-cellphone"> Teléfono secundario</label>
				<input id="user-cellphone" name="txt-user-cellphone" type="text"  pattern="\d{8,10}" />
				<label for="user-email"> Correo electrónico</label>
				<input id="user-email" name="txt-user-email" type="email"  required="required" />
				<label for="user-birthday"> Fecha de nacimiento</label>
				<input id="user-birthday" name="txt-user-birthday" type="text"  required="required" placeholder ="dd-mm-yyyy"
						pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" class="datepicker" />
			</section>
			<section class="form-section fr">
				<label for="user-impairment">Discapacidad</label>
				<input type="checkbox" id="user-impairment"  name="txt-user-impairment" value="1"/>
				<label for="user-role">Rol</label>
				<?php
					display_select_paciente('slt-user-role');
				?>
				<label for="user-psw">Contraseña</label>
				<input id="user-psw" name="txt-user-psw" type="password" required="required" />
				<label for="user-cpsw">Confirmar contraseña</label>
				<input id="user-cpsw" name="psw-user-pnew" type="password" required="required"/>
				<label for="user-alergie"> Alergias</label>
				<textarea cols='10' rows='10' id="user-alergie" name="txt-user-alergie"pattern="[A-Za-z]+"></textarea>
				<label for="user-adress"> Domicilio</label>
				<textarea cols='10' rows='10' id="user-adress" name="txt-user-adress" required="required"></textarea>
			</section>
			<div class="ac cb">
				<button class="form-cancel">Cancelar</button>
				<button type="reset">Limpiar</button>
				<button type="submit" id="btnEnviar">Guardar</button>
			</div>
		</form>
<?php
	require_once 'includes/footer.php';
?>
<script type="text/javascript">
document.getElementById('btnEnviar').addEventListener('click', validar);

	function validar (e){
		var txtContrasennaNueva = document.getElementById("user-psw").value,
			txtContrasennaNueva2 = document.getElementById("user-cpsw").value;

			if (! (txtContrasennaNueva === txtContrasennaNueva2)) {
				SO.utils.showPopUp('Las contraseñas no son iguales');
				e.preventDefault();
			}
	}
</script>