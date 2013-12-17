<?php
	define('PAGE','editarConfiguracion');
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
		<section class="form-section fr">
	 		<div class="cb">
	 			<label for="txt-system-logo">Logo</label>
	 			<input id="txt-system-logo" name="txt-system-logo" type="file" class="file" />
	 			<input id="txt-system-logo" name="txt-system-logo" type="hidden" value="<?php echo ( isset( $tabla['logo'] ) ) ? $tabla['logo'] : ''; ?>" />
	 			<div class="file-upload">
	 				<img class="img-preview" src="<?php echo ( isset( $tabla['logo'] ) ) ? $tabla['logo'] : ''; ?>" alt="Logo Preview" />
	 				<progress class="file-progress hide"></progress>
	 			</div>
	 		</div>
	 		<div class="cb">
	 			<label for="txt-system-banner">Baner inicio</label>
	 			<input id="txt-system-banner" name="txt-system-banner" type="file" class="file" />
	 			<input id="txt-system-logo" name="txt-system-banner" type="hidden" value="<?php echo ( isset( $tabla['banner'] ) ) ? $tabla['banner'] : ''; ?>" />
	 			<div class="file-upload">
	 				<img class="img-preview" src="<?php echo ( isset( $tabla['banner'] ) ) ? $tabla['banner'] : ''; ?>" alt="Banner Preview" />
	 				<progress class="file-progress hide"></progress>
	 			</div>
	 		</div>
	 	</section>
		<section class="cb ac">
			<input type="submit" value="Guardar" />
		</section>
	</form>
<?php
	require_once 'includes/footer.php';
?>
