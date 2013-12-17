<?php
	define('PAGE','configuracion');
	define('TITLE','Configuracion del sistema');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array()
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';
	$tabla = datos_configuracion();
?>
	<h1 class="ac">Configuración</h1>
	<form class="form-edit box-wrap clearfix" action="includes/update-configuracion.php" method="post">
		<section class="form-section fl">
	 		<label for="system-name">Nombre sistema</label>
	 		<input id="system-name" name="txt-system-name" type="text" value="<?php echo ( isset( $tabla['nombreSistema'] ) ) ? $tabla['nombreSistema'] : ''; ?>" required="required" />
	 		<label for="file">Logo</label>
	 		<input id="file" name="txt-system-logo" type="file" />
	 		<input id="txt-file" name="txt-file" type="hidden" value="imgs/logo.png" />
	 		<div class="logo_preview">
	 			<img id="img-preview" src="imgs/logo.png" alt="Logo Preview" />
	 			<progress id="file-progress" class="hide"></progress>
	 		</div>
	 	</section>
	 	<section class="form-section fr">
	 		<label for="system-phone">Teléfono</label>
	 		<input id="system-phone" name="txt-system-phone" type="text" placeholder="22222222" value="<?php echo ( isset( $tabla['telefonos'] ) ) ? $tabla['telefonos'] : ''; ?>" pattern="[\d]{8,10}" required="required" />
	 		<label for="system-email">Correo electrónico</label>
	 		<input id="system-email" name="txt-system-email" type="email" value="<?php echo ( isset( $tabla['correoElectronico'] ) ) ? $tabla['correoElectronico'] : ''; ?>" required="required" />
	 		<label for="system-schedule">Horario</label>
	 		<input id="system-schedule" name="txt-system-schedule" value="<?php echo ( isset( $tabla['horario'] ) ) ? $tabla['horario'] : ''; ?>" type="text"  required="required" />
	 		<label for="system-address">Dirección</label>
	 		<textarea id="system-address" name="txt-system-address" required="required"><?php echo ( isset( $tabla['direccion'] ) ) ? $tabla['direccion'] : ''; ?></textarea>
	 		<label for="numero-asientos">Número de asientos</label>
	 		<input type="text" id ="numero-asientos" name="numero-asientos" placeholder="999" required="required" value="<?php echo ( isset( $tabla['numeroAsientos'] ) ) ? $tabla['numeroAsientos'] : ''; ?>" />
	 	</section>
		<section class="cb ac">
			<input type="submit" value="Guardar" />
		</section>
	</form>
<?php
	require_once 'includes/footer.php';
?>
