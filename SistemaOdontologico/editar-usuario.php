<?php
	define('PAGE','editarUsuario'); //nombre de la pagina
	define('TITLE','Editar Usuario'); //titulo de la pagina
	$pageConfig = array(
		'plugins'=> array('datepicker') //para incluir archivos de plugins (datatable, calendar, datepicker, print, etc)
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
?>
	<h1 class="ac">Editar Usuario</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/update-usuarios.php" method="post">
		<section class="form-section">
			<?php
				display_edit_usuarios_rows();
			?>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<button type="submit" id="btnEnviar" >Guardar</button>
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