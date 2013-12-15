<?php
	define('PAGE','crear-abono');
	define('TITLE','Crear Abono');
	$pageConfig = array(
		'actions' => array(),
		'plugins'=> array('datepicker')
	);
	require_once 'includes/functions.php';
	require_once 'includes/header.php';

	$idFactura = ( isset( $_GET['id-factura'] ) ) ? $_GET['id-factura'] : '';
?>
	<h1 class="ac">Crear Abono</h1>
	<form id="proced-box" class="form-edit box-wrap" action="includes/insert-abono.php" method="post">
		<section class="form-section fl">
			<label for="bill">Número de Factura</label>
			<input id="bill" name="txt-bill-num" type="text" required="required" readonly="readonly" value="<?php echo $idFactura; ?>" />
			<label for="date">Fecha</label>
			<input id="date" name="txt-date" type="text" required="required" placeholder="dd-mm-yyyy" class="datepicker" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" />
			<label for="amount">Monto del Abono</label>
			<input id="amount" name="txt-amount" type="text" pattern="\d+" required="required" />
		</section>
		<section class="form-section fr">
			<label for="notes">Notas</label>
			<textarea id="notes" name="notes"></textarea>
		</section>
		<div class="ac cb">
			<button class="form-cancel">Cancelar</button>
			<input type="reset" value="Limpiar" />
			<button type="submit">Guardar</button>
		</div>
	</form>
<?php
	require_once 'includes/footer.php';
?>